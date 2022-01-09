<?php
require_once "host.php";
session_start();
if(!isset($_SESSION['czy_zalogowany']))
{
    header('Location: index.php');
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
		 		
    <?php
            
                   
               $connect=mysqli_connect('localhost','root','','hurtownia');
               $query_count_category = mysqli_query($connect, "SELECT COUNT(Id_kategorii) from kategorie");
               while($s = $query_count_category->fetch_array())
               {
                     $value_max_category =  $s[0];

               }
           




               ?> 

		<!--<form action="" method="POST">
		<?php $category = 1; ?>
			<input type="submit" value="1" name="category"/>
		</form>
		<form action="" method="POST">
           <input type="submit" value="2" name="category"/>
		</form>
		<form action="" method="POST">
           <input type="submit" value="3" name="category"/>
		</form>
	 
	   <form action="" method="POST">
			<select name="choice">
			  <option value="1" name="category">Płyty OSB</option>
			  <option value="2" name="category">Łączniki</option>
			  <option value="3" name="category">Kołki</option>
			</select>
	   </form>-->

			<ol>
                <li><a href="plyty_osb.php">Płyty OSB</a></li>
                <li><a href="laczniki.php">Łączniki</a></li>
                <li><a href="kolki.php">Kołki</a></li>
                <li><a href="plyty_gips_wlo.php">Płyty gipsowo-włóknowe</a></li>
                <li><a href="profile_sufitowe.php">Profile sufitowe</a></li>
                <li><a href="plyty_gipsowe.php">Płyty gipsowe</a></li>
                <li><a href="pedzle.php">Pędzle</a></li>
            </ol>


	</div>
    <div id="boxy">
    <div id="boxy_box_2">
    		
    <?php 
                
                if(@$_POST['category'])
                {
                    $category = $_POST['category'];
                }
                $query = mysqli_query($connect, "SELECT * FROM produkty where kategoria_id = $category ");

                $zamowienia = [];
				unset($zamowienia);
                    if(@$_POST['zamowienia'])
                    {
                        $zamowienia = @$_POST['zamowienia'];
                    }

                    while ($r = $query->fetch_array()) {
						
					
						echo "<div class='produkt'>";
                        echo "<form action='' method='POST''>";
                        echo "<br><p> ".$r[2]."<br> Cena: ".$r[3]." zł brutto (23% VAT)<br> Dostępność: ".$r[4]." szt<br><br><img  src='".$r[6]."'/>". "<br></p><br>";
                        echo "<input type=number min=0 max=10 name='zamowienia[".$r[0]."]' />";
                        echo "<input type=submit value=Zamów />";
                        echo "</form>";
						echo "</div>";
						
						
						
                    }
                    ?>
                


    </div>
    <div id="boxy_box_3">
    <?php
                        $temp = $_SESSION['wynik_sesja'];
                      //  $temp_nazwa_koszyk = mysqli_query($connect,"SELECT nazwa from produkty inner join sesje on produkty.id = sesje.id_produktu where id_sesji = '$temp' ");
                        
						
						
						if(@$zamowienia == null){ }else{
                            
                        foreach (@$zamowienia as $key => $value) {
                            if(@$value >0){
                                
                                    $zapytanie = mysqli_query($connect,"SELECT nazwa FROM produkty WHERE id=$key");

                                    while($q = $zapytanie->fetch_array()){

                                        echo "<br>Dodano do koszyka:<br> ". $q[0]."<br>Ilość: ".$value;

                                    }
                                
                           
                                $query_run = mysqli_query($connect,"INSERT INTO sesje(id,id_sesji,id_produktu,ilosc) VALUES ('','$temp',$key,$value)");
                                $query_run2 = mysqli_query($connect,"INSERT INTO sesje_czyszcz(id,id_sesji,id_produktu,ilosc) VALUES ('','$temp',$key,$value)");
                            //   $koszyk_run = mysqli_query($connect,"INSERT INTO koszyk(ID_koszyka ,nazwa_koszyk ,cena_koszyk ,ilosc_koszyk ,nazwa_sesji) VALUES ('','$temp_nazwa_koszyk','',$value,'$temp') ");

								

                            }
							
                        }
						}
						
                        ?>
                        <br>

<?php 
						$count= mysqli_query($connect, "SELECT COUNT(id_sesji) from sesje where id_sesji ='$temp'");
						$f = $count->fetch_array();
							if( $f[0] >= 2)
							{
								
								echo '<form action="koszyk.php" method="POST">';
								echo '<input type="submit" value="Przejdz do zamówienia"/>	';
								echo '</form>';
								
							}else
							{
								echo '<form action="" method="POST">';
								echo '<input type="submit" value="Przejdz do zamówienia"/>	';
								echo '</form>';
								echo "<p>Koszyk jest pusty!</p>";
								
								
								
							};
							
						?>
    </div>
    </div>
    
    </div>
</body>
</html>
