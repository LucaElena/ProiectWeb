<?php
	class Istoric extends Controller
	{   

        public function index()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            
            //Status formular : Editare(0)->Astepare raspuns admin(1)->->Astepare accept client(2)->Programat(3) Refuzat(4) -> Terminat(5)
            $info['username'] =  $userName;
            $info['generalbar']  = "";
            $info['mesaj'] = "";
            $info['tabelIstoric'] = "";

            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');
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


            if ($userName == "")
            {
                $this->view('errors/403.php', $info);
            }
            else
            {
				if ($user_exist)
				{
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $info['mesaj'] = "Istoricul programarilor CyMaT:";
                        $adminIstoric = $modelProgramare->getAllIstoricProgramari();
                        
                        $i = 1;
                        foreach ($adminIstoric as $programare)
                        {
                            //convertim statusul intr-o varianta citibila
                            $status = "";
                            $actiune = "";
                            $statusBazaDate = $modelProgramare->getStatus($programare['id_form']);
                            
                            switch ($statusBazaDate) {
                                case 0://formular initial in editare de catre client
                                    $status = "Editare";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 1://formular in asteptare raspuns accept admin
                                    $status = "Astepare admin";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 2://formular in asteptare raspuns accept client
                                    $status = "Astepare client";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 3://formular programat
                                    $status = "Programat";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 4://formular refuzat si procesat-> piesele rezervate daca e cazul sunt sterse
                                    $status = "Refuzat";
                                    break;
                                case 5://formular terminat si procesat-> piesele utilizate sunt consumate din stoc 
                                    $status = "Terminat";
                                    break;
                                case -1://formular lipsa: nu am completat baza de date cu istoric complet 
                                    $status = "Lipsa formular";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                            }

                            //convertim data pentru a putea extrage anul/luna/ziua/ora
                            $dataProgramare = DateTime::createFromFormat('Y-m-d H:i:s', $programare['date']);

                            //Extragem si datele necesare pentru a calcula pretul:
                            $pret = 0;
                            $pieseUtilizate = $modelProgramare->getPieseUtilizate($programare['id_form']);

                            if ($pieseUtilizate)//Nu toate programarile au lista de produse utilizate
                            {
                                $jsonPieseUtilizate = json_decode($pieseUtilizate);
                                foreach($jsonPieseUtilizate as $idPiesa => $cantitatePiesa)
                                {
                                    // print_r($idPiesa .':'. $cantitatePiesa);
                                    $pretPiesaCurenta = $modelStoc->getPret($idPiesa);
                                    // print_r($idPiesa .':'. $cantitatePiesa .':'. $pretPiesaCurenta);
                                    $pret = $pret + $pretPiesaCurenta * $cantitatePiesa;
                                }
                            }
                            $info['tabelIstoric'] = $info['tabelIstoric'] .
                            ' 
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $dataProgramare->format('Y-m-d') . '</td>
                                        <td>' . $dataProgramare->format('H:i') . '</td>
                                        <td>' . $status . '</td>
                                        <td>' . $pret . '</td>
                                        <td>' . $actiune . '</td>
                                    </tr>
                            ';

                            $i++;
                        }

                        $this->view('istoric/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        $info['mesaj'] = "Istoricul programarilor dumneavoastra:";
                        $user_id = $modelUser->getUserId($userName);
                        $curentUserIstoric = $modelProgramare->getIstoricProgramari($user_id);
                        
                        $i = 1;
                        foreach ($curentUserIstoric as $programare)
                        {
                            //convertim statusul intr-o varianta citibila
                            $status = "";
                            $actiune = "";
                            $statusBazaDate = $modelProgramare->getStatus($programare['id_form']);
                            
                            switch ($statusBazaDate) {
                                case 0://formular initial in editare de catre client
                                    $status = "Editare";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 1://formular in asteptare raspuns accept admin
                                    $status = "Astepare admin";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 2://formular in asteptare raspuns accept client
                                    $status = "Astepare client";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 3://formular programat
                                    $status = "Programat";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                                case 4://formular refuzat si procesat-> piesele rezervate daca e cazul sunt sterse
                                    $status = "Refuzat";
                                    break;
                                case 5://formular terminat si procesat-> piesele utilizate sunt consumate din stoc 
                                    $status = "Terminat";
                                    break;
                                case -1://formular lipsa: nu am completat baza de date cu istoric complet 
                                    $status = "Lipsa formular";
                                    $actiune = '<button type="submit" class="istoric_programari__lista__actiune" 
                                    id="istoric_programari__lista__actiune" name="istoric_programari__lista__actiune" 
                                    value=' . $programare['id_form'] . '>Editare</button>';
                                    break;
                            }

                            //convertim data pentru a putea extrage anul/luna/ziua/ora
                            $dataProgramare = DateTime::createFromFormat('Y-m-d H:i:s', $programare['date']);

                            //Extragem si datele necesare pentru a calcula pretul:
                            $pret = 0;
                            $pieseUtilizate = $modelProgramare->getPieseUtilizate($programare['id_form']);

                            if ($pieseUtilizate)//Nu toate programarile au lista de produse utilizate
                            {
                                $jsonPieseUtilizate = json_decode($pieseUtilizate);
                                foreach($jsonPieseUtilizate as $idPiesa => $cantitatePiesa)
                                {
                                    // print_r($idPiesa .':'. $cantitatePiesa);
                                    $pretPiesaCurenta = $modelStoc->getPret($idPiesa);
                                    // print_r($idPiesa .':'. $cantitatePiesa .':'. $pretPiesaCurenta);
                                    $pret = $pret + $pretPiesaCurenta * $cantitatePiesa;
                                }
                            }
                            $info['tabelIstoric'] = $info['tabelIstoric'] .
                            ' 
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $dataProgramare->format('Y-m-d') . '</td>
                                        <td>' . $dataProgramare->format('H:i') . '</td>
                                        <td>' . $status . '</td>
                                        <td>' . $pret . '</td>
                                        <td>' . $actiune . '</td>
                                    </tr>
                            ';

                            $i++;
                        }
                        $this->view('istoric/index', $info);
                    }
                }
                else
                {
                    $this->view('errors/403.php', $info);
                }
            }   
        }
    }
    
?>