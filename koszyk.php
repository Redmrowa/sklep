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
    <div id="boxy_koszyk">
	<div id="boxy_koszyk_lewy">
	<ol>
     <?php
   
      

         $query2 = mysqli_query($connect, "SELECT nazwa, cena, ilosc, id_produktu from produkty INNER join sesje_czyszcz on produkty.id = sesje_czyszcz.id_produktu where id_sesji = '$temp'");
         $suma=0;
         echo "<table> <tr> <td>Lp.</td> <td> Nazwa produktu </td> <td> Ilość(szt) </td> <td> Cena/szt </tr>";
         $counter=1;
        while ($r = $query2->fetch_array()) {
           
      //       $id_produktu_z_r = $r[3];
            echo "<tr>";
            echo "<td>".$counter."</td><td>".$r[0]."</td><td>".$r[2]."</td><td>".$r[1]." zł</td>";
           // $update = @$_POST['aktualizacja'];  
          //  $query_update = mysqli_query($connect, "UPDATE sesje SET ilosc=$update WHERE id_produktu =$id_produktu_z_r AND id_sesji = '$temp'");         
        //    echo $update;    
          echo "</tr>";
          $counter++;
            $suma = $suma + ($r[2] * $r[1]);
           
            $_SESSION['suma_zamowienia'] = $suma;
        
        }
        echo "</table>";

      
        echo "<BR><h2> Do zapłaty: ".$suma ." zł brutto </h2>";

     
      
        if($suma == 0)
        {
            echo " <form action='menu.php' method='POST'> ";
                    
            echo "<BR> <input type='submit' value='Anuluj'/>   ";
                
            
            echo "</form>";
         


        }else
        {
            echo " <form action='koniec_zamowienia.php' method='POST'> ";
                    
            echo "<BR> <input type='submit' value='Potwierdzam zamówienie'/>   ";
                
            
            echo "</form>";
            echo " <form action='menu.php' method='POST'> ";
                    
            echo "<BR> <input type='submit' value='Anuluj'/>   ";
                
            
            echo "</form>";
         

        }
        
		
		       
    
     
        
?>
</ol>
	</div>
	<div id="boxy_koszyk_prawy">
	<img src = "koszyk.png" width = "450px" height = "450px">
	</div>
    </div>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>
