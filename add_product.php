<?php   
$_SESSION['error_name'] = false;
    require_once "host.php";
    session_start();
    if(!isset($_SESSION['czy_zalogowany']))
    {
        header('Location: index.php');
    }
    if($_SESSION['user'] == "Admin")
    {

    }else{
        header(('Location: index.php'));
    }
 //   <tr><td> <a >Nazwa produktu: </a></td><td> <input type="textbox" name="product_name"/></td></tr>
 //   <tr><td> <a >Cena produktu: </a></td><td> <input type="number" min=0,01  name="product_prince"/></td></tr>
 //   <tr><td> <a >Ilość produktu: </a></td><td> <input type="number" min=1 max=10000 name="product_count"/></td></tr>
  //  <tr><td> <a >Opis produktu: </a></td><td> <input type="textbox" name="product_descript"/></td></tr>
    
    $connect= @new mysqli($host,$db_user,$db_pass,$db_name);
  
    $temp= $_SESSION['wynik_sesja'];
    
    if(@isset($_POST['product_name']))
    {   
        
        $name = @$_POST['product_name'];
        if(strlen($name) <= 3)
        {
            $_SESSION['error'] = "Nazwa musi być dłuższa niż 3 znaki";
        }else
        {
            $prince = $_POST['product_prince'];
            $count = $_POST['product_count'];
            $descript = $_POST['product_descript'];
            $category = $_POST['product_category'];
            
            $query = mysqli_query($connect,"SELECT nazwa FROM produkty");
            while($query_d = $query->fetch_array())
            {
                if($name == $query_d[0])
                {
                    $_SESSION['error'] = "Nazwa już występuje!";
                    break;
                }
            }
            if(@$_SESSION['error'] == "Nazwa już występuje!")
            {

            }else
            {
                $query2= mysqli_query($connect,"INSERT INTO produkty (id,kategoria_id,nazwa,cena,ilosc_produktow,opis,zdjecie) 
                VALUES ('','$category','$name','$prince','$count','$descript','photo')");
                $_SESSION['error'] = "Pomyślnie dodano produkt do bazy";
                
            }

        }

    }else
    {
        $_SESSION['error'] = "Nieprawidłowa nazwa lub jej brak!";
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
        <div id="boxy_koszyk_lewy_fonty">
        <a> Dodawanie nowego towaru do sklepu</a>


        <form action='' method="POST">
                    </br>
                    <table>
                        <tr><td> <a >Nazwa produktu: </a></td><td> <input type="textbox" name="product_name"/></td></tr>
                        <tr><td> <a >Cena produktu: </a></td><td> <input type="number" min=0,01  name="product_prince"/></td></tr>
                        <tr><td> <a >Ilość produktu: </a></td><td> <input type="number" min=1 value=1 max=10000 name="product_count"/></td></tr>
                        <tr><td> <a >Opis produktu: </a></td><td> <input type="textbox" name="product_descript"/></td></tr>
                        <tr><td> <a >Kategoria: </a></td><td> <input type="number" min= 1 max=7 value=1 name="product_category"/> </td>
                        </tr>
                        
                        
                    </table>
                        </br><input type ="submit" value="Dodaj produkt"/>
                      
        </form>
        <?php
                if(isset($_SESSION['error']))
                {
                    echo "<a>".$_SESSION['error']."</a>";
                    unset($_SESSION['error']);
                }
        ?>







</div>
	</div>
	<div id="boxy_koszyk_prawy">
	<?php
        $query3= mysqli_query($connect,"SELECT * FROM kategorie");
                echo "<table>";
                echo "<tr><td>Numer kategorii</td><td>Nazwa kategorii</td></tr>";
        while($query3_d=$query3->fetch_array())
        {
            echo "<tr><td>".$query3_d[0]."</td><td>".$query3_d[1]."</td</tr>";

        }
        echo "</table>";

?>
	</div>
    </div>
    <div id="footer">
     <br> <a>Wszelkie prawa zastrzeżone: eHurtownia WSB</a>
    </div>
    </div>
</body>
</html>
