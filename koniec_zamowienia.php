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

<html>

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
	<center>
    <div id="boxy_koszyk">
    <h1>Zamówienie zostało złożone!</h1>
    <p> Suma zamówienia wynosi <?php echo $_SESSION['suma_zamowienia'];?> zł brutto </p>

    <?php
	
    $query2 = mysqli_query($connect, "SELECT nazwa, cena, ilosc, id_produktu from produkty INNER join sesje_czyszcz on produkty.id = sesje_czyszcz.id_produktu where id_sesji = '$temp'");

  
        
  
	   while ($r = $query2->fetch_array()) {
           
    
            echo "<p>NAZWA ".$r[0]."  CENA: ".$r[1]." ILOSC: ".$r[2]."</p>";
			$query_ilosc = mysqli_query($connect, "SELECT ilosc_produktow FROM produkty");
		
		$query_delete = mysqli_query($connect," UPDATE produkty SET ilosc_produktow=(ilosc_produktow - $r[2]) where id = $r[3]   ");
		
		
		
	   }
	   
	   

		$_SESSION['suma_zamowienia'] = 0;
         $query = mysqli_query($connect, "DELETE FROM sesje_czyszcz WHERE id_sesji = '$temp' AND id_produktu>=1" );

         
        
     

        


    ?>
    <form action="menu.php">
    <input type="submit" href= "menu.php" value="Powrót"/>
    </form>
  
 <h2>Dziękujemy za zakup w naszej hurtowni, polecamy się na przyszłość!</h2>

    </div>
	</center>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>

</body>

</html>