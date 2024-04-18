<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
      body {
            background-color: grey;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
        }

        input, select {
            width: 80%;
            margin: 5px;
            margin-left: 40px;
            padding: 10px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
        }
        .book{
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <form method="post" action="">
        <label for="person_count">Number of pepole: </label><br>
        <select name="person_count" id="person_count">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <input type="text" name="name" id="name" placeholder="Type name"><br>
        <input type="text" name="surname" id="surname" placeholder="Type surname"><br>
        <input type="text" name="adress" id="adress" placeholder="Type your adres"><br>
        <input type="text" name="card_number" id="card_number" maxlength="16" placeholder="Card number" pattern="[0-9]{16}"><br>
        <input type="text" name="card_exp" id="card_exp" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="Card experience date MM/YY"><br>
        <input type="text" name="cvc" id="cvc" pattern="[0-9]{3}" placeholder="card CVC (3 cyfry)"><br>
        <label for="arrive_date"> Arrive date:</label><br>
        <input type="date" name="arrive_date" id="arrive_date"><br>
        <label for="leave_date"> Leave date:</label><br>
        <input type="date" name="leave_date" id="leave_date"><br>

        <button type="submit">Book</button><br>
    </form> 
    <div class="book">  
        <?php 
            if ($_POST){
                $person_count = $_POST['person_count'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $adress = $_POST['adress'];
                $card_number = $_POST['card_number'];
                $card_exp = $_POST['card_exp'];
                $cvc = $_POST['cvc'];
                $arrive_date = $_POST['arrive_date'];
                $leave_date = $_POST['leave_date'];

                echo "<p><strong>Number of people:</strong> $person_count</p>";
                echo "<p><strong>Name:</strong> $name</p>";
                echo "<p><strong>Surname:</strong> $surname</p>";
                echo "<p><strong>Adress:</strong> $adress</p>";
                echo "<p><strong>Card number:</strong> $card_number</p>";
                echo "<p><strong>Card Expiration Date:</strong> $card_exp</p>";
                echo "<p><strong>Card CVC:</strong> $cvc</p>";
                echo "<p><strong>Arrive date:</strong> $arrive_date</p>";
                echo "<p><strong>Leave date:</strong> $leave_date</p>";
        }
        ?>
    </div> 
</body>
</html>
