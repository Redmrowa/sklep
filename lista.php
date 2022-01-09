<?php   
    require_once "host.php";
    session_start();
    if(!isset($_SESSION['czy_zalogowany']))
    {
        header('Location: index.php');
    }

    $connect= @new mysqli($host,$db_user,$db_pass,$db_name);
  
    $temp= $_SESSION['wynik_sesja'];
    if($_SESSION['user'] == 'Admin') //seller
    {?>


<html>

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
    <div id="header_main_koszyk">
    
	</div>
	<center>
    <div id="boxy_koszyk">
   


    <?php
	$nazwa_usera = $_SESSION['user'];
  //  echo $nazwa_usera;
	
    $query2 = mysqli_query($connect, "SELECT  nazwa, cena, ilosc, id_produktu, login from produkty INNER join sesje on produkty.id = sesje.id_produktu INNER JOIN sesje_uzytkownik on sesje.id_sesji = sesje_uzytkownik.id_sesji_var ");

      
        $counter = 1;
        echo "<table> <tr> <td>Lp.</td> <td> Nazwa produktu </td> <td> Ilość(szt) </td> <td> Cena/szt  </td><td>Wartość</td> <td>Użytkownik</td> </tr>";
	   while ($r = $query2->fetch_array()) {
        $suma_wartosc =0;
            echo "<tr>";
          //  echo "<p>NAZWA ".$r[0]."  CENA: ".$r[1]." ILOSC: ".$r[2]."</p>";
          $suma_wartosc = $r[1] * $r[2];
            echo "<td>".$counter."</td><td>".$r[0]."</td><td>".$r[2]."</td><td>".$r[1]." zł</td><td>".$suma_wartosc."zł</td> <td>".$r[4]."<td>";
		
		
            echo "</tr>";
            $counter++;
	   }
	   
	   echo "</table>";

		
        // $query = mysqli_query($connect, "DELETE FROM sesje WHERE id_sesji = '$temp' AND id_produktu>=1" );

         
        
     

        


    ?>
    </br>
    <form action="menu.php">
    <input type="submit" href= "menu.php" value="Powrót"/>
    </form>


    </div>
	</center>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>

</body>

</html>

<?php
    }
    else // user
    {?>

    <html>

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
    <div id="header_main_koszyk">
    
	</div>
	<center>
    <div id="boxy_koszyk">
   


    <?php
	$nazwa_usera = $_SESSION['user'];
  //  echo $nazwa_usera;
	
    $query2 = mysqli_query($connect, "SELECT  nazwa, cena, ilosc, id_produktu, login from produkty INNER join sesje on produkty.id = sesje.id_produktu INNER JOIN sesje_uzytkownik on sesje.id_sesji = sesje_uzytkownik.id_sesji_var where login ='$nazwa_usera'");

      
        $counter = 1;
        echo "<table> <tr> <td>Lp.</td> <td> Nazwa produktu </td> <td> Ilość(szt) </td> <td> Cena/szt  </td><td>Wartość</td> </tr>";
	   while ($r = $query2->fetch_array()) {
        $suma_wartosc =0;
            echo "<tr>";
          //  echo "<p>NAZWA ".$r[0]."  CENA: ".$r[1]." ILOSC: ".$r[2]."</p>";
          $suma_wartosc = $r[1] * $r[2];
            echo "<td>".$counter."</td><td>".$r[0]."</td><td>".$r[2]."</td><td>".$r[1]." zł</td><td>".$suma_wartosc."zł</td>";
		
		
            echo "</tr>";
            $counter++;
	   }
	   
	   echo "</table>";

		
        // $query = mysqli_query($connect, "DELETE FROM sesje WHERE id_sesji = '$temp' AND id_produktu>=1" );

         
        
     

        


    ?>
    </br>
    <form action="menu.php">
    <input type="submit" href= "menu.php" value="Powrót"/>
    </form>


    </div>
	</center>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    <?php 
    }
?>
