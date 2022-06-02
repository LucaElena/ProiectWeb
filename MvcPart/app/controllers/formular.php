<?php
	class Formular extends Controller
	{   

        public function index($userName = "", )
		{
            
            //Status formular : Editare(0)->Astepare raspuns admin(1)->->Astepare accept client(2)->Programat(3) Refuzat(4) -> Terminat(5)
            $oraSelectata = "2022-05-18 09:00";
            if(isset($_POST['ascuns_selected_button']))
            {
                $oraSelectata = $_POST['ascuns_selected_button'];
            }
            
            $statusPrimit = 0;
            $info['username'] =  $userName;
            $oraSelectataFormatDate = DateTime::createFromFormat('Y-m-d H:i', $oraSelectata);
            $info['oraSelectata'] =  $oraSelectataFormatDate->format('Y-m-d')."T".$oraSelectataFormatDate->format('H:00');
            $info['oraSelectataMin'] =  $oraSelectataFormatDate->format('Y-m-d')."T09:00";
            $info['oraSelectataMax'] =  $oraSelectataFormatDate->format('Y-m-d')."T19:00";
            
            $actiuneFormular = -1;
            if(isset($_POST['calendar_action']))
            {
                
                switch ($_POST['calendar_action']) {
                    case "Book"://un client vrea sa faca o cerere programare
                        $actiuneFormular = 0;
                        break;
                    case "Cancel"://un client vrea sa anuleze o programare in orice stadiu
                        $actiuneFormular = 1;
                        break;
                    case "Raspuns"://admin-ul vrea sa raspunda la o cerere de programare
                        $actiuneFormular = 2;
                        break;
                    case "Terminat"://admin-ul marcheaza ca terminata o programare-> pentru a consuma piesele rezervate.
                        $actiuneFormular = 3;
                        break;
                }
            }

            $mesajClient = "";
            $mesajAdmin = "";

            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');
            $modelFormular = $this->model('formularModel');
            $modelStoc = $this->model('stocModel');

            $user_exist = 0;
            $user_type = 0;
            $user_id = "";

            if ($userName != "")
            {
                $user_exist = $modelUser->isDefined($userName);
                if ($user_exist)
                {
                    $user_id = $modelUser->getUserId($userName);
                    $user_type = $modelUser->getUserType($userName);
                }
            }

            //Trebuie sa verficam daca deja avem un formular la data respectiva.
            //Daca nu avem si suntem in modul "Book" -> trebuie sa creiem un formular initial
            //Si apoi sa il completam pe parcurs ce clientul si adminul il completeaza
            $formID = 0;
            $programareID = 0;
            // print_r($oraSelectataFormatDate->format('Y-m-d H:00:00'));
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
                // print_r($countProgramari);
            }
            else
            {
                print_r("Avem deja acesta data in programari:");
                print_r($programareResultat);
                //Avem deja acesta data in programari -> trebuie sa o updatam in functie parametrii primiti
                $formID = $programareResultat['id_form'];
                $programareID = $programareResultat['id_appointment'];
            }


            

            switch ($statusPrimit) {
                case 0://formular initial in editare de catre client/admin
                    $status = "Editare";
                    $mesajClient = '
                            <textarea name="new-messag-client" class="formular_programare__mesaj_client__txt"  cols="10" rows="3" placeholder="Mesaj client cu descrierea problemei" required autofocus></textarea>
                            <input type="file" accept="video/*,image/*" multiple="multiple" class="formular_programare__mesaj_client__video" required>
                            ';
                    $mesajAdmin = "";
                    break;
                case 1://formular in asteptare raspuns accept admin
                    $status = "Astepare admin";
                    $mesajClient = "";
                    $mesajAdmin = "";
                    break;
                case 2://formular in asteptare raspuns accept client
                    $status = "Astepare client";
                    $mesajClient = "";
                    $mesajAdmin = "";
                    break;
                case 3://formular programat
                    $status = "Programat";
                    $mesajClient = "";
                    $mesajAdmin = "";
                    break;
                case 4://formular refuzat si procesat-> piesele rezervate daca e cazul sunt sterse
                    $status = "Refuzat";
                    $mesajClient = "";
                    $mesajAdmin = "";
                    break;
                case 5://formular terminat si procesat-> piesele utilizate sunt consumate din stoc 
                    $status = "Terminat";
                    break;
                case -1://formular lipsa: nu am completat baza de date cu istoric complet 
                    $status = "Lipsa formular";
                    $mesajClient = "";
                    $mesajAdmin = "";
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
    }
    
?>