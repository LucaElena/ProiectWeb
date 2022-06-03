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
            $info['butoaneFormular'] = '';
            $info['tabelPieseSelectateAdmin'] = '';
            $info['selectPieseOptionAdmin'] = '';
            
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
            $modelFisier = $this->model('fisierModel');

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
            $jsonPieseSelectate = "{}";
            $selectPieseOptionAdmin = "";
            $tabelPieseSelectateAdmin = "";

           
                
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

            $formResultat = $modelFormular->getFormular($formID);
            $statusPrimit = $formResultat['status'];
            $jsonPieseSelectate = $formResultat['reserved_parts_list'];
            $fisiereResultat = $modelFisier->getFisiere($formID);
            $fisiereDovada = "";

            


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
                     <select class="formular_programare__piese_necesare__cateorie" >
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
                     <select class="formular_programare__piese_necesare__piesa" >
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
                     '</select>
                     <input class="formular_programare__piese_necesare__cantitate" type="number"
                         id="formular_programare__piese_necesare__cantitate" name="cantitate" value=1 min="1" max="10"
                         required>
                     <button type="button" class="formular_programare__piese_necesare__adauga" name="formular_programare__actiune"
                         value="Add"><i class="fas fa-plus"></i>Add</button>';


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
                    foreach($jsonPieseSelectate as $idPiesa => $cantitatePiesa)
                    {
                        $pretPiesaCurenta = $modelStoc->getPret($idPiesa);
                        $infoPiesa = $modelStoc->getPret($idPiesa);
                        // $pret = $pret + $pretPiesaCurenta * $cantitatePiesa;
                        $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                            '<tr>
                                <td>' . $i . '</td>
                                <td>HONDA</td>
                                <td>Electrice</td>
                                <td>Acumulator</td>
                                <td>1</td>
                                <td>' . $pretPiesaCurenta . '</td>
                                <td><i class="fas fa-trash-alt"></i></td>
                            </tr>';
                    }
                    $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                            '<tr>
                                <td></td>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>' . $pretPiesaCurenta . '</td>
                                <td></td>
                            </tr>';
                }                                     
                 $tabelPieseSelectateAdmin = $tabelPieseSelectateAdmin . 
                                                         '</tbody>
                                                     </table>';
            }

            


            
            //In functie de status-ul primit , userul curent si actiunea facem o logica diferita 
            switch ($statusPrimit) {
                case 0://formular initial in editare de catre client/admin
                    $status = "Editare";
                    $mesajClient = '
                            <textarea name="new-messag-client" class="formular_programare__mesaj_client__txt"  cols="10" rows="3" placeholder="Mesaj client cu descrierea problemei" required autofocus></textarea>
                            <input type="file" accept="video/*,image/*" multiple="multiple" class="formular_programare__mesaj_client__video" required>
                            ';
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '<button type="submit" class="formular_programare__actiune__trimite_button" name="formular_programare__actiune" value="Trmite" > Trimite</button>';
                    
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
                            $mesajAdmin = '<textarea name="new-messag-admin" class="formular_programare__mesaj_admin__txt" cols="10" rows="3"
                                            placeholder="Scrieti raspuns pentru client" required></textarea>
                                    ';
                            $info['selectPieseOptionAdmin'] = $selectPieseOptionAdmin;
                            $info['tabelPieseSelectateAdmin'] = $tabelPieseSelectateAdmin;
                            $info['butoaneFormular'] = '<button type="submit" class="formular_programare__actiune__accepta_button"
                                                        name="formular_programare__actiune" value="Accepta">Accepta</button>
                                                    <button type="submit" class="formular_programare__actiune__respinge_button"
                                                        name="formular_programare__actiune" value="Respinge">Respinge</button>';
                        }
                        else//client
                        {//poate sa stearga cererea
                            $info['butoaneFormular'] = '
                                                <button type="submit" class="formular_programare__actiune__Editare_button"
                                                        name="formular_programare__actiune" value="Editare">Editare</button>        
                                                <button type="submit" class="formular_programare__actiune__sterge_button"
                                                        name="formular_programare__actiune" value="Sterge">Sterge</button>
                                                    ';
                        }
                    }
    
                    break;
                case 2://formular in asteptare raspuns accept client
                    $status = "Astepare client";
                    $mesajClient = "";
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '';
                    break;
                case 3://formular programat
                    $status = "Programat";
                    $mesajClient = "";
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '';
                    break;
                case 4://formular refuzat si procesat-> piesele rezervate daca e cazul sunt sterse
                    $status = "Refuzat";
                    $mesajClient = "";
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '';
                    break;
                case 5://formular terminat si procesat-> piesele utilizate sunt consumate din stoc 
                    $status = "Terminat";
                    $mesajClient = "";
                    $mesajClient = $mesajClient . $fisiereDovada;
                    $mesajAdmin = "";
                    $info['butoaneFormular'] = '';
                    break;
                case -1://formular lipsa: nu am completat baza de date cu istoric complet 
                    $status = "Lipsa formular";
                    $mesajClient = "";
                    $mesajClient = $mesajClient . $fisiereDovada;
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
    }
    
?>