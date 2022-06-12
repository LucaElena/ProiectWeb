<?php
	class Formular extends Controller
	{   

        //I) Functia principala in care avem doar logica de printare view in diferite feluri
        //Actiunile le rezolvam in functii individuale pentru a nu complica si mai tare functia principala
        public function index($oraSelectata = "")
		{
            $oraSelectata = "2022-06-14 14:00";
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            if(!empty($_SESSION['oraSelectata']))
            {
                $oraSelectata = $_SESSION['oraSelectata'];
            }

            // Status formular : Editare(0)->Astepare raspuns admin(1)->->Astepare accept client(2)->Programat(3) Refuzat(4) -> Terminat(5)
            
            //0) Variabile globale:
            $info['username'] =  $userName;
            $info['butoaneFormular'] = '';
            $info['tabelPieseSelectateAdmin'] = '';
            $info['selectPieseOptionAdmin'] = '';
            $info['idFormularAscuns'] = '';
            
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
            $info['dateClientNou'] = "";
            $status = "Gol";

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
            if($userName == "" || $user_exist == 0)
            { //adaugam si partea de introdus date utilizator
                $info['dateClientNou'] = '<div class="formular_programare__date_client">
                            <input class="formular_programare__date_client__u_name" id="formular_programare__date_client__u_name"
                                type="Text" placeholder="Username" name="formular_programare__date_client__u_name" required autofocus>
                            <input class="formular_programare__date_client__phone" id="formular_programare__date_client__phone"
                                type="phone"  pattern="0[0-9]{9}" placeholder="Phone" name="formular_programare__date_client__phone" required>
                            <input class="formular_programare__date_client__email" id="formular_programare__date_client__email"
                                type="email" placeholder="Email" name="formular_programare__date_client__email" required>
                            <input class="formular_programare__date_client__pass" id="formular_programare__date_client__pass"
                                type="password" name="formular_programare__date_client__pass" placeholder="Alege parola" required>
                        </div>
                        ';
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

                //Daca user-ul e 0 (am fost initial nelogat si am facut si user si formular in acelasi timp)-> trebuie sa updatam user id-ul
                $checkUserId = $modelFormular->checkUserId($formID);
                if($checkUserId == 0 && $user_id !=0)
                {//update user Id-ul in programare deoarece a fost creat initial de un user nelogat iar acum suntem logati
                    $modelFormular->updateUserId($formID, $user_id);
                }
                

                
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

            if ($user_exist || $statusPrimit = 0)
            {
                
                 //Calculam si tabelul de selectare a pieselor necesare pentru admin
                 $brands = $modelStoc->getBrands();
                 $categorii = $modelStoc->getCategorii();
                 $piese_unice = $modelStoc->getPiese();
                 if ($user_type) //admin 
                 { // partea de select e doar pentru admin
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
                }

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
                                    <td>' . $pretPiesaCurenta . '</td>';
                            if ($user_type && $statusPrimit == 1) //admin la stare 1  -> are button de stergere piesa    
                            {
                                $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin .  '<td><button type="submit" class="formular_programare__piese_necesare__sterge" name="formular_programare__actiune" formaction="/formular/stergepiesa/' . $userName . '"
                                            value="' . $idPiesa . ';Remove"><i class="fas fa-trash-alt"></i></button></td>
                                    </tr>';
                            }
                            else //client sau alt status decat cel la care putem modifica tabelul -> nu avem button de stergere piesa      
                            {
                                $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin .  '<td></td>
                                    </tr>';
                            }
                            
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
                            <textarea name="mesaj_nou_client" class="formular_programare__mesaj_client__txt"  cols="10" rows="3" placeholder="Mesaj client cu descrierea problemei" required autofocus>' . $formResultat['request_message'] . '</textarea>
                            <input type="file" accept="video/*,image/*" multiple="multiple" name="dovezi[]" class="formular_programare__mesaj_client__video" required>
                            ';
                    $mesajClient = $mesajClient ;
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
                                                        name="formular_programare__actiune" formaction="/formular/acceptaformular/' . $userName . '" value="Accepta">Accepta</button>
                                                    <button type="submit" class="formular_programare__actiune__respinge_button"
                                                        name="formular_programare__actiune" formaction="/formular/respingeformular/' . $userName . '" value="Respinge">Respinge</button>';
                        }
                        else//client
                        {//poate sa stearga cererea
                            $info['butoaneFormular'] = '
                                                <button type="submit" class="formular_programare__actiune__Editare_button"
                                                        name="formular_programare__actiune" formaction="/formular/editareformular/' . $userName . '" value="Editare">Editare</button>        
                                                <button type="submit" class="formular_programare__actiune__sterge_button"
                                                        name="formular_programare__actiune" formaction="/formular/stergeformular/' . $userName . '" value="Sterge">Sterge</button>
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
                                                    name="formular_programare__actiune" formaction="/formular/acceptaformular/' . $userName . '" value="Accepta">Accepta</button>
                                                <button type="submit" class="formular_programare__actiune__respinge_button"
                                                    name="formular_programare__actiune" formaction="/formular/respingeformular/' . $userName . '" value="Respinge">Respinge</button>';
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
                            '<button type="submit" class="formular_programare__actiune__terminat_button"  name="formular_programare__actiune" formaction="/formular/terminareformular/' . $userName . '" value="Terminat" >Terminat</button>
                            <button type="submit" class="formular_programare__actiune__sterge_button"  name="formular_programare__actiune" formaction="/formular/stergeformular/' . $userName . '" value="Sterge">Sterge</button>';
                        }
                        else//client-> Sterge
                        {
                            $info['butoaneFormular'] = 
                            '<button type="submit" class="formular_programare__actiune__sterge_button"  name="formular_programare__actiune" formaction="/formular/stergeformular/' . $userName . '" value="Sterge">Sterge</button>';
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
        public function raspuns()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            if(isset($_POST['ascuns_selected_button']))
            {
                $oraSelectata = $_POST['ascuns_selected_button'];
                $_SESSION['oraSelectata'] = $oraSelectata;
            }

            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }

        public function terminat()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            // niste modificari si redirect la formular
            print_r($_POST);

            // header('Location: ' . URL . 'formular/' . $userName); // redirect la formular index(unde avem logica de printare view)
        }

        public function book()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            if(isset($_POST['ascuns_selected_button']))
            {
                $oraSelectata = $_POST['ascuns_selected_button'];
                $_SESSION['oraSelectata'] = $oraSelectata;
            }

            // niste modificari si redirect la formular
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }

        public function cancel()
		{//Array ( [ascuns_selected_button] => 2022-06-16 12:00 [calendar_action] => Cancel )
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            $modelFormular = $this->model('formularModel');
            $modelProgramare = $this->model('programareModel');

            if(isset($_POST['ascuns_selected_button']))
            {
                $oraSelectata = $_POST['ascuns_selected_button'];
                $actiune = $_POST['calendar_action'];
                if( $actiune == "Cancel")
                {
                    //verificam daca exista programarea respectiva intai
                    $oraSelectataFormatDate = DateTime::createFromFormat('Y-m-d H:i', $oraSelectata);
                    $programareResultat = $modelProgramare->checkProgramareByData($oraSelectataFormatDate->format('Y-m-d H:00:00'));
                    if($programareResultat != -1)
                    {
                        //trebuie sa anulam progrmare-> schimbam status refuzat
                        $modelFormular->schimbaStatus($currentFormId, "4");
                    }

                }
            }
            // niste modificari si redirect la formular
            header('Location: ' . URL . 'programare/'); // redirect la formular index(unde avem logica de printare view)
        }


        //III) Actiuni primite de pe butoanele din formular: trimite adauga accepta respinge terminat sterge
        public function trimite()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

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
            $modelUser = $this->model('userModel');

            if(isset(($_POST)))
            {

                if(!empty($_POST['formular_programare__date_client__u_name']) && !empty($_POST['formular_programare__date_client__phone']) && !empty($_POST['formular_programare__date_client__email']) && !empty($_POST['formular_programare__date_client__pass']))
                {
                    $userName = $_POST['formular_programare__date_client__u_name'];
                    $phone = $_POST['formular_programare__date_client__phone'];
                    $email = $_POST['formular_programare__date_client__email'];
                    $password = $_POST['formular_programare__date_client__pass'];
                    $modelUser->newUser($userName, $phone, $email, $password);

                    $user_exist = $modelUser->isDefined($userName);
                    if ($user_exist)
                    {
                        $_SESSION['userName'] = $userName;
                    }

                }

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
                    //Trecem si statusul de la 0 la 1 (de la Editare la Asteptare raspuns admin)
                    $modelFormular->schimbaStatus($currentFormId, "1");
                }
                
            }
            
            //redirect la formular index(unde avem logica de printare view)
            header('Location: ' . URL . 'formular/'); 
            //sau sa printam un view de multumire

        }

        public function adaugapiesa()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

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
                            if(!empty($_POST['formular_programare__brand']) && !empty($_POST['formular_programare__categorie']) && !empty($_POST['formular_programare__piesa']) && !empty($_POST['cantitate']))
                            {
                                // Array ( [id_formular_ascuns] => 102 [ora_programare] => 2022-05-18T09:00 [mesaj_nou_client] => zfsdgsdg [mesaj_nou_admin] => test test [formular_programare__brand] => Beta [formular_programare__categorie] => 7;Filtre [formular_programare__piesa] => 7;Filtru Benzina [cantitate] => 3 [formular_programare__actiune] => Add )
                                
                                //Datele extrase din POST dupa ce am verificat mai sus ca exista:
                                $nume_brand_selectat = $_POST['formular_programare__brand'];
                                $nume_categorie_selectata = explode (";", $_POST['formular_programare__categorie'])[1];
                                $nume_piesa_selectata = explode (";", $_POST['formular_programare__piesa'])[1];
                                $cantitate = $_POST['cantitate'];
                                // print_r("piesa:" . $nume_piesa_selectata ."brand:". $nume_brand_selectat . $nume_categorie_selectata);
                                //Cautam id-ul piesei dupa numele piesei, al brandului si al categoriei:
                                $piesaID = $modelStoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);

                                $formResultat = $modelFormular->getFormular($currentFormId);
                                $jsonPieseCurente = $formResultat['reserved_parts_list'];

                                // print_r($piesaID . ":" . $cantitate . " json curent =" .  $jsonPieseCurente);
                                $cantitateVerificataStoc = $modelStoc->verifcaCantitateStoc($piesaID , $cantitate);
                                if ($cantitateVerificataStoc)
                                {
                                    $stocCurent = $modelStoc->getStocPiesa($piesaID);
                                    $cantitateCurentaRezervata = 0;
                                    if ($stocCurent['cantitate_rezervata'])
                                    {
                                        $cantitateCurentaRezervata = $stocCurent['cantitate_rezervata'];
                                    }
                                    $cantitateCurentaRezervata = $cantitateCurentaRezervata + $cantitate;
                                    $cantitateVerificataStoc = $cantitateVerificataStoc - $cantitate;
                                    $modelStoc->updateRezervatStoc($piesaID , $cantitateCurentaRezervata);
                                    $modelStoc->updateCantitateStoc($piesaID , $cantitateVerificataStoc);

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
                                }
                                

                                
                                // print_r($jsonPieseCurente);
                                $modelFormular->updateListaPiese($currentFormId, $jsonPieseCurente );

                            }
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/' ); // redirect la formular index(unde avem logica de printare view)
        }

        public function stergepiesa()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
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
                                $stocCurent = $modelStoc->getStocPiesa($idPiesa);
                                $cantitateCurentaStoc = 0;
                                $cantitateCurentaRezervata = 0;
                                if ($stocCurent['cantitate_rezervata'])
                                {
                                    $cantitateCurentaRezervata = $stocCurent['cantitate_rezervata'];
                                }
                                if ($stocCurent['cantitate_stoc'])
                                {
                                    $cantitateCurentaStoc = $stocCurent['cantitate_stoc'];
                                }
                                $cantitateNouaStoc = $cantitateCurentaStoc + $jsonPieseCurente[$idPiesa];
                                $cantitateNouaRezervat = $cantitateCurentaRezervata - $jsonPieseCurente[$idPiesa];

                                // print_r( $idPiesa . ' stoc = ' . $cantitateCurentaStoc . '+' . $jsonPieseCurente[$idPiesa]);
                                // print_r( $idPiesa . ' rezervat = ' . $cantitateCurentaRezervata . '-' . $jsonPieseCurente[$idPiesa]);
                                $modelStoc->updateRezervatStoc($idPiesa , $cantitateNouaRezervat);
                                $modelStoc->updateCantitateStoc($idPiesa , $cantitateNouaStoc);

                                unset($jsonPieseCurente[$idPiesa]);
                            }
                            $jsonPieseCurente = json_encode($jsonPieseCurente);
                            // print_r($jsonPieseCurente);
                            $modelFormular->updateListaPiese($currentFormId, $jsonPieseCurente );
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }

        public function acceptaformular()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            
            // niste modificari si redirect la formular
            // print_r($_POST);
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
                        if($_POST['formular_programare__actiune'] == "Accepta")
                        {
                            
                            $formResultat = $modelFormular->getFormular($currentFormId);
                            $statusCurentFormular = $formResultat['status'];
                            if($statusCurentFormular == 1)
                            {
                                //Trecem si statusul de la 1 la 2 (de la Raspuns admin la Raspuns client)
                                $modelFormular->schimbaStatus($currentFormId, "2");
                            }
                            if($statusCurentFormular == 2)
                            {
                                //Trecem si statusul de la 2 la 3 (de la Raspuns client la Programat)
                                $modelFormular->schimbaStatus($currentFormId, "3");
                            }
                            
                        }
                    }
                }
            }

            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }
        public function respingeformular()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            // niste modificari si redirect la formular
            // print_r($_POST);

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
                        if($_POST['formular_programare__actiune'] == "Respinge")
                        {
                            //Trecem si statusul de la 1 la 4 (de la Raspuns admin la Refuzat)
                            $modelFormular->schimbaStatus($currentFormId, "4");
                        }
                    }
                }
            }
            
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }

        public function terminareformular()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            // niste modificari si redirect la formular
            // print_r($_POST);
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
                        if($_POST['formular_programare__actiune'] == "Terminat")
                        {
                            // print_r("Trebuie sa terminam formularul" . $currentFormId);
                            $formResultat = $modelFormular->getFormular($currentFormId);
                            $jsonPieseSelectate = $formResultat['reserved_parts_list'];
                            //decodam stringul cu piese curente in JSON , apoi adaugam piesa curenta si transformam JSON-ul inapoi in string si updatam formularul
                            $jsonPieseSelectate = json_decode($jsonPieseSelectate,true);
                            foreach($jsonPieseSelectate as $idPiesa => $cantitatePiesa)
                            {
                                if($idPiesa != 0)
                                {
                                    //consumam piesele din rezervare
                                    $stocCurent = $modelStoc->getStocPiesa($idPiesa);
                                    $cantitateCurentaStoc = 0;
                                    $cantitateCurentaRezervata = 0;
                                    if ($stocCurent['cantitate_rezervata'])
                                    {
                                        $cantitateCurentaRezervata = $stocCurent['cantitate_rezervata'];
                                    }
                                    // if ($stocCurent['cantitate_stoc'])
                                    // {
                                    //     $cantitateCurentaStoc = $stocCurent['cantitate_stoc'];
                                    // }
                                    // $cantitateNouaStoc = $cantitateCurentaStoc + $jsonPieseCurente[$idPiesa];
                                    $cantitateNouaRezervat = $cantitateCurentaRezervata - $jsonPieseSelectate[$idPiesa];
                                    $modelStoc->updateRezervatStoc($idPiesa , $cantitateNouaRezervat);
                                    // $modelStoc->updateCantitateStoc($idPiesa , $cantitateNouaStoc);
                                }
                            }
                            //marcam formularul ca terminat: de la 3 la 4 (de la Programat la Terminat)
                            $modelFormular->schimbaStatus($currentFormId, "4");
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }
        public function stergeformular()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            // niste modificari si redirect la formular
            // niste modificari si redirect la formular
            // print_r($_POST);
            $modelFisier = $this->model('fisierModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            if(isset(($_POST)))
            {
                if(isset($_POST['id_formular_ascuns']))
                {
                    $currentFormId = $_POST['id_formular_ascuns'];
                    if(isset($_POST['formular_programare__actiune']))
                    {
                        if($_POST['formular_programare__actiune'] == "Sterge")
                        {
                            // print_r("Trebuie sa stergem formularul" . $currentFormId);
                            $formResultat = $modelFormular->getFormular($currentFormId);
                            $jsonPieseSelectate = $formResultat['reserved_parts_list'];
                            // //decodam stringul cu piese curente in JSON , apoi adaugam piesa curenta si transformam JSON-ul inapoi in string si updatam formularul
                            $jsonPieseSelectate = json_decode($jsonPieseSelectate,true);
                            foreach($jsonPieseSelectate as $idPiesa => $cantitatePiesa)
                            {
                                if($idPiesa != 0)
                                {
                                    //mutam piesele din rezervare inapoi in stoc
                                    $stocCurent = $modelStoc->getStocPiesa($idPiesa);
                                    $cantitateCurentaStoc = 0;
                                    $cantitateCurentaRezervata = 0;
                                    if ($stocCurent['cantitate_rezervata'])
                                    {
                                        $cantitateCurentaRezervata = $stocCurent['cantitate_rezervata'];
                                    }
                                    if ($stocCurent['cantitate_stoc'])
                                    {
                                        $cantitateCurentaStoc = $stocCurent['cantitate_stoc'];
                                    }
                                    $cantitateNouaStoc = $cantitateCurentaStoc + $jsonPieseSelectate[$idPiesa];
                                    $cantitateNouaRezervat = $cantitateCurentaRezervata - $jsonPieseSelectate[$idPiesa];
                                    $modelStoc->updateRezervatStoc($idPiesa , $cantitateNouaRezervat);
                                    $modelStoc->updateCantitateStoc($idPiesa , $cantitateNouaStoc);
                                }
                            }
                            //stergem formular-ul / programarea si fisierele asociate 
                            $modelFormular->stergeDateProgramare($currentFormId);
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }

        public function editareformular()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            $modelFisier = $this->model('fisierModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');
            
            if(isset(($_POST)))
            {
                if(isset($_POST['id_formular_ascuns']))
                {
                    $currentFormId = $_POST['id_formular_ascuns'];
                    if(isset($_POST['formular_programare__actiune']))
                    {
                        if($_POST['formular_programare__actiune'] == "Editare")
                        {
                            // print_r("Trebuie sa aducem formularul " . $currentFormId) . " in stare de editare";
                            $modelFormular->schimbaStatus($currentFormId, "0");
                        }
                    }
                }
            }
            header('Location: ' . URL . 'formular/'); // redirect la formular index(unde avem logica de printare view)
        }
        

    }
    
    
?>