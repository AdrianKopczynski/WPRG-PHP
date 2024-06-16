<?php
session_start();
 
$username = "root";
$password = "";
$servername = "localhost";
$db_name = "defekty";
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
 
$query = "SELECT * FROM zgloszenia";
$result = $conn->query($query);
 
$entries = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
}
$conn->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wszystkie zgłoszenia</title>
</head>
<body>
    <h2>Wszystkie zgłoszenia</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Adres email</th>
                <th>Treść zgłoszenia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry): ?>
                <tr>
                    <td><?php echo $entry['id']; ?></td>
                    <td><?php echo $entry['imie']; ?></td>
                    <td><?php echo $entry['nazwisko']; ?></td>
                    <td><?php echo $entry['adres_email']; ?></td>
                    <td><?php echo $entry['defekt']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>