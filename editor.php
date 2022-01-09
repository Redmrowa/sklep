<?php   
    require_once "host.php";
    session_start();
    if(!isset($_SESSION['czy_zalogowany']))
    {
        header('Location: index.php');
    }

    $connect= @new mysqli($host,$db_user,$db_pass,$db_name);
  
    $temp= $_SESSION['wynik_sesja'];
  
    if($_SESSION['user'] == "Admin")
    {

    }else{
        header(('Location: index.php'));
    }

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
                <li><a href="lista.php">Lista zamówień</a></li>
                <li><a href="editor.php">Edytuj ilości towaru</a></li>
                <li><a href="add_product.php">Dodaj nowy towar</a></li>
                <li><a href="logout.php">Wyloguj</a></li>
            </ul>
        </div>
	<div id="header_main_koszyk">
    
	</div>
    <div id="boxy_koszyk">
	<div id="boxy_koszyk_lewy">

    <?php 
                
                
                $query = mysqli_query($connect, "SELECT * FROM produkty");

                $zamowienia = [];
				unset($zamowienia);
                    if(@$_POST['zamowienia'])
                    {
                        $zamowienia = @$_POST['zamowienia'];
                    }
                    echo "<table> <tr>  <td>Kategoria</td> <td> Nazwa produktu </td> <td> Cena(szt) </td> <td> Ilość/szt </td><td> Wartość</td>  </tr>";
                    while ($r = $query->fetch_array()) {
						
                        
                        $query_name_category = mysqli_query($connect, "SELECT nazwa_kategorii FROM kategorie WHERE Id_kategorii = $r[1] ");
                       $d= $query_name_category->fetch_array();


                        echo "<form action='' method='POST''>";

                                echo "<tr> <td>".$d[0]."</td><td>".$r[2]."</td><td>".$r[3]."</td><td>".$r[4]."
                                </td><td><input type=number min=0 max=10000 name='zamowienia[".$r[0]."]'/ value='".$r[4]."'> </td><td><input type=submit value=Zmień /></td></tr>";
                                
                            
                        echo "</form>";


                   
						
						
						
                    }
                    echo "</table>";
                   
                    if(@$zamowienia == null){ }else{
                        foreach (@$zamowienia as $key => $value) {
                            if(@$value >0){
                                
                
                               
                          
                                $query_run = mysqli_query($connect,"UPDATE produkty SET ilosc_produktow = $value WHERE id = $key");

                               
						

                            }
							
                        }
						}
                        
                    ?>








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
