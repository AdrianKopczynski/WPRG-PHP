<?php
    session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="wpisy.php">Zobacz zgloszenia</a>
    <?php  
    if (isset($_COOKIE["s26990"])){
        echo "Użytkownik wysłał już zgłoszenie<br>";
    } else {
        if(!isset($_GET['submit']) && !isset($_GET['accept'])){
            echo '<form action="" method="get">';
            echo '<label for="name">Imię:</label>';
            echo '<input type="text" name="name" id="name"><br>';
            echo '<label for="surname">Nazwisko:</label>';
            echo '<input type="text" name="surname" id="surname"><br>';
            echo '<label for="email">Email:</label>';
            echo '<input type="email" name="email" id="email"><br>';
            echo '<label for="error">Treść zgłoszenia</label>';
            echo '<textarea name="errorText" id="errorText" rows=4 max=255></textarea><br>';
            echo '<input type="submit" name="submit" value="Wyślij zgłoszenie">';
            echo '</form>';
        }
    }
 
    if(isset($_GET['submit'])){
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['surname'] = $_GET['surname'];
        $_SESSION['email'] = $_GET['email'];
        $_SESSION['errorText'] = $_GET['errorText'];
       
        echo "<h2>PODSUMOWANIE ZGŁOSZENIA:</h2>";
        echo "Imię:" . $_SESSION['name'] . "<br>";
        echo "Nazwisko:" . $_SESSION['surname'] . "<br>";
        echo "Email:" . $_SESSION['email'] . "<br>";
        echo "Treść zgłoszenia:" . $_SESSION['errorText'] . "<br>";
        echo '<form action="" method="get">';
        echo '<input type="submit" name="accept" value="Akceptuj">';
        echo '</form>';
    }
 
    if (isset($_GET['accept'])){
        $username = "root";
        $password = "";
        $servername = "localhost";
        $db_name = "defekty";
        $conn = new mysqli($servername, $username, $password, $db_name);
        if(!$conn){
            die("Błąd połączenia z bazą danych");
        }
 
        $query = "INSERT INTO zgloszenia (imie, nazwisko, adres_email, defekt) VALUES ('" . $_SESSION["name"] . "', '" . $_SESSION["surname"] . "', '" . $_SESSION["email"] . "', '" . $_SESSION["errorText"] . "')";
        echo $query;
        if($conn->query($query) === TRUE){
            echo "Dodano zgloszenie poprawnie";
            setcookie("s26990", date("Y-m-d"), time()+3600);
            session_unset();
            session_destroy();
            header("Location: ".$_SERVER['PHP_SELF']);
        } else {
            echo "Błąd przy przesyłaniu zgłoszenia";
        }
    }
 
 
    ?>
</body>
</html>