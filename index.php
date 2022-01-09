<?php
session_start();
if( isset($_SESSION['czy_zalogowany']) && ($_SESSION['czy_zalogowany']==true) )
{
    header('Location:menu.php');
    exit();

}
?>
<html >
<head>

<title>E-Hurtownia</title>

    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta ame="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="css/main.css" />
 

</head>
<body>

	<div id="container">

        <div id="header_logo">
        	<a href="#"><img src="images/e_hurtownia.png" height="75px" alt="Logo" /></a>
        </div>
        <div id="header_menu">
        
            <ul>
            	<li><a >Panel logowania</a></li>
               
            </ul>
        </div>
	
    <div id="boxy_login">
    
    <?php
              if(isset($_SESSION['pass_login']))
              {
      
               echo $_SESSION['pass_login'];
               unset($_SESSION['pass_login']);
              
              }
       ?>
       <div class="log">
        <form action="login.php" method="post">
         <h4> 
         

        Login: </br> <input type="text" name="login"/></br> 
        Hasło: </br> <input type="password" name="haslo"></br>
    <br>
        <input type="submit" value="zaloguj"/>

        <p>Nie masz jeszcze konta? Zarejestruj się!</p>
       
</h4> 
        </form>
        <form action="register.php">
        <input type="submit" value="Utwórz nowe konto"/>
        </form>
    <?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
    } 
    ?>
        </div>




    </div>
    <div id="boxy_box_2_login">        <img src="images/login.png"/></div>
    
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>
