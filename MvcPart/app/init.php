<?php

    require_once 'core/App.php'; 
    require_once 'core/Controller.php';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    define('URL', 'http://localhost/');
	
    // Sql config:
    define('DB_TYPE', 'mysql');
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'moto_service');
    define('DB_USER', 'moto');
    define('DB_PASS', 'moto');
    

	// APPROOT
	define('APPROOT', dirname(__FILE__));

	// URLROOT
	define('URLROOT', 'http://localhost/');

	// SITENAME
	define('SITENAME', 'Cycling Maintenance Web Tool');

    //Templates:   
	define('BARA_CLIENT_NELOGAT' , '
			<li>
                <a class="logo" href="/home/CLIENT_NELOGAT">

                    <!-- <span class="header_icon_logo"> <i class="fas fa-clinic-medical"></i> </span> -->
                    <span class="header_icon_logo"> &#128757; </span>
                    <img class="logo" src="../images/favicon.png" alt="CyMaT">
                    <!-- <span class="header_icon"> <i class="fas fa-calendar-plus"></i> </span>
                        <span class="header_text">Logo</span> -->
                </a>
            </li>


            <li>
                <a class="header_button" href="/programare/CLIENT_NELOGAT">
                    <!-- <span class="header_icon"> <i class="fas fa-calendar-plus"></i> </span> -->
                    <span class="header_icon"> &#128197; </span>
                    <span class="header_text">Program</span>
                </a>
            </li>

            <li>
                <a class="header_button" href="/formular/CLIENT_NELOGAT">
                    <!-- <span class="header_icon"> <i class="fa fa-check-square"></i> </span>	 -->
                    <span class="header_icon"> &#128193; </span>
                    <span class="header_text">Formular</span>
                </a>
            </li>

            <li>
                <a class="header_button" >

                </a>
            </li>
            <li>
                <a class="header_button">
                    <!-- <span class="header_icon"> <i class="fas fa-user"></i> </span> -->
                    <span class="header_icon"> &#128100; </span>
                    <span class="header_text">User</span>
                </a>
                <ul class="header_button__login">
                    <li>
                        <a class="header_button" href="/signup/CLIENT_NELOGAT">
                            <!-- <span class="header_icon"> <i class="fas fa-key"></i> </span> -->
                            <span class="header_icon"> &#9919; </span>

                            <span class="header_text">Sign up</span>
                        </a>
                    </li>
                    <li>
                        <a class="header_button" href="/login/CLIENT_NELOGAT">
                            <!-- <span class="header_icon"> <i class="fas fa-sign-out-alt"></i> </span>	 -->
                            <span class="header_icon"> &#9094; </span>

                            <span class="header_text">Log in</span>
                        </a>
                    </li>
                </ul>

            </li>
	');
    define('BARA_CLIENT_MOTO' , '
							<li>
								<a class="logo" href="/home/">

									<!-- <span class="header_icon_logo"> <i class="fas fa-clinic-medical"></i> </span> -->
									<span class="header_icon_logo"> &#128757; </span>
									<img class="logo" src="../images/favicon.png" alt="CyMaT">
									<!-- <span class="header_icon"> <i class="fas fa-calendar-plus"></i> </span>
										<span class="header_text">Logo</span> -->
								</a>
							</li>


							<li>
								<a class="header_button" href="/programare/">
									<!-- <span class="header_icon"> <i class="fas fa-calendar-plus"></i> </span> -->
									<span class="header_icon"> &#128197; </span>
									<span class="header_text">Program</span>
								</a>
							</li>

							<li>
								<a class="header_button" href="/formular/">
									<!-- <span class="header_icon"> <i class="fa fa-check-square"></i> </span>	 -->
									<span class="header_icon"> &#128193; </span>
									<span class="header_text">Formular</span>
								</a>
							</li>

							<li>
								<a class="header_button" href="/istoric/">
									<span class="header_icon"> <i class="fas fa-comments"></i> </span>
									<span class="header_text">Istoric</span>
								</a>
							</li>

							<li>
								<a class="header_button">
									<!-- <span class="header_icon"> <i class="fas fa-user"></i> </span> -->
									<span class="header_icon"> &#128100; </span>
									<span class="header_text">User</span>
								</a>
								<ul class="header_button__login">
									<li>
										<a class="header_button" href="/changepass/">
											<!-- <span class="header_icon"> <i class="fas fa-key"></i> </span> -->
											<span class="header_icon"> &#9919; </span>
											<span class="header_text">Reset password</span>
										</a>
									</li>
									<li>
										<a class="header_button" href="/signout/">
											<!-- <span class="header_icon"> <i class="fas fa-sign-out-alt"></i> </span>	 -->
											<span class="header_icon"> &#9094; </span>
											<span class="header_text">Log out</span>
										</a>
									</li>
								</ul>

							</li>
    ');

	//TO DO
    define('BARA_ADMIN_MOTO' , '
							<li>
								<a class="logo" href="/home/">

										<span class="header_icon_logo"> &#128757; </span>
										<img class="logo" src="../images/favicon.png" alt="CyMaT">
								</a>
							</li>


							<li>
								<a class="header_button" href="/programare/">
										<span class="header_icon"> &#128197; </span>
										<span class="header_text">Program</span>
								</a>
							</li>

							<li>
								<a class="header_button">
										<span class="header_icon"> <i class="fas fa-plus"></i> </span>
										<span class="header_text">Adauga</span>
								</a>
								<ul class="header_button__login">
										<li>
												<a class="header_button" href="/adaugacomanda/">
														<span class="header_icon"> <i class="fas fa-dolly"></i> </span>
														<span class="header_text">Comanda</span>
												</a>
										</li>

								</ul>

							</li>

							<li>
								<a class="header_button">
										<span class="header_icon"> <i class="fas fa-cubes"></i> </span>
										<span class="header_text">Administrare</span>
								</a>
								<ul class="header_button__login">
										<li>
												<a class="header_button" href="/istoric/">
														<span class="header_icon"> &#8987;</span>

														<span class="header_text">Programari</span>
												</a>
										</li>
										<li>
												<a class="header_button" href="/stoc/">
														<span class="header_icon"> <i class="fas fa-cubes"></i> </span>
														<span class="header_text">Stoc</span>
												</a>
										</li>
										<li>
												<a class="header_button" href="/comenzi/">
														<span class="header_icon"> <i class="fas fa-dolly"></i> </span>
														<span class="header_text">Comenzi</span>
												</a>
										</li>
										<li>
												<a class="header_button" href="/exportimport/">
														<span class="header_icon"> <i class="fas fa-download"></i>
														</span>
														<span class="header_text">Date</span>
												</a>
										</li>

								</ul>

							</li>
							<li>
								<a class="header_button">
										<span class="header_icon"> &#128100; </span>
										<span class="header_text">User</span>
								</a>
								<ul class="header_button__login">
										<li>
												<a class="header_button" href="/changepass/">
														<span class="header_icon"> <i class="fas fa-key"></i> </span>
														<span class="header_text">Reset password</span>
												</a>
										</li>
										<li>
												<a class="header_button" href="/signout/">
														<span class="header_icon"> <i class="fas fa-sign-out-alt"></i>
														</span>
														<span class="header_text">Log out</span>
												</a>
										</li>
								</ul>

							</li>'
);

	#echo(" 1:Hello from init<br>");

?>


