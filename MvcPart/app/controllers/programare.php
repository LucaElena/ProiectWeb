<?php
	class Programare extends Controller
	{   

        public function index($dataStart = "" )
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            $modelUser = $this->model('userModel');
            $modelProgramare = $this->model('programareModel');

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


            $info['username'] =  $userName;
            $info['butoane'] = "";
            $info['tabelProgram'] = "";
            $info['tabelSaptamanaProgram'] = "";
            
            $week_start = "";
            $week_end = "";

            //Data din momentul rularii:
            // $dataSetataStart = DateTime::createFromFormat('Y-m-d H:i',date("Y-m-d H:i", strtotime("now")));
            $dataSetataStart = new DateTime('now');
            $anAcum = $dataSetataStart->format('Y');
            $lunaAcum = $dataSetataStart->format('m');
            $ziAcum = $dataSetataStart->format('w');
            $oraAcum = $dataSetataStart->format('H');
            $minuteAcum = $dataSetataStart->format('i');

            //Data de la care trebuie sa incepem in general 
            $anStart = $anAcum;
            $lunaStart = $lunaAcum;
            $ziStart = $ziAcum;
            $oraStart = $oraAcum;

            //In general alegem saptama curenta
            // $weekStart = date('Y-m-d 00:00:00', strtotime('-' . ($ziStart ) .' days'));
            // $weekEnd = date('Y-m-d 23:59:59', strtotime('+' . (6-$ziStart) . ' days'));
            $weekStart = date("Y-m-d  00:00:00", strtotime('monday this week', strtotime(date('Y-m-d'))));
            $weekEnd = date("Y-m-d 23:59:59", strtotime('sunday this week', strtotime(date('Y-m-d'))));

            
            if($dataStart != "")
            {// data primita ca parametru nu este goala
                // print_r(" Data nu este goala");
                if (DateTime::createFromFormat('Y-m-d', $dataStart) !== false)
                {// data primita poate fi convertita in timp

                    //Este setat un alt start decat cel curent -> alegem aceasta saptamana si ii extragem datele
                    $dataSetataStart =  DateTime::createFromFormat('Y-m-d H:i', $dataStart . ' 00:01');
                    $anStart = $dataSetataStart->format('Y');
                    $lunaStart = $dataSetataStart->format('m');
                    $ziStart = $dataSetataStart->format('w');
                    $oraStart = $dataSetataStart->format('H');
                    
                    //Construim un obiect de tip data cu inceputul si sfarsitul
                    $weekStart = date('Y-m-d 00:00:00', strtotime('monday this week', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                    $weekEnd = date('Y-m-d 23:59:59', strtotime('sunday this week', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                }
            }
            $lunaTabel = $dataSetataStart->format('M Y');
            $info['tabelLunaProgram'] = '<div class="programari__calendar__month" id="selected_month">' . strtoupper($lunaTabel) . '</div>';
            print_r("zi start = " . $ziStart);
            
            print_r("Inceput saptamna = " . $weekStart . " sfarsit = " . $weekEnd);
            // Inceput saptamna = 2022-05-15 00:00:00 sfarsit = 2022-05-21 23:59:59

            $programariSaptamnaCurenta = $modelProgramare->getProgramari( $weekStart , $weekEnd );
            // print_r("Lista programari saptamana curenta :" );
            // print_r($programariSaptamnaCurenta);
            // Array ( [0] => Array ( [id_appointment] => 3 [date] => 2022-05-20 09:00:00 [status] => 1 [id_user] => 4 [id_form] => 3 ) [1] => Array ( [id_appointment] => 43 [date] => 2022-05-16 18:00:00 [status] => 1 [id_user] => 3 [id_form] => 43 ) [2] => Array ( [id_appointment] => 62 [date] => 2022-05-21 11:00:00 [status] => 1 [id_user] => 2 [id_form] => 62 ) [3] => Array ( [id_appointment] => 67 [date] => 2022-05-15 15:00:00 [status] => 1 [id_user] => 3 [id_form] => 67 ) )

            //pentru fiecare zi adaugam celule cu capul de tabel(zile si luna)
            for ($i = 0; $i < 7; $i++) 
            {
                $curentDay = date('D d/m', strtotime("+".($i)." days", strtotime($weekStart)));
                $info['tabelSaptamanaProgram'] = $info['tabelSaptamanaProgram'] . 
                '
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_' . $i . '_programare">' . strtoupper($curentDay) . '</div>
                    </div>
                ';
            }

            $dataSetataStart =  DateTime::createFromFormat('Y-m-d H:i:s', $weekStart);
            print_r("zi acum:" . $ziAcum . " ora acum:" . $oraAcum . " minute acum:" . $minuteAcum);
            //pentru fiecare ora din program
            for ($j = 1; $j <= 12; $j++) //ora
            {
                //Incepem de la 8 la 20
                $oraCurentaInt = $j + 7;
                //pentru fiecare zi adaugam celule cu continutul tabelului de programare
                for ($i = 1; $i <= 7; $i++) //zi
                {
                    
                    // $oraCurentaTabel = DateTime::createFromFormat('Y-m-d H', date("Y-m-d H", strtotime("+" . (($i-$ziAcum)*24*60 - $oraAcum*60 + $oraCurentaInt*60 - $minuteAcum)." minutes")));
                    $oraCurentaTabel = DateTime::createFromFormat('Y-m-d H', date("Y-m-d H", strtotime("+" . (($i-$ziAcum)*24*60 - $oraAcum*60 + $oraCurentaInt*60 - $minuteAcum)." minutes")));
                    $oraCurentaFormataTabel = strtoupper(date_format($oraCurentaTabel, 'H:i')); 
                    $ziuaCurentaFormataTabel = date_format($oraCurentaTabel, 'Y-m-d H:i'); 
                    print_r(" j=" . $j . " i=" . $i . " data=" . $ziuaCurentaFormataTabel);
                    $status = "open";
                    $hover = "";
                    foreach($programariSaptamnaCurenta as $programare)
                    {
                        //o am deja in baza de date? compar la nivel de zi si ora prin diferenta
                        $difenta = $oraCurentaTabel->diff(new DateTime($programare['date']));
                        if ($difenta->d == 0 && $difenta->h == 0)
                        {
                            $status = "busy";//gri
                            // $status == "busy"//clasa cu gri cu mai putine informatii 
                            // $status = "bussy"//clasa cu rosu si mai multe informatii in hover
                            //admin  ori //utilizator normal si programare ce ii apartine
                            if (($user_exist && $user_type) || ($user_exist && $user_type == 0 && $programare["id_user"] == $user_id))
                            {
                                $status = "bussy";//rosu
                                if ($programare["id_user"] != 0)
                                {
                                    $dateUserProgramare = $modelUser->getUserData($programare["id_user"]);
                                    $hover = '<span class="hover-value">'. $dateUserProgramare['user_name'] . ' ' . $dateUserProgramare['phone'] . ' '. $dateUserProgramare['email'] .'</span>';
                                    // print_r($dateUserProgramare);
                                }
                                
                            }
                            
                        }

                    }
                    //daca ora curenta e mai veche decat timpul actual totul este ocupat(NU putem programa in trecut)
                    if( new DateTime("now") > $oraCurentaTabel && $status !="bussy")
                    {
                        $status = "busy";
                        // print_r("</br>" . $j . ":" . $i . " ". $status .":" . date_format($oraCurentaTabel , 'Y-m-d H') . " " . date_format(new DateTime("now") , 'Y-m-d H'));
                    }
                    // $info['tabelProgram'] = $info['tabelProgram']. 
                    // '
                    //     <div class="programari__calendar__inside__hours_btn">
                    //         <button type="button" class="programari__calendar__inside__hours_btn__' . $status . '" name="button_progrmare_ora" value="' . $ziuaCurentaFormataTabel . '" id="calendar_row' . $i . '_col' . $j . '"> ' . $oraCurentaFormataTabel .  $hover . '</button>
                    //         <input type="hidden" id="calendar_ascuns_row' . $i . '_col' . $j . '" name="calendar_ascuns_row' . $i . '_col' . $j . '" value="' . $ziuaCurentaFormataTabel . '">
                    //     </div>
                    // ';
                    $info['tabelProgram'] = $info['tabelProgram']. 
                    '
                        <div class="programari__calendar__inside__hours_btn">
                            <button type="button" class="programari__calendar__inside__hours_btn__' . $status . '" name="button_progrmare_ora" value="' . $ziuaCurentaFormataTabel . '" id="calendar_row' . $i . '_col' . $j . '"> ' . $oraCurentaFormataTabel .  $hover . '</button>
                        </div>
                    ';
                    
                }
            }


            //TO DO : verificare si in sesion si pagina de Referer 
            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $info['butoane'] = '
                    <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" formaction="/formular/book" value="Book"> Book</button>';
                $this->view('programare/index', $info);
            }
            else
            {
                $user_exist = $modelUser->isDefined($userName);
				if ($user_exist)
				{
                    
                    $user_type = $modelUser->getUserType($userName);
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $info['butoane'] = '
                            <button type="submit" class="programari__btn__btn1" name="calendar_action" formaction="/formular/raspuns/' . $userName . '" value="Raspuns" >Raspuns</button>
                            <button type="submit" class="programari__btn__btn2" name="calendar_action" formaction="/formular/terminat/' . $userName . '"value="Terminat" >Terminat</button>';
                        $this->view('programare/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        $info['butoane'] = '
                            <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" formaction="/formular/book/' . $userName . '" value="Book">Book</button>
                            <button type="submit" class="programari__btn__btn2" id="programari__btn__cancel" name="calendar_action" formaction="/formular/cancel/' . $userName . '" value="Cancel">Cancel</button>';
                        $this->view('programare/index', $info);
                    }
                }
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $info['butoane'] = '
                        <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" formaction="/formular/book/' . $userName . '" value="Book"> Book</button>';
                    $this->view('programare/index', $info);
                }
            }   
        }


        public function updatestatus()
		{
           
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            
            //Json pentru raspuns la request-ul AJAX de trimitere status programari
            $raspuns =  array("status" => 0 , "data" => array() , "error" => "");
            $user = $this->model('UserModel');
            $programare = $this->model('ProgramareModel');
            $user_exist = 0;
            $user_type = 0;
            $user_id = "";
            $weekStart = '';
            $weekEnd = '';
            $dataSetataStart = '';

            if ($userName != "")
            {
                $user_exist = $modelUser->isDefined($userName);
                if ($user_exist)
                {
                    $user_id = $modelUser->getUserId($userName);
                    $user_type = $modelUser->getUserType($userName);
                }
            }
            

           //Aparent $_POST nu este completat automat in cazul unui json-> trebuie sa il luam neprelucrat noi:
            $json = file_get_contents('php://input');
            $values = json_decode($json, true);


            //firstday = 0 -> Incepand cu ziua la care suntem
            //firstday = 1 -> Incepand cu prima Luni din saptamana la care suntem
            //firstday = 2 -> Incepand cu prima luni din luna la care suntem
            
            if(isset($values["currentDay"]) && isset($values["firstDay"]))
            {

                // $raspuns["error"] = $values["currentDay"];
                //2022-06-29T21:00:00.000Z
                if (DateTime::createFromFormat('m/d/Y',  $values["currentDay"]) !== false)
                {
                    
                    
                    //Extragem datele din ziua curenta
                    $dataSetataStart =  DateTime::createFromFormat('m/d/Y H:i', $values["currentDay"] . ' 00:01');
                    $anAcum = $dataSetataStart->format('Y');
                    $lunaAcum = $dataSetataStart->format('m');
                    $ziAcum = $dataSetataStart->format('w');
                    $oraAcum = $dataSetataStart->format('H');
                    $minuteAcum = $dataSetataStart->format('i');

                    //Construim un obiect de tip data cu inceputul si sfarsitul
                    if ($values["firstDay"] == 0)
                    {
                        $weekStart = date('Y-m-d 00:00:00', strtotime($dataSetataStart->format('Y-m-d H:i:s')));
                        $weekEnd = date('Y-m-d 23:59:59', strtotime('-6 days', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                    }
                    if ($values["firstDay"] == 1)
                    {
                        $weekStart = date('Y-m-d 00:00:00', strtotime('monday this week', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                        $weekEnd = date('Y-m-d 23:59:59', strtotime('sunday this week', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                    }
                    if ($values["firstDay"] == 2)
                    {
                        $weekStart = date('Y-m-d 00:00:00', strtotime('first monday this month', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                        $weekEnd = date('Y-m-d 23:59:59', strtotime('+7 days', strtotime($dataSetataStart->format('Y-m-d H:i:s'))));
                    }
                   
                    $programariSaptamnaCurenta = $modelProgramare->getProgramari( $weekStart , $weekEnd );
                    $raspuns["status"] = 1;
                    

                    for ($j = 1; $j <= 12; $j++) 
                    {
                        //Incepem de la 8 la 20
                        $oraCurentaInt = $j + 7;
                        //pentru fiecare zi adaugam celule cu continutul tabelului de programare
                        for ($i = 1; $i <= 7; $i++) 
                        {
                            
                            // $oraCurentaTabel = DateTime::createFromFormat('Y-m-d H', date("Y-m-d H", strtotime("+" . (($i-$ziAcum + 1)*24*60 - $oraAcum*60 + $oraCurentaInt*60 - $minuteAcum)." minutes")));
                            $oraCurentaTabel = DateTime::createFromFormat('Y-m-d H:i:s' , date('Y-m-d H:i:s', strtotime("+" . (($i-$ziAcum )*24*60 - $oraAcum*60 + $oraCurentaInt*60 - $minuteAcum)." minutes" , strtotime($dataSetataStart->format('Y-m-d H:i:s')))));
                            $oraCurentaFormataTabel = strtoupper(date_format($oraCurentaTabel, 'H:i')); 
                            $status = "open";
                            $hover = "";
                            foreach($programariSaptamnaCurenta as $programare)
                            {
                                $difenta = $oraCurentaTabel->diff(new DateTime($programare['date']));
                                if ($difenta->d == 0 && $difenta->h == 0)
                                {
                                    $status = "busy";
                                    // print_r($oraCurentaTabel . " " . DateTime("now"));
                                    // $status == "busy"//clasa cu gri cu mai putine informatii 
                                    // $status = "bussy"//clasa cu rosu si mai multe informatii in hover
                                    //admin  ori //utilizator normal si programare ce ii apartine
                                    if (($user_exist && $user_type) || ($user_exist && $user_type == 0 && $programare["id_user"] == $user_id))
                                    {
                                        $status = "bussy";
                                        $dateUserProgramare = $modelUser->getUserData($programare["id_user"]);
                                        $hover = '<span class="hover-value">'. $dateUserProgramare['user_name'] . ' ' . $dateUserProgramare['phone'] . ' '. $dateUserProgramare['email'] .'</span>';
                                        $raspuns["error"] = " user_exist:" . $user_exist ." user_type:". $user_type ." programare user id =".  $programare["id_user"] ." user id current=". $user_id;
                                    }
                                }
                                //Daca data curenta e mai mica decat data de acum totul este ocupat
                                if( new DateTime("now") > $oraCurentaTabel && $status != "bussy")
                                {
                                    $status = "busy";
                                    // print_r("</br>" . $j . ":" . $i . " ". $status .":" . date_format($oraCurentaTabel , 'Y-m-d H') . " " . date_format(new DateTime("now") , 'Y-m-d H'));
                                }
                                
                            }
                            
                            
                            array_push( $raspuns["data"], array("i" => $i, "j" => $j , "status" => $status , "hover" => $hover));
                        }
                    }
                    

                }
                else
                {
                    $raspuns["error"] = " currentDay = " . $values["currentDay"] . " firstDay = " . $values["firstDay"];
                }
                
                
            }

            $raspuns["error"] = " currentDay = " . $values["currentDay"] . " firstDay = " . $values["firstDay"] . " weekStart = " . $weekStart . " weekEnd = " . $weekEnd . " dataSetataStart = " . $dataSetataStart->format('Y-m-d H:i:s');
            // Trimitem json-ul cu raspunsul
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($raspuns);

        }
        
    }
    
?>