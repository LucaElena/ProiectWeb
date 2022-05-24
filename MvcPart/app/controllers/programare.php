<?php
	class Programare extends Controller
	{   

        public function index($userName = "", $dataStart = "" )
		{
            print_r("user = ".$userName ." data = ". $dataStart);
            $info['username'] =  $userName;
            $user = $this->model('UserModel');
            $programare = $this->model('ProgramareModel');
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

            //in general alegem saptama curenta
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$ziAcum.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$ziAcum).' days'));
            
            if($dataStart != "")
            {
                //Este setat un alt start decat cel curent -> alegem aceasta saptamana si ii extragem datele
                // $dataSetataStart =  DateTime::createFromFormat('Y-m-d H:i', date("Y-m-d H:i", strtotime($anStart ."-".$lunaStart."-".$ziStart." 00:00")));
                
                if (DateTime::createFromFormat('Y-m-d', $dataStart) !== false)
                {
                    $dataSetataStart =  new DateTime($dataStart);
                    $anStart = $dataSetataStart->format('Y');
                    $lunaStart = $dataSetataStart->format('m');
                    $ziStart = $dataSetataStart->format('w');
                    $oraStart = $dataSetataStart->format('H');
                        
                    $week_start = date('Y-m-d 00:00:00', strtotime('-'.$ziStart.' days'));
                    $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$ziStart).' days'));
                }
            }
            $lunaTabel = $dataSetataStart->format('M Y');
            $info['tabelLunaProgram'] = '<div class="programari__calendar__month" id="selected_month">' . strtoupper($lunaTabel) . '</div>';
            
            // print_r("Inceput saptamna = " . $week_start . " sfarsit = " . $week_end);
            // Inceput saptamna = 2022-05-15 00:00:00 sfarsit = 2022-05-21 23:59:59

            $programariSaptamnaCurenta = $programare->getProgramari( $week_start , $week_end );
            // print_r("Lista programari saptamana curenta :" );
            // print_r($programariSaptamnaCurenta);
            // Array ( [0] => Array ( [id_appointment] => 3 [date] => 2022-05-20 09:00:00 [status] => 1 [id_user] => 4 [id_form] => 3 ) [1] => Array ( [id_appointment] => 43 [date] => 2022-05-16 18:00:00 [status] => 1 [id_user] => 3 [id_form] => 43 ) [2] => Array ( [id_appointment] => 62 [date] => 2022-05-21 11:00:00 [status] => 1 [id_user] => 2 [id_form] => 62 ) [3] => Array ( [id_appointment] => 67 [date] => 2022-05-15 15:00:00 [status] => 1 [id_user] => 3 [id_form] => 67 ) )

            //pentru fiecare zi adaugam celule cu capul de tabel(zile si luna)
            for ($i = 0; $i < 7; $i++) 
            {
                // $curentDay = DateTime::createFromFormat('Y-m-d', date("Y-m-d", strtotime("+".($i-$ziAcum + 1)." days")));
                $curentDay = $dataSetataStart->format('D d/m');
                $info['tabelSaptamanaProgram'] = $info['tabelSaptamanaProgram'] . 
                '
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_' . $i . '_programare">' . strtoupper($curentDay) . '</div>
                    </div>
                ';
            }

            //pentru fiecare ora din program
            for ($j = 8; $j < 20; $j++) 
            {
                //pentru fiecare zi adaugam celule cu continutul tabelului de programare
                for ($i = 0; $i < 7; $i++) 
                {
                    $oraCurentaTabel = DateTime::createFromFormat('Y-m-d H', date("Y-m-d H", strtotime("+" . (($i-$ziAcum + 1)*24*60 - $oraAcum*60 + $j*60 - $minuteAcum)." minutes")));
                    $oraCurentaFormataTabel = strtoupper(date_format($oraCurentaTabel, 'H:i')); 
                    $status = "open";
                    foreach($programariSaptamnaCurenta as $programare)
                    {
                        $difenta = $oraCurentaTabel->diff(new DateTime($programare['date']));
                        if ($difenta->d == 0 && $difenta->h == 0)
                        {
                            $status = "busy";
                        }

                    }
                    $info['tabelProgram'] = $info['tabelProgram']. 
                    '
                        <div class="programari__calendar__inside__hours_btn">
                            <button type="button" class="programari__calendar__inside__hours_btn__' . $status . '" name="button_progrmare_ora" value="08:00" id="calendar_row' . $i . '_col' . $j . '"> ' . $oraCurentaFormataTabel . '</button>
                        </div>
                    ';
                }
            }


            //TO DO : verificare si in sesion si pagina de Referer 
            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $info['butoane'] = '
                    <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" value="Book"> Book</button>';
                $this->view('programare/index', $info);
            }
            else
            {
                $user_exist = $user->isDefined($userName);
				if ($user_exist)
				{
                    // $user_id = $user->getUserId($userName);
                    $user_type = $user->getUserType($userName);
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $info['butoane'] = '
                            <button type="submit" class="programari__btn__btn1" name="calendar_action" value="Raspuns" >Raspuns</button>
                            <button type="submit" class="programari__btn__btn2" name="calendar_action" value="Terminat" >Terminat</button>';
                        $this->view('programare/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        $info['butoane'] = '
                            <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" value="Book">Book</button>
                            <button type="submit" class="programari__btn__btn2" id="programari__btn__cancel" name="calendar_action" value="Cancel">Cancel</button>';
                        $this->view('programare/index', $info);
                    }
                }
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $info['butoane'] = '
                        <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" value="Book"> Book</button>';
                    $this->view('programare/index', $info);
                }
            }   
        }
    }
    
?>