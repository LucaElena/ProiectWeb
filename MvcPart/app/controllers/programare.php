<?php
	class Programare extends Controller
	{   

        public function index($userName = "")
		{
            
            $info['username'] =  $userName;
            $user = $this->model('UserModel');
            $programare = $this->model('ProgramareModel');
            $info['butoane'] = "";
            $info['tabelProgram'] = "";
            $info['tabelSaptamanaProgram'] = "";
            

            $day = date('w');
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));

            $luna = date('M Y');
            $info['tabelLunaProgram'] = '<div class="programari__calendar__month" id="selected_month">' . strtoupper($luna) . '</div>';
            $status = "open";
            // print_r("Inceput saptamna = " . $week_start . " sfarsit = " . $week_end);
            // Inceput saptamna = 2022-05-15 00:00:00 sfarsit = 2022-05-21 23:59:59

            $programariSaptamnaCurenta = $programare->getProgramari( $week_start , $week_end );
            // print_r("Lista programari saptamana curenta :" );
            // print_r($programariSaptamnaCurenta);
            // Array ( [0] => Array ( [id_appointment] => 3 [date] => 2022-05-20 09:00:00 [status] => 1 [id_user] => 4 [id_form] => 3 ) [1] => Array ( [id_appointment] => 43 [date] => 2022-05-16 18:00:00 [status] => 1 [id_user] => 3 [id_form] => 43 ) [2] => Array ( [id_appointment] => 62 [date] => 2022-05-21 11:00:00 [status] => 1 [id_user] => 2 [id_form] => 62 ) [3] => Array ( [id_appointment] => 67 [date] => 2022-05-15 15:00:00 [status] => 1 [id_user] => 3 [id_form] => 67 ) )

            //TO DO : verificare si in sesion si pagina de Referer 
            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $info['butoane'] = '
                    <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" value="Book"> Book</button>';
                
                //pentru fiecare zi
                for ($i = 0; $i < 7; $i++) 
                {
                    $curentDay = DateTime::createFromFormat('Y-m-d', date("Y-m-d", strtotime("+".($i-$day + 1)." days")));
                    $info['tabelSaptamanaProgram'] = $info['tabelSaptamanaProgram'] . 
                    '
                        <div class="programari__calendar__inside__head">
                            <div class="programari__calendar__inside__day" id="day_' . $i . '_programare">' . strtoupper(date_format($curentDay, 'D d/m')) . '</div>
                        </div>
                    ';
                    //pentru fiecare ora din program
                    for ($j = 8; $j < 20; $j++) 
                    {
                        
                        $ora = date('h');
                        $oraCurenta = DateTime::createFromFormat('Y-m-d h', date("Y-m-d h", strtotime("-".($ora)." hours")));
                        print_r("\n" . date_format($oraCurenta, 'd:00'));

                        $info['tabelProgram'] = $info['tabelProgram']. 
                        '
                            <div class="programari__calendar__inside__hours_btn">
                                <button type="button" class="programari__calendar__inside__hours_btn__' . $status . '" name="button_progrmare_ora" value="08:00" id="calendar_row' . $i . '_col' . $j . '"> 08:00</button>
                            </div>
                        ';
                    }
                }

                
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