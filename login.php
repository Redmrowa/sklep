<?php
session_start();

if( (!isset($_POST['login'])) || (!isset($_POST['haslo']))  )
{
    header('Location: index.php');
    exit();

}
require_once "host.php";


function RandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

   


$connect= @new mysqli($host,$db_user,$db_pass,$db_name);

if($connect->connect_errno!=0)
{
    echo "Błąd".$connect->connect_errno;

}else
{
    $login =$_POST['login'];
    $haslo=$_POST['haslo'];
  

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    

    $query_hash=mysqli_query($connect,"SELECT haslo FROM uzytkownicy WHERE uzytkownik= '$login'");
    while($query_hash_d=$query_hash->fetch_array())
    {
        $hash=$query_hash_d[0];
        
    }
    if(password_verify($haslo,$hash) == true){
        $haslo = $hash;
    }else{
        $haslo = "falsz";
    };
    

    $query="SELECT * FROM uzytkownicy WHERE uzytkownik= '$login' AND haslo='$haslo'";
   
  
   if($result =@$connect->query($query))
   {

        $count_result = $result->num_rows; 
        if($count_result>0)
        {
            $sesja_generator = RandomString();
            
            $query_session_query = "INSERT INTO sesje(id,id_sesji,id_produktu,ilosc) VALUES ('','$sesja_generator','','')";
            $query_session =@$connect->query($query_session_query);


            $query_do_id_sesji = "SELECT id_sesji FROM sesje ORDER BY id DESC LIMIT 1";
            $query_do_id_sesji_run = @$connect->query($query_do_id_sesji);
           $row2 = $query_do_id_sesji_run->fetch_assoc();
            $_SESSION['wynik_sesja'] = $row2['id_sesji'];
            


            $query_sesje_uzytkownik="INSERT INTO sesje_uzytkownik(id,id_sesji_var,login) VALUES ('','$sesja_generator','$login')";
            $query_uzytkownik=@$connect->query($query_sesje_uzytkownik);

                





            $_SESSION['czy_zalogowany'] = true;

                // IMPORTANT

            $row=$result->fetch_assoc();
            $_SESSION['user'] = $row['uzytkownik'];
           





            $result->free_result();
            unset($_SESSION['error']);
            header('Location: menu.php');
        }else
        {
            
            $_SESSION['error'] ='<span style=color:red>"Logowanie nie powiodło się, spróbuj ponownie"</span>';
            header('Location: index.php');
        }

   }
  
   $connect->close();

}


?>
