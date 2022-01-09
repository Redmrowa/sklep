<?php
session_start();

    if(isset($_POST['username']) && isset($_POST['password']) )
    {

            $pass = true;
            $nick = $_POST['username'];
            if( (strlen($nick)) <3 || (strlen($nick)) > 20 )
            {
                $pass = false;
                $_SESSION['error_nick'] = " Nieprawidłowa ilość znaków! ";


            }

            if($pass==true)
            {
                $password = $_POST['password'];
                $czy_password_alnum = ctype_alnum($password);

                if($czy_password_alnum == true)
                {
                    if((strlen($password)) < 4 ||(strlen($password)) > 11 )
                    {
                        $_SESSION['error_password'] = " Nieprawidłowa długość hasła! Długość od 4 do 11 znaków!";

                    }else
                    {
                        if( $password == $_POST['password2']  )
                        {
                            require_once "host.php";
                            $connect= @new mysqli($host,$db_user,$db_pass,$db_name);
                            $query_select = mysqli_query($connect, " SELECT * FROM uzytkownicy ");

                            while($r = $query_select->fetch_array())
                            {
                                    if($r[1] == $nick)
                                    {
                                        $_SESSION['error_password'] = "Użytkownik o takiej nazwie już istnieje!";
                                        $connect->close();

                                    }else
                                    {
                                        $password_hash=password_hash($password,PASSWORD_DEFAULT);
                                        $query_add= mysqli_query($connect," INSERT INTO uzytkownicy(ID_uzytkownicy,uzytkownik,haslo) VALUES
                                         ('', '$nick','$password_hash')");
                                        
                                        $connect->close();
                                        $_SESSION['pass_login'] = "Rejestracja przebiegła pomyślnie!";
                                        header('Location:index.php');
                                    }


                            }






                             
                        }else
                        {
                            $_SESSION['error_password'] = "Hasła muszą być identyczne!";

                        }

                    }

                }else
                {
                    $_SESSION['error_password'] = " Nieprawidłowa składnia hasła! Tylko litery i cyfry!";

                }


                
                //add
            }
    }

?>

<html >
<head>

<title>E-Hurtownia - Rejestracja</title>

    
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
       <form method="POST">

    <p>Nazwa użytkownika: </br> <input type="text" name="username"/> </p>
    <?php
        if(isset($_SESSION['error_nick']))
        {

         echo $_SESSION['error_nick'];
         unset($_SESSION['error_nick']);
        
        }
    ?>
    <p>   Hasło: </br> <input type="password" name="password"/> </p>
    <p>   Powtórz hasło: </br> <input type="password" name="password2"/> </p>
    <?php
        if(isset($_SESSION['error_password']))
        {

         echo $_SESSION['error_password'];
         unset($_SESSION['error_password']);
        
        }
    ?>
    </br>
    <input type="Submit" value="Zarejestruj się"/>

    </form>
    </br>
    <form action="index.php">
    <input type="Submit" value="Powrót do logowania"/>
    </form>

        </div>




    </div>

    
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</body>
</html>
