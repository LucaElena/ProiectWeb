<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/PaginaLogin.css">
        <script src="https://kit.fontawesome.com/9ab9988c3d.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/jpg" href="../images/favicon.png" />
        <title>CyMaT</title>

    </head>
    <body>
        <header>
            <ul>
                <?=$data['generalbar']?>
            </ul>
        </header>


        <div class="login">
            <div class="login__content">
                
               
                <div class="login__forms">
                    
                    <form action="/login" class="login__registre" id="login-in" method="post">
                        
                        <h1 class="title">Sign In : <?=$data['mesajEroare']?> </h1>
    
                        <div class="input-group">
                            <input type="text" placeholder="Username" name="user_name" minlength="5" maxlength="20" class="login-input" required>
                        </div>
    
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" minlength="5" maxlength="20" class="login-input" required>
                        </div>

                        <!-- <div>
                            <span class="login__account">Forgot password?</span>
                            <span class="login__signin" id="change-pass">Change Password</span>
                        </div> -->

                        <!-- <a href="./PaginaGeneralaClient.html" class="login__button">Sign In</a> -->
                        <button type="submit" class="login__button" name="login_button" value="Sign In">Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>

                    <form action="/signup" class="login__create none" id="login-up" method="post">
                        <h1 class="title">Create Account: <?=$data['mesajEroare']?></h1>
    
                        <div class="input-group">
                            
                            <input type="text" class="login-input" minlength="5" maxlength="20" placeholder="Username" required>
                        </div>
    
                        <div class="input-group">
                            
                            <input type="email" class="login-input" minlength="10" maxlength="30" placeholder="Email" required>
                        </div>

                        <div class="input-group">
                            
                            <input type="password" class="login-input" minlength="5" maxlength="20" placeholder="Password" required>
                        </div>

                        <!-- <a class="login__button">Sign Up</a> -->
                        <button type="submit" class="login__button" name="login_button" value="Sign Up">Sign Up</button>


                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <span class="login__signup" id="sign-in">Sign In</span>
                        </div>

                        
                    </form>
                    
                    <form action="/changepass" class="login__change__pass none" id="login-forgot" method="post">
                        <h1 class="title">Change Password : <?=$data['mesajEroare']?> </h1>
    
                        <div class="input-group">
                            
                            <input type="email" class="login-input" minlength="10" maxlength="30" placeholder="Email" required>
                        </div>
    

                        <div class="input-group">
                            
                            <input type="password" class="login-input" minlength="5" maxlength="20" placeholder="New_Password" required>
                        </div>

                        <!-- <a href="./PaginaGeneralaClient.html" class="login__button">Save</a> -->
                        <button type="submit" class="login__button" name="login_button" value="Save">Save</button>

                        <div>
                            <span class="login__account">You want to give up ?</span>
                            <span class="login__pass" id="sign-in1">Sign In</span>
                        </div>
                    </form>
                
                </div>

                
            </div>
        </div>

        
        <script src="../js/login.js"></script>
    </body>
</html>