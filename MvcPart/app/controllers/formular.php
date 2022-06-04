<?php
	class Formular extends Controller
	{   

        //I) Functia principala in care avem doar logica de printare view in diferite feluri
        //Actiunile le rezolvam in functii individuale pentru a nu complica si mai tare functia principala
        public function index($userName = "")
		{
            
            // Status formular : Editare(0)->Astepare raspuns admin(1)->->Astepare accept client(2)->Programat(3) Refuzat(4) -> Terminat(5)
            
            //0) Variabile globale:
            $info['username'] =  $userName;
            $info['butoaneFormular'] = '';
            $info['tabelPieseSelectateAdmin'] = '';
            $info['selectPieseOptionAdmin'] = '';
            $info['idFormularAscuns'] = '';
            $oraSelectata = "2022-05-18 09:00";
            $actiuneFormular = -1;
            $actiune = "";
            $statusPrimit = 0;
            $mesajClient = "";
            $mesajAdmin = "";
            $user_exist = 0;
            $user_type = 0;
            $user_id = "";
            $formID = 0;
            $programareID = 0;
            $jsonPieseSelectate = "{}";
            $selectPieseOptionAdmin = "";
            $tabelPieseSelectateAdmin = "";
            $fisiereDovada = "";

            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            $modelFisier = $this->model('fisierModel');

            

            //1) Culegem datele din POST:
            if(isset($_POST['ascuns_selected_button']))
            {
                $oraSelectata = $_POST['ascuns_selected_button'];
            }

            $oraSelectataFormatDate = DateTime::createFromFormat('Y-m-d H:i', $oraSelectata);
            $info['oraSelectata'] =  $oraSelectataFormatDate->format('Y-m-d')."T".$oraSelectataFormatDate->format('H:00');
            $info['oraSelectataMin'] =  $oraSelectataFormatDate->format('Y-m-d')."T09:00";
            $info['oraSelectataMax'] =  $oraSelectataFormatDate->format('Y-m-d')."T19:00";

            //mutat in functii individuale:
            // if(isset($_POST['calendar_action']))
            // {
            //     $actiune = strtolower($_POST['calendar_action']);
            //     switch ($_POST['calendar_action']) {
            //         case "Book"://un client vrea sa faca o cerere programare
            //             $actiuneFormular = 0;
            //             break;
            //         case "Cancel"://un client vrea sa anuleze o programare in orice stadiu
            //             $actiuneFormular = 1;
            //             break;
            //         case "Raspuns"://admin-ul vrea sa raspunda la o cerere de programare
            //             $actiuneFormular = 2;
            //             break;
            //         case "Terminat"://admin-ul marcheaza ca terminata o programare-> pentru a consuma piesele rezervate.
            //             $actiuneFormular = 3;
            //             break;
            //     }
            // }

            // if(isset($_POST['formular_programare__actiune']))
            // {
            //     $actiune = strtolower($_POST['formular_programare__actiune']);
            //     switch ($_POST['formular_programare__actiune']) {
            //         case "Trimite"://un client trimite datele completate intr-o cerere
            //             $actiuneFormular = 4;
            //             break;
            //         case "Accepta"://un client accepta oferta de pret sau un admin accepta cererea de programare
            //             $actiuneFormular = 5;
            //             break;
            //         case "Respinge"://un client respinge oferta de pret sau un admin respinge cererea de programare
            //             $actiuneFormular = 6;
            //             break;
            //         case "Terminat"://admin-ul marcheaza ca terminata o programare-> pentru a consuma piesele rezervate.
            //             $actiuneFormular = 7;
            //             break;
            //         case "Sterge"://admin-ul sterge progrmarea
            //             $actiuneFormular = 8;
            //             break;
            //     }
            // }
            

            
            //2) Procesam datele formului curent + inseram inainte daca avem si o actiune:
            if ($userName != "")
            {
                $user_exist = $modelUser->isDefined($userName);
                if ($user_exist)
                {
                    $user_id = $modelUser->getUserId($userName);
                    $user_type = $modelUser->getUserType($userName);
                }
            }

            //Trebuie sa verficam daca deja avem un formular la data selectata.
            //Daca nu avem si suntem in modul "Book" -> trebuie sa creiem un formular initial
            //Si apoi sa il completam pe parcurs ce clientul si adminul il completeaza 
            $programareResultat = $modelProgramare->checkProgramareByData($oraSelectataFormatDate->format('Y-m-d H:00:00'));
            if($programareResultat == -1)
            {
                //Numaram cate programari avem si folosim numarul ca id pentru o noua programare si un nou formular(probabil nu e o metoda ok)
                $countProgramari =  $modelProgramare->countProgramari();
                $formID = $countProgramari;
                $programareID = $countProgramari;
                $modelProgramare->insertProgramare($programareID, $oraSelectataFormatDate->format('Y-m-d H:00:00') , $user_id , $formID );
                $modelFormular->insertFormular($formID,"","","{}",0);
                $last_id = $this->conn->lastInsertId();
            }
            else
            {
                print_r("Avem deja acesta data in programari:");
                print_r($programareResultat);
                //Avem deja acesta data in programari -> trebuie sa o updatam in functie parametrii primiti
                $formID = $programareResultat['id_form'];
                $programareID = $programareResultat['id_appointment'];
                
            }

            //punem in pagina si un form ascuns pentru a transmite la functiile de actiune id-ul formularului
            $info['idFormularAscuns'] = $formID;
            print_r($info['idFormularAscuns']);
            $formResultat = $modelFormular->getFormular($formID);
            $statusPrimit = $formResultat['status'];
            $jsonPieseSelectate = $formResultat['reserved_parts_list'];
            $fisiereResultat = $modelFisier->getFisiere($formID);
            // print_r( $fisiereResultat);
            

            


            foreach ($fisiereResultat as $fisier)
            {
                if ($fisier['type'] == 1)//Adaugam in mesajul clientului si toate pozele din acelasi formular
                {
                    $fisiereDovada = $fisiereDovada . 
                                '<img src="data:image/jpeg;base64,' . base64_encode($fisier['file']) . '" 
                                alt="foto_motocicletaStricata" class="formular_programare__mesaj_client_imagine">';
                }
                if ($fisier['type'] == 2)//Adaugam in mesajul clientului si toate videourile din acelasi formular
                {
                    $fisiereDovada = $fisiereDovada . 
                                '<video class="formular_programare__mesaj_client__video" controls autoplay>
                                <source src="data:video/mp4;base64,' . base64_encode($fisier['file']) . '" type="video/mp4">
                                </video>';
                }
            }
            if ($user_exist && $user_type)//admin
            {
                 //Calculam si tabelul de selectare a pieselor necesare pentru admin
                 $brands = $modelStoc->getBrands();
                 $categorii = $modelStoc->getCategorii();
                 $piese_unice = $modelStoc->getPiese();
                 $selectPieseOptionAdmin = $selectPieseOptionAdmin . 
                     '<select class="formular_programare__piese_necesare__brand" name="formular_programare__brand"
                     id="formular_programare__piese_necesare__brand" >
                     <option value="" selected> Brand</option>';

                 foreach ($brands as $brand)
                 {
                    $selectPieseOptionAdmin = $selectPieseOptionAdmin .  ' <option value="' . ucwords(strtolower($brand)) . '">' . ucwords(strtolower($brand)) . '</option>';
                 }

                 $selectPieseOptionAdmin = $selectPieseOptionAdmin . 
                     '</select>
                     <select class="formular_programare__piese_necesare__cateorie" name="formular_programare__categorie">
                         <option value="" selected> Categorie</option>';

                 foreach ($categorii as $categorie)
                 {
                     #transmitem in plus si id-ul categoriei pentru a putea sa legam optiunile din categorie de cele din piese in js
                     $id_si_nume_categorie = explode (";", $categorie); 
                     $id_categorie = $id_si_nume_categorie[0];
                     $nume_categorie = $id_si_nume_categorie[1];
                     $selectPieseOptionAdmin = $selectPieseOptionAdmin .  ' <option value="'  . $id_categorie . ';' . ucwords(strtolower($nume_categorie)) . '">' . ucwords(strtolower($nume_categorie)) . '</option>';
                 }

                 $selectPieseOptionAdmin = $selectPieseOptionAdmin . 
                     '</select>
                     <select class="formular_programare__piese_necesare__piesa" name="formular_programare__piesa" >
                         <option value="" selected> Piesa</option>';

                 foreach ($piese_unice as $piesa)
                 {
                     #transmitem in plus si id-ul categoriei pentru a putea sa legam optiunile din categorie de cele din piese in js
                     $id_si_nume_piesa = explode (";", $piesa); 
                     $id_categorie = $id_si_nume_piesa[0];
                     $nume_piesa = $id_si_nume_piesa[1];
                     $selectPieseOptionAdmin = $selectPieseOptionAdmin .  ' <option value="' . $id_categorie . ';' . ucwords(strtolower($nume_piesa)) . '">' . ucwords(strtolower($nume_piesa)) . '</option>';
                 }

                 $selectPieseOptionAdmin = $selectPieseOptionAdmin . 
                     '</select>';


                 $tabelPieseSelectateAdmin = '<table>
                                                         <thead>
                                                             <tr>
                                                                 <th>No</th>
                                                                 <th>Brand</th>
                                                                 <th>Cateorie</th>
                                                                 <th>Nume</th>
                                                                 <th>Cantitate</th>
                                                                 <th>Pret</th>
                                                                 <th>Sterge</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>';
                if ($jsonPieseSelectate)//Nu toate programarile au lista de produse utilizate
                {
                    $jsonPieseSelectate = json_decode($jsonPieseSelectate);
                    $i = 1;
                    $pretTotal = 0;
                    foreach($jsonPieseSelectate as $idPiesa => $cantitatePiesa)
                    {
                        if($idPiesa != 0)
                        {
                            $pretPiesaCurenta = $modelStoc->getPret($idPiesa);
                            $infoPiesaCurenta = $modelStoc->getDatePiesaById($idPiesa);
                            $idCategorieCurenta = $infoPiesaCurenta['id_category'];
                            $idBrandCurent = $infoPiesaCurenta['id_brand'];
                            $idStocCurent = $infoPiesaCurenta['id_stoc'];
    
                            $date_categorie = $modelStoc->getDateCategorieById($idCategorieCurenta);
                            $date_brand = $modelStoc->getDateBrandById($idBrandCurent);
    
                            $pretTotal = $pretTotal + $pretPiesaCurenta * $cantitatePiesa;
                            $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                                '<tr>
                                    <td>' . $i . '</td>
                                    <td>' . ucwords(strtolower($date_brand['brand_name'])) . '</td>
                                    <td>' . ucwords(strtolower($date_categorie['category_name'])) . '</td>
                                    <td>' . ucwords(strtolower($infoPiesaCurenta['name'])) . '</td>
                                    <td>' . $cantitatePiesa . '</td>
                                    <td>' . $pretPiesaCurenta . '</td>
                                    <td><button type="submit" class="formular_programare__piese_necesare__sterge" name="formular_programare__actiune" formaction="/formular/stergepiesa/' . $userName . '"
                                        value="' . $idPiesa . ';Remove"><i class="fas fa-plus"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>';
                            $i++;
                        }

                    }
                    

                    $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                            '<tr>
                                <td></td>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>' . $pretTotal . '</td>
                                <td></td>
                            </tr>';
                }                                     
                 $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                                                         '</tbody>
                                                     </table>';
            }

            

            //3) In functie de status si diferiti parametri afisam un view cu parametrii diferiti:
            //In functie de status-ul primit , userul curent si actiunea facem o logica diferita 
            switch ($statusPrimit) {
                case 0://formular initial in editare de catre client/admin
                    $status = "Editare";
                    $mesajClient = '
                            <textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt"  cols="10" rows="3" placeholder="Mesaj client cu descrierea problemei" required autofocus></textarea>
                            <input type="file" accept="video/*,image/*" multiple="multiple" name="dovezi[]" class="formular_programare__mesaj_client__video" required>
                            ';
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '<button type="submit" class="formular_programare__actiune__trimite_button" name="formular_programare__actiune" formaction="/formular/trimite/' . $userName . '" value="Trimite" > Trimite</button>';
                    
                    break;
                case 1://formular in asteptare raspuns admin  // Parte rezervata admin
                    if ($user_exist)
                    {
                        $status = "Astepare admin";
                        $mesajClient = '<textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt" cols="10" rows="3"
                                        readonly>' . $formResultat['request_message'] . '</textarea>';
                        $mesajClient = $mesajClient . $fisiereDovada;
                        
                        if($user_type)//admin
                        {//poate sa raspunda si sa accepte/respinga cererea 
                            if (isset($formResultat['response_message']))
                            {
                                $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                placeholder="Scrieti raspuns pentru client" required>'. $formResultat['response_message'] . '</textarea>
                                         ';
                            }
                            else
                            {
                                $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                placeholder="Scrieti raspuns pentru client" required></textarea>
                                         ';
                            }
                            
                            
                            //Admin-ul poate sa adauge piese la acest pass
                            $selectPieseOptionAdmin = $selectPieseOptionAdmin . 
                                '<input class="formular_programare__piese_necesare__cantitate" type="number"
                                    id="formular_programare__piese_necesare__cantitate" name="cantitate" value=1 min="1" max="10"
                                    required>
                                <button type="submit" class="formular_programare__piese_necesare__adauga" name="formular_programare__actiune" formaction="/formular/adaugapiesa/' . $userName . '"
                                    value="Add"><i class="fas fa-plus"></i>Add</button>';
                            $info['selectPieseOptionAdmin'] = $selectPieseOptionAdmin;
                            $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                            $info['butoaneFormular'] = '<button type="submit" class="formular_programare__actiune__accepta_button"
                                                        name="formular_programare__actiune" formaction="/formular/accepta/' . $userName . '" value="Accepta">Accepta</button>
                                                    <button type="submit" class="formular_programare__actiune__respinge_button"
                                                        name="formular_programare__actiune" formaction="/formular/respinge/' . $userName . '" value="Respinge">Respinge</button>';
                        }
                        else//client
                        {//poate sa stearga cererea
                            $info['butoaneFormular'] = '
                                                <button type="submit" class="formular_programare__actiune__Editare_button"
                                                        name="formular_programare__actiune" formaction="/formular/editare/' . $userName . '" value="Editare">Editare</button>        
                                                <button type="submit" class="formular_programare__actiune__sterge_button"
                                                        name="formular_programare__actiune" formaction="/formular/sterge/' . $userName . '" value="Sterge">Sterge</button>
                                                    ';
                        }
                    }
    
                    break;
                case 2://formular in asteptare raspuns accept client
                    $status = "Astepare client";
                    $mesajClient = '<textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt" cols="10" rows="3"
                                        readonly>' . $formResultat['request_message'] . '</textarea>';
                        $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                    readonly>' . $formResultat['response_message'] . '</textarea>';
                    $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                    $info['butoaneFormular'] = '<button type="submit" class="formular_programare__actiune__accepta_button"
                                                    name="formular_programare__actiune" formaction="/formular/accepta/' . $userName . '" value="Accepta">Accepta</button>
                                                <button type="submit" class="formular_programare__actiune__respinge_button"
                                                    name="formular_programare__actiune" formaction="/formular/respinge/' . $userName . '" value="Respinge">Respinge</button>';
                    break;
                case 3://formular programat
                    $status = "Programat";
                    $mesajClient = '<textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt" cols="10" rows="3"
                                        readonly>' . $formResultat['request_message'] . '</textarea>';
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                    readonly>' . $formResultat['response_message'] . '</textarea>';
                    $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                    $info['butoaneFormular'] = '';
                    if ($user_exist)
                    {
                        if($user_type)//admin -> Terminat/Sterge
                        {
                            $info['butoaneFormular'] = 
                            '<button type="submit" class="formular_programare__actiune__terminat_button"  name="formular_programare__actiune" formaction="/formular/terminat/' . $userName . '" value="Terminat" >Terminat</button>
                            <button type="submit" class="formular_programare__actiune__sterge_button"  name="formular_programare__actiune" formaction="/formular/sterge/' . $userName . '" value="Sterge">Sterge</button>';
                        }
                        else//client-> Sterge
                        {
                            $info['butoaneFormular'] = 
                            '<button type="submit" class="formular_programare__actiune__sterge_button"  name="formular_programare__actiune" formaction="/formular/sterge/' . $userName . '" value="Sterge">Sterge</button>';
                        }
                    }
                    break;
                case 4://formular refuzat si procesat-> piesele rezervate daca e cazul sunt sterse
                    $status = "Refuzat";
                    $mesajClient = '<textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt" cols="10" rows="3"
                                        readonly>' . $formResultat['request_message'] . '</textarea>';
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                    readonly>' . $formResultat['response_message'] . '</textarea>';
                    $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                    $info['butoaneFormular'] = '';
                    break;
                case 5://formular terminat si procesat-> piesele utilizate sunt consumate din stoc 
                    $status = "Terminat";
                    $mesajClient = '<textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt" cols="10" rows="3"
                                        readonly>' . $formResultat['request_message'] . '</textarea>';
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = '<textarea name="mesaj_nou_admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                    readonly>' . $formResultat['response_message'] . '</textarea>';
                    $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                    $info['butoaneFormular'] = '';
                    break;
                case -1://formular lipsa: nu am completat baza de date cu istoric complet 
                    $status = "Lipsa formular";
                    $mesajClient = "";
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '';
                    break;
            }

            

            $info['formularStatus'] =  $status;
            $info['mesajClient'] =  $mesajClient;
            $info['mesajAdmin'] =  $mesajAdmin;

           




            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $this->view('formular/index', $info);
            }
            else
            {
				if ($user_exist)
				{
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $this->view('formular/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        $this->view('formular/index', $info);
                    }
                }
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $this->view('formular/index', $info);
                }
            }
        }


        //II) Actiuni primite de pe butoanele din calendarul de programari: raspuns terminat book cancel
        public function raspuns($userName = "", )
		{
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function terminat($userName = "", )
		{
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function book($userName = "", )
		{
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function cancel($userName = "", )
		{
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }


        //III) Actiuni primite de pe butoanele din formular: trimite adauga accepta respinge terminat sterge
        public function trimite($userName = "", )
        {
            // niste modificari si redirect la formular
            // phpinfo(); // printeaza toate datele de configurare
            // print_r($_POST);
            // print_r($_FILES['dovezi']); Arata asa:
            // Array (
            //  [name] => Array ( [0] => moto_stricat1.jpg [1] => moto_stricat2.jpg ) 
            //  [type] => Array ( [0] => image/jpeg [1] => image/jpeg ) 
            //  [tmp_name] => Array ( [0] => G:\xampp\tmp\phpF42F.tmp [1] => G:\xampp\tmp\phpF440.tmp ) 
            //  [error] => Array ( [0] => 0 [1] => 0 )
            //  [size] => Array ( [0] => 143453 [1] => 144558 ) 
            //  )

            $modelFisier = $this->model('fisierModel');
            $modelFormular = $this->model('formularModel');
            if(isset(($_POST)))
            {
                if(isset($_POST['id_formular_ascuns']))
                {
                    $currentFormId = $_POST['id_formular_ascuns'];
                    if(isset($_POST['ora_programare']))
                    {
                        $oraProgramare = $_POST['ora_programare'];
                    }
                    if(isset($_POST['mesaj_nou_client']))
                    {
                        $mesajClient = $_POST['mesaj_nou_client'];
                        $modelFormular->updateMesajClient($currentFormId, $mesajClient );
                    }


                    $i = 0;
                    foreach($_FILES['dovezi']['name'] as $name)
                    {
                        if($_FILES['dovezi']['error'][$i] == 0)
                        {
                            $tipFisier = '1';
                            if (str_contains($_FILES['dovezi']['type'][$i], 'image')) { 
                                $tipFisier = '1';
                            }
                            if (str_contains($_FILES['dovezi']['type'][$i], 'video')) { 
                                $tipFisier = '2';
                            }
                            $modelFisier->insertFisier( $_FILES['dovezi']['tmp_name'][$i] , $currentFormId , $tipFisier);
                        }
                        $i++;
                    }
                }
                
            }
            //Trecem si statusul de la 0 la 1 (de la Editare la Asteptare raspuns admin)
            $modelFormular->schimbaStatus($currentFormId, "1");
            //redirect la formular index(unde avem logica de printare view)
            // header('Location: ' . URL . 'formular/' . $userName); 
            //sau sa printam un view de multumire

        }
        public function adaugapiesa($userName = "", )
        {
            // niste modificari si redirect la formular
            // print_r($_POST);
            // Array ( [id_formular_ascuns] => 102 [ora_programare] => 2022-05-18T09:00 [mesaj_nou_client] => zfsdgsdg [mesaj_nou_admin] => sdgdfgdshgdh [formular_programare__brand] => Honda [cantitate] => 2 [formular_programare__actiune] => Add )
            
            $modelFisier = $this->model('fisierModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            if(isset(($_POST)))
            {
                if(isset($_POST['id_formular_ascuns']))
                {
                    $currentFormId = $_POST['id_formular_ascuns'];
                    if(isset($_POST['ora_programare']))
                    {
                        $oraProgramare = $_POST['ora_programare'];
                    }
                    if(isset($_POST['mesaj_nou_client']))
                    {
                        $mesajClient = $_POST['mesaj_nou_client'];
                        $modelFormular->updateMesajClient($currentFormId, $mesajClient );
                    }
                    if(isset($_POST['mesaj_nou_admin']))
                    {
                        $mesajAdmin = $_POST['mesaj_nou_admin'];
                        $modelFormular->updateMesajAdmin($currentFormId, $mesajAdmin );
                    }
                    if(isset($_POST['formular_programare__actiune']))
                    {
                        if($_POST['formular_programare__actiune'] == "Add")
                        {
                            if(empty($_POST['formular_programare__brand']) && empty($_POST['formular_programare__categorie']) && empty($_POST['formular_programare__piesa']) && empty($_POST['cantitate'])) 
                            {
                                // Array ( [id_formular_ascuns] => 102 [ora_programare] => 2022-05-18T09:00 [mesaj_nou_client] => zfsdgsdg [mesaj_nou_admin] => test test [formular_programare__brand] => Beta [formular_programare__categorie] => 7;Filtre [formular_programare__piesa] => 7;Filtru Benzina [cantitate] => 3 [formular_programare__actiune] => Add )
                                
                                //Datele extrase din POST dupa ce am verificat mai sus ca exista:
                                $nume_brand_selectat = $_POST['formular_programare__brand'];
                                $nume_categorie_selectata = explode (";", $_POST['formular_programare__categorie'])[1];
                                $nume_piesa_selectata = explode (";", $_POST['formular_programare__piesa'])[1];
                                $cantitate = $_POST['cantitate'];
                                
                                //Cautam id-ul piesei dupa numele piesei, al brandului si al categoriei:
                                $piesaID = $modelStoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);

                                $formResultat = $modelFormular->getFormular($currentFormId);
                                $jsonPieseCurente = $formResultat['reserved_parts_list'];

                                // print_r($piesaID . ":" . $cantitate . " json curent =" .  $jsonPieseCurente);

                                //decodam stringul cu piese curente in JSON , apoi adaugam piesa curenta si transformam JSON-ul inapoi in string si updatam formularul
                                $jsonPieseCurente = json_decode($jsonPieseCurente,true);
                                if (isset($jsonPieseCurente[$piesaID]))
                                {
                                    $jsonPieseCurente[$piesaID] = strval(intval($jsonPieseCurente[$piesaID]) + intval($cantitate));
                                }
                                else
                                {
                                    $jsonPieseCurente[$piesaID] = strval(intval($cantitate));
                                }
                                $jsonPieseCurente = json_encode($jsonPieseCurente);
                                // print_r($jsonPieseCurente);
                                $modelFormular->updateListaPiese($currentFormId, $jsonPieseCurente );

                            }
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function stergepiesa($userName = "", )
        {
            // niste modificari si redirect la formular
            // print_r($_POST);
            // Array ( [id_formular_ascuns] => 102 [ora_programare] => 2022-05-18T09:00 [mesaj_nou_client] => zfsdgsdg [mesaj_nou_admin] => test test dssdsfas [formular_programare__brand] => [formular_programare__categorie] => [formular_programare__piesa] => [cantitate] => 1 [formular_programare__actiune] => 114;Remove )
            
            $modelFisier = $this->model('fisierModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            if(isset(($_POST)))
            {
                if(isset($_POST['id_formular_ascuns']))
                {
                    $currentFormId = $_POST['id_formular_ascuns'];
                    if(isset($_POST['ora_programare']))
                    {
                        $oraProgramare = $_POST['ora_programare'];
                    }
                    if(isset($_POST['mesaj_nou_client']))
                    {
                        $mesajClient = $_POST['mesaj_nou_client'];
                        $modelFormular->updateMesajClient($currentFormId, $mesajClient );
                    }
                    if(isset($_POST['mesaj_nou_client']))
                    {
                        $mesajClient = $_POST['mesaj_nou_client'];
                        $modelFormular->updateMesajClient($currentFormId, $mesajClient );
                    }
                    if(isset($_POST['mesaj_nou_admin']))
                    {
                        $mesajAdmin = $_POST['mesaj_nou_admin'];
                        $modelFormular->updateMesajAdmin($currentFormId, $mesajAdmin );
                    }
                    if(isset($_POST['formular_programare__actiune']))
                    {
                        //Am facut un mic truc sa trimitem mai repede si Id-ul Piesei pe care o stergem
                        //Arata asa initial : [formular_programare__actiune] => 114;Remove
                        $actiunePrimita = explode (";", $_POST['formular_programare__actiune']);
                        $actiune =  $actiunePrimita[1];
                        $idPiesa =  $actiunePrimita[0];

                        if($actiune == "Remove")
                        {
                            // print_r("Trebuie sa stergem piesa:" . $idPiesa);
                            $formResultat = $modelFormular->getFormular($currentFormId);
                            $jsonPieseCurente = $formResultat['reserved_parts_list'];
                            //decodam stringul cu piese curente in JSON , apoi adaugam piesa curenta si transformam JSON-ul inapoi in string si updatam formularul
                            $jsonPieseCurente = json_decode($jsonPieseCurente,true);
                            if (isset($jsonPieseCurente[$idPiesa]))
                            {
                                unset($jsonPieseCurente[$idPiesa]);
                            }
                            $jsonPieseCurente = json_encode($jsonPieseCurente);
                            // print_r($jsonPieseCurente);
                            $modelFormular->updateListaPiese($currentFormId, $jsonPieseCurente );
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function accepta($userName = "", )
        {
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }
        public function respinge($userName = "", )
        {
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }
        // public function terminat($userName = "", )// o lasam pe cea de mai sus 
        // {
        //     // niste modificari si redirect la formular
        //     header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        // }
        public function sterge($userName = "", )
        {
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

    }
    
    
?>