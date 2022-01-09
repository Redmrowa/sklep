<?php   
    require_once "host.php";
    session_start();
    if(!isset($_SESSION['czy_zalogowany']))
    {
        header('Location: index.php');
    }

    $connect= @new mysqli($host,$db_user,$db_pass,$db_name);
  
    $temp= $_SESSION['wynik_sesja'];

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
                <li><a> <?php
        
        echo "Zalogowano jako:          ".$_SESSION['user'];


        ?></a>
        </li>
            	<li><a href="menu.php">Strona główna</a></li>
				<li><a href="plyty_osb.php">Sklep</a></li>
                <li><a href="koszyk.php">Twój koszyk</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
                <li><a href="zamowienia.php">Zamówienia</a></li>
                <li><a href="logout.php">Wyloguj</a></li>
            </ul>
        </div>
	<div id="header_main_koszyk">
    
	</div>
    <div id="boxy_koszyk">
	<div id="boxy_koszyk_lewy">
		
		eHurtownia WSB<br>
		tel: 123 456 789<br>
		ul. Nowy Świat od 20<br>
		00 - 029 Warszawa<br>
		
	</div>
	<div id="boxy_koszyk_prawy">
	<img src = "kontakt.png" width = "450px" height = "450px">
	</div>
    </div>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>
