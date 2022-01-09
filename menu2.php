<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Hurtownia</title>
		 <link rel="stylesheet" href="sql/main.css" />
	</head>
    <header><div class="info">
     <?php
        
        echo "Zalogowano jako:          ".$_SESSION['user'].      "</br>". "Numer sesji to:   ".$_SESSION['wynik_sesja'];


        ?>
    </div>
    <div class="logout">
       
    <div class="navi">
							<ul>
								<li class="special"  align= "right">
										<ul>
                                            <li><a href="menu.php">  Strona główna  </a></li><li><a href="koszyk.php">  Twój koszyk </a></li>
										</ul>
								</li>
							</ul>
        <form action="logout.php">
       <input type="submit" value="Wyloguj"/>
       </form>
						</div></header>
	<body>
		<div class="gora">
		<div class="logo">
			<img src="komputer.png" alt="hurtownia komputerowa"/>
		</div>
		<div class="listyiformularze">
			<ul>
				<li>Sprzęt</li>
					<ol>
						<li>Procesory</li>
						<li>Pamięci RAM</li>
						<li>Monitory</li>
						<li>Obudowy</li>
						<li>Karty graficzne</li>
						<li>Dyski twarde</li>
					</ol>
				<li>Oprogramowanie</li>
			</ul>
		</div>
		<div class="listyiformularze">
			<h2>Hurtownia komputerowa</h2>
			<form method="POST">
				<p>Wybierz kategorię sprzętu</p>
				<input type="number" name="id"/><input type="submit" value="SPRAWDŹ" name="sub">
			</form>
		</div>
		</div>
		<div class="glowny">
			<h1>Podzespoły we wskazanej kategorii</h1>
			<p>
				<?php
					$connect=mysqli_connect('localhost','root','','hurtownia');
					if(isset($_POST['sub']))
					{
					$id=$_POST['id'];
					$zapytanie=("SELECT * FROM produkty WHERE kategoria_id=".$id);
					$idzapytania=mysqli_query($connect,$zapytanie);
					
						foreach(mysqli_fetch_all($idzapytania,MYSQLI_ASSOC) as $result)
						{
							echo '<p>'.$result['nazwa'].'<br>'.' CENA: '.$result['cena'].' zł <br>'.$result['opis'].'<br>'.'<img src='.$result['zdjecie'].'/>'.'</p>';
						}
					
					}
					else
					{
						echo "Wybierz poprawną kategorię sprzętu";
					}
					mysqli_close($connect);
				?>
			</p>
		</div>
		<div class="stopka">
			<h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
			
			<p><a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
			Partnerzy: <a href="http://intel.pl">Intel</a> 
			<a href="http://amd.pl">AMD</a></p>
			
			<p>Stronę wykonał: 000111222333444</p>
		</div>
		
	
	</body>
</html>