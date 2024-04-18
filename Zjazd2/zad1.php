<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form method="post" action="">
        <input type="number" name="number1" id="number1" placeholder="Type number 1: ">
        <select name="calc" id="calc">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="number2" id="number2" placeholder="Type number 2: ">
        <button type="submit">Calculate</button>
    </form>

    <?php
        if($_POST){
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            $result = 0;
            if($_POST['calc'] == "+"){
                $result = $number1 + $number2;
            } 
            else if ($_POST['calc'] == "-"){
                $result = $number1 - $number2;
            } 
            else if ($_POST['calc'] == "*"){
                $result = $number1 * $number2;
            } 
            else {
                if($number2 == 0){    
                    $result = "<p>You can't devide by 0 !!!</p>";
                    
                } 
                else {
                    $result = $number1 / $number2;
                }
            }

            echo "<p>Result: $result</p>";
        }
    ?>

</body>
</html>
