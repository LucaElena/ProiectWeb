<?php
	class ExportImport extends Controller
	{  
        public function index($userName = "")
		{
            //0) Variabile globale:
            $info['username'] =  $userName;
            $user_exist = 0;
            $user_type = 0;
            $user_id = "";

            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            $modelFisier = $this->model('fisierModel');


            //1) Culegem datele din POST: 
            //2) Procesam datele curente 
            if ($userName != "")
            {
                $user_exist = $modelUser->isDefined($userName);
                if ($user_exist)
                {
                    $user_id = $modelUser->getUserId($userName);
                    $user_type = $modelUser->getUserType($userName);
                }
            }



            if ($userName == "")
            {
                header('HTTP/1.0 403 Forbidden');
                $this->view('errors/error403.php', $info);
            }
            else
            {
				if ($user_exist)
				{
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $this->view('exportimport/index', $info);
                    }
                    else
                    {
                        header('HTTP/1.0 403 Forbidden');
                        $this->view('errors/error403.php', $info);
                    }
                }
                else
                {
                    header('HTTP/1.0 403 Forbidden');
                    $this->view('errors/error403.php', $info);
                }
            }
                     
        }
        public function exporta($userName = "")
		{
            //Array ( [admin-date__export__categorie] => Programari [admin-date__export__format] => JSON [actiune] => Exporta )
            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            $modelFisier = $this->model('fisierModel');

            if(isset(($_POST)))
            {
                if(!empty($_POST['admin-date__export__categorie']) && !empty($_POST['admin-date__export__format']) && !empty($_POST['actiune']))
                {
                    $actiune = $_POST['actiune'];
                    $categorie = $_POST['admin-date__export__categorie'];
                    $format = $_POST['admin-date__export__format'];

                    $date = "";
                    $extensie = "";
                    
                    $date_formatate_json = "{}";
                    $date_formatate_json = json_decode($date_formatate_json, true);
                    $numeFisier = strtolower($categorie . '.' . $format);
                    $fisierExport = fopen($numeFisier, "w");
                    //Am descarcat in folderul public libraria open source de procesare PDF de aici http://www.fpdf.org/ 
                    require('./fpdf184/fpdf.php');
                    $pdf = new FPDF();
                    $pdf->AddPage();
                    $pdf->SetFont('Arial','B',16);
                    $i = 0; 

                    switch ($categorie) {
                        case "General"://TO DO
                            //1) extragem datele din categorie curenta
                            $date = "";
                            //2) le procesam in formatul curent
                            switch ($format) {
                                case "JSON":
                                    $extensie = "json"; 
                                    break;
                                case "CSV":
                                    $extensie = "csv"; 
                                    break;
                                case "PDF":
                                    $extensie = "pdf"; 
                                    break;
                            }
                            //3) le exportam ca un fisier
                            break;
                        case "Programari":
                            $date = $modelProgramare->exportProgramari();
                            // Array ( 
                            //     [id_appointment] => 1 
                            //     [date] => 2022-06-05 15:00:00 
                            //     [id_user] => 4 
                            //     [id_form] => 1 
                            //     [request_message] => Buna ziua, Am o problema cu motocicleata mea Y.As vrea sa ii schimb piesa X Y Z. Va multumesc. 
                            //     [response_message] => Buna ziua, Nu avem piesele dorite si nu va putem rezolva problema momentan dar le comandam astazi iar daca reveneti in 10 zile va putem repara motocicleta Va mulumim de intelegere, Cymat 
                            //     [reserved_parts_list] => {} 
                            //     [status] => 4 ) 
                            foreach( $date as $elementCurent )
                            {
                                // print_r($elementCurent);
                                $id_appointment = $elementCurent['id_appointment'];
                                $data = $elementCurent['date'];
                                $id_user = $elementCurent['id_user'];
                                $id_form = $elementCurent['id_form'];
                                $request_message = $elementCurent['request_message'];
                                $response_message = $elementCurent['response_message'];
                                $reserved_parts_list = $elementCurent['reserved_parts_list'];
                                $status = $elementCurent['status'];

                                //2) le procesam in formatul curent
                                switch ($format) {
                                    case "JSON":
                                        $date_formatate_json[$i] = [];
                                        $date_formatate_json[$i]['id_appointment'] = $id_appointment;
                                        $date_formatate_json[$i]['date'] = $data;
                                        $date_formatate_json[$i]['id_user'] = $id_user;
                                        $date_formatate_json[$i]['id_form'] = $id_form;
                                        $date_formatate_json[$i]['request_message'] = $request_message;
                                        $date_formatate_json[$i]['response_message'] = $response_message;
                                        $date_formatate_json[$i]['reserved_parts_list'] = $reserved_parts_list;
                                        $date_formatate_json[$i]['status'] = $status;
                                        break;
                                    case "CSV":
                                        // fputcsv($fisierExport, [$id_appointment , $data , $id_user , $id_form , addslashes($request_message) , addslashes($response_message) , $reserved_parts_list , $status]);
                                        fputcsv($fisierExport, $elementCurent);
                                        break;
                                    case "PDF":
                                        //transforma array-ul curent in string si il adaugam in pdf-ul curent pe cate un rand
                                        $pdf->Cell(0,10,implode($elementCurent),0,1);
                                        break;
                                }
                                $i++;
                            }
                            break;
                        case "Stoc":
                            //1) extragem datele din categorie curenta
 
                            // print_r("Trebuie sa exportam datele din stoc ca " . $format);
                            $date = $modelStoc->exportStoc();
                            
                            //Array ( 
                                // [id_part] => 1 
                                // [name] => Claxon 12V Negru 
                                // [id_category] => 1 
                                // [id_brand] => 10 
                                // [price] => 30 
                                // [id_stoc] => 1 
                                // [brand_name] => GENERAL 
                                // [category_name] => Accesorii si piese 
                                // [cantitate_stoc] => 15 
                                // [cantitate_rezervata] => 3 
                                // )
                            

                            // if($format == "CSV")
                            // {//capul de fisier csv
                            //     if ($categorie == "Stoc")
                            //     {
                            //         fputcsv($fisierExport, ['id_part' , 'name' , 'id_category' , 'id_brand' , 'price' , 'id_stoc' , 'brand_name' , 'category_name' , 'cantitate_stoc' , 'cantitate_rezervata']);
                            //     }
                            // }

                            foreach( $date as $elementCurent )
                            {
                                $id_part = $elementCurent['id_part'];
                                $name = $elementCurent['name'];
                                $id_category = $elementCurent['id_category'];
                                $id_brand = $elementCurent['id_brand'];
                                $price = $elementCurent['price'];
                                $id_stoc = $elementCurent['id_stoc'];
                                $brand_name = $elementCurent['brand_name'];
                                $category_name = $elementCurent['category_name'];
                                $cantitate_stoc = $elementCurent['cantitate_stoc'];
                                $cantitate_rezervata = $elementCurent['cantitate_rezervata'];
                                
                                //2) le procesam in formatul curent
                                switch ($format) {
                                    case "JSON":
                                        $date_formatate_json[$i] = [];
                                        $date_formatate_json[$i]['id_part'] = $id_part;
                                        $date_formatate_json[$i]['name'] = $name;
                                        $date_formatate_json[$i]['id_category'] = $id_category;
                                        $date_formatate_json[$i]['id_brand'] = $id_brand;
                                        $date_formatate_json[$i]['price'] = $price;
                                        $date_formatate_json[$i]['id_stoc'] = $id_stoc;
                                        $date_formatate_json[$i]['brand_name'] = $brand_name;
                                        $date_formatate_json[$i]['category_name'] = $category_name;
                                        $date_formatate_json[$i]['cantitate_stoc'] = $cantitate_stoc;
                                        $date_formatate_json[$i]['cantitate_rezervata'] = $cantitate_rezervata;
                                        break;
                                    case "CSV":
                                        fputcsv($fisierExport, $elementCurent);
                                        break;
                                    case "PDF":
                                        //transforma array-ul curent in string si il adaugam in pdf-ul curent pe cate un rand
                                        $pdf->Cell(0,10,implode($elementCurent),0,1);
                                        break;
                                }
                                $i++;
                            }
                            break;
                        case "Comenzi":
                            $date = $modelStoc->getComenzi();
                            // print_r($date);
                            // Array ( 
                            //     [id_order] => 1 
                            //     [id_part] => 95 
                            //     [order_date] => 2022-04-05 
                            //     [status] => 1 
                            //     [quantity] => 5 
                            //     [shipped_date] => 2022-04-07 )
                            foreach( $date as $elementCurent )
                            {
                                // print_r($elementCurent);
                                $id_order = $elementCurent['id_order'];
                                $id_part = $elementCurent['id_part'];
                                $order_date = $elementCurent['order_date'];
                                $status = $elementCurent['status'];
                                $quantity = $elementCurent['quantity'];
                                $shipped_date = $elementCurent['shipped_date'];

                                //2) le procesam in formatul curent
                                switch ($format) {
                                    case "JSON":
                                        $date_formatate_json[$i] = [];
                                        $date_formatate_json[$i]['id_order'] = $id_order;
                                        $date_formatate_json[$i]['id_part'] = $id_part;
                                        $date_formatate_json[$i]['order_date'] = $order_date;
                                        $date_formatate_json[$i]['status'] = $status;
                                        $date_formatate_json[$i]['quantity'] = $quantity;
                                        $date_formatate_json[$i]['shipped_date'] = $shipped_date;
                                        break;
                                    case "CSV":
                                        // fputcsv($fisierExport, [$id_appointment , $data , $id_user , $id_form , addslashes($request_message) , addslashes($response_message) , $reserved_parts_list , $status]);
                                        fputcsv($fisierExport, $elementCurent);
                                        break;
                                    case "PDF":
                                        //transforma array-ul curent in string si il adaugam in pdf-ul curent pe cate un rand
                                        $pdf->Cell(0,10,implode($elementCurent),0,1);
                                        break;
                                }
                                $i++;
                            }
                            break;
                    }

                    //3) le scriem in fisier
                    switch ($format) {
                        case "JSON":
                            $date_formatate_json = json_encode($date_formatate_json);
                            // print_r("Scriem datele json");
                            fwrite($fisierExport, $date_formatate_json);
                            break;
                        case "CSV":
                            //fputcsv deja le-a scris in fisier 
                            break;
                        case "PDF":
                            $pdf->Output($numeFisier,'F' );
                            break;
                    }
                    fclose($fisierExport);

                    //4) trimitem fisierul catre client  
                    header('Content-disposition: attachment;filename=' . $numeFisier);
                    readfile($numeFisier);
                    
                }
            }

            
        }
        public function importa($userName = "")
		{
            print_r($_POST);
        }

    }

?>