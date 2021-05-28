<?php
//Prosta Walidacja

if(!empty($_POST)) {
    $name = $_POST['first_name'];
    $surname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    

    $namelen = strlen($name);
    $surnamelen= strlen($surname);
    $emaillen= strlen($email);
    $phonelen= strlen($phone);
    $messagelen= strlen($message);
    $max = 20;
    $minname = 2;
    $minemail = 7;
    $minphone = 9;
    $minmessage = 20;
    $maxmessage = 100;

    if($namelen < $minname){
        $errors[] = "Imię musi zawierać co najmniej 2 znaki ";
    } elseif($namelen > $max){
        $errors[] = "Imię musi być krótsze niż 20 znaków";
    }

    if($surnamelen < $minemail){
        $errors[] = "Nazwisko musi zawierać co najmniej 7 znaków";
    } elseif($surnamelen > $max){
        $errors[] = "Nazwisko musi być krótsze niż 20 znkaów";
    }

    if($emaillen < $minemail){
        $errors[] = "Email musi zawierać co najmniej 7 znaków";
    } elseif($emaillen > $max){
        $errors[] = "Email nie może byc krótszy niż 20 znaków";
    }

    if($phonelen < $minemail){
        $errors[] = "Numer telefonu musi zawierać co najmniej 5 znaków";
    } elseif($phonelen > $max){
        $errors[] = "Numer teleofnu nie może być krótszy niż 20 znkaów";
    }

    if($messagelen < $minmessage){
        $errors[] = "Wiadomość musi zawierać co najmniej 20 znaków";
    } elseif($messagelen > $maxmessage){
        $errors[] = "Wiadomość nie może być krótsza niż 100 znkaów";
    }

  
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

}
// Kod do połączenia się z baza danych i wysłanie wartości


$link = mysqli_connect("localhost", "root", "", "insert");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);
 
$sql = "INSERT INTO form (first_name, last_name, email, phone, message) VALUES
 ('$first_name', '$last_name', '$email', '$phone', '$message')";
if(mysqli_query($link, $sql)){
    echo "Formularz wysłano poprawnie.";
} else{
    echo "Błąd: nie można wykonać $sql. " . mysqli_error($link);
}
 
mysqli_close($link);

//Kod który umożliwia pobieranie danych

$link = mysqli_connect("localhost", "root", "", "insert");  
 $sql ="SELECT * FROM form ";  
 $result = mysqli_query($link, $sql);  

 if(isset($_POST["export"]))  
 {  
      $link = mysqli_connect("localhost", "root", "", "insert");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('first_name', 'last_name', 'email', 'phone', 'message'));  
      $sql = "SELECT * from form ";  
      $result = mysqli_query($link, $sql);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  

 ?>  