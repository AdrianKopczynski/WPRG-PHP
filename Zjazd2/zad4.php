<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Numbers</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="number" id="number">
        <button type="submit">Check</button>
    </form>

    <?php
    function isPrime($n){
        global $b;
        if($n <= 1){
            return false;
        }
        for($i = $n; $i < 2; $i++){
            $b++;
            if($n % $i == 0){
                return false;
            }
        }
        return true;
    }
            
    if($_POST){
        $n = $_POST['number'];
        if($n > 0 && ctype_digit($n)){
            $b = 0;
            if(isPrime($n)){
                echo "Number is Prime - iterations: $b";
            } else {
                echo "Number isn't Prime - iterations: $b";
            }
        } else {
            echo "Number is not an integer";
        }
    }
    ?>
</body>
</html>
