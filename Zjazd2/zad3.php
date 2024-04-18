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

        .book {
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
<?php
if ($_POST) {
    if (isset($_POST['main_form'])) {
        if ($_POST['person_count'] > 1) {
            ?>
            <form method="post" action="">
                <div class="book">
                    <h2>Additional People</h2>
                    <?php
                    $person_count = $_POST['person_count'];
                    for ($i = 2; $i <= $person_count; $i++) {
                        echo "<input type='text' name='name_$i' placeholder='Podaj name osoby $i'><br>";
                        echo "<input type='text' name='surname_$i' placeholder='Podaj surname osoby $i'><br>";
                    }
                    ?>
                    <input type="hidden" name="person_count" value="<?php echo $person_count; ?>">
                    <input type="hidden" name="name_1" value="<?php echo $_POST['name_1']; ?>">
                    <input type="hidden" name="surname_1" value="<?php echo $_POST['surname_1']; ?>">
                    <input type="hidden" name="adress" value="<?php echo $_POST['adress']; ?>">
                    <input type="hidden" name="card_number" value="<?php echo $_POST['card_number']; ?>">
                    <input type="hidden" name="card_exp" value="<?php echo $_POST['card_exp']; ?>">
                    <input type="hidden" name="cvc" value="<?php echo $_POST['cvc']; ?>">
                    <input type="hidden" name="arrive_date" value="<?php echo $_POST['arrive_date']; ?>">
                    <input type="hidden" name="leave_date" value="<?php echo $_POST['leave_date']; ?>">
                    <button type="submit" name="additional_form">Next</button>
                </div>
            </form>
            <?php
        } else {
            ?>
            <div class="book">
                <?php
                $person_count = $_POST['person_count'];
                $adress = $_POST['adress'];
                $card_number = $_POST['card_number'];
                $card_exp = $_POST['card_exp'];
                $cvc = $_POST['cvc'];
                $arrive_date = $_POST['arrive_date'];
                $leave_date = $_POST['leave_date'];

                echo "<p><strong>People count:</strong> $person_count</p>";

                for ($i = 1; $i <= $person_count; $i++) {
                    $name = isset($_POST["name_$i"]) ? $_POST["name_$i"] : "";
                    $surname = isset($_POST["surname_$i"]) ? $_POST["surname_$i"] : "";

                    echo "<p><strong>Person $i name:</strong> $name</p>";
                    echo "<p><strong>Person $i surname:</strong> $surname</p>";
                }

                echo "<p><strong>Adress:</strong> $adress</p>";
                echo "<p><strong>Card number:</strong> $card_number</p>";
                echo "<p><strong>Card expiration date:</strong> $card_exp</p>";
                echo "<p><strong>Card CVC:</strong> $cvc</p>";
                echo "<p><strong>Arrive date:</strong> $arrive_date</p>";
                echo "<p><strong>Leave date:</strong> $leave_date</p>";
                ?>
            </div>
            <?php
        }
    } elseif (isset($_POST['additional_form'])) {
        ?>
        <div class="book">
            <?php
            $person_count = $_POST['person_count'];
            $adress = $_POST['adress'];
            $card_number = $_POST['card_number'];
            $card_exp = $_POST['card_exp'];
            $cvc = $_POST['cvc'];
            $arrive_date = $_POST['arrive_date'];
            $leave_date = $_POST['leave_date'];

            echo "<p><strong>Person count:</strong> $person_count</p>";

            for ($i = 1; $i <= $person_count; $i++) {
                $name = isset($_POST["name_$i"]) ? $_POST["name_$i"] : "";
                $surname = isset($_POST["surname_$i"]) ? $_POST["surname_$i"] : "";

                echo "<p><strong>Person $i name:</strong> $name</p>";
                echo "<p><strong>Person $i surname:</strong> $surname</p>";
            }

            echo "<p><strong>Adress:</strong> $adress</p>";
            echo "<p><strong>Card number:</strong> $card_number</p>";
            echo "<p><strong>Card expiration date:</strong> $card_exp</p>";
            echo "<p><strong>Card CVC:</strong> $cvc</p>";
            echo "<p><strong>Arrive date:</strong> $arrive_date</p>";
            echo "<p><strong>Leave date:</strong> $leave_date</p>";
            ?>
        </div>
        <?php
    }
} else {
    ?>
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

        <button type="submit" name="main_form">Rezerwuj!</button><br>
    </form>
    <?php
}
?>
</body>
</html>
