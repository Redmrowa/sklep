<?php
require_once "host.php";
session_start();
if(!isset($_SESSION['czy_zalogowany']))
{
    header('Location: index.php');
}

    if($_SESSION['user'] == 'Admin') //seller
    {?>
    <html >
<head>

<title>E-Hurtownia</title>

    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta ame="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="css/main_sg.css" />
 

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
                <li><a href="lista.php">Lista zamówień</a></li>
                <li><a href="editor.php">Edytuj ilości towaru</a></li>
                <li><a href="add_product.php">Dodaj nowy towar</a></li>
                <li><a href="logout.php">Wyloguj</a></li>
            </ul>
        </div>
	<div id="header_main">
    <div id="header_main_image">
    	<div id="header_main_text">
            <p>
         Nasza hurtownia sprowadza towary z najróżniejszych zakątków świata. Cechujemy się wyjątkową jakością oferowanych produktów
         i najlepszymi cenami na lokalnych rynkach.
            </p>
        </div>
        </div>
	</div>
   
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>




        <?php
    }
    else // user
    {?>
        <html >
<head>

<title>E-Hurtownia</title>

    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta ame="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="css/main_sg.css" />
 

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
	<div id="header_main">
    <div id="header_main_image">
    	<div id="header_main_text">
            <p>
         Nasza hurtownia sprowadza towary z najróżniejszych zakątków świata. Cechujemy się wyjątkową jakością oferowanych produktów
         i najlepszymi cenami na lokalnych rynkach.
            </p>
        </div>
        </div>
	</div>
   
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>


        <?php 
    }
?>
