<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task1: If/Else</title>
</head>
<body>
    <h2>Task1: If/Else</h2>
    <?php
    $num = rand(1, 100); //random number between 1 and 100
    // $num = 23;

    if ($num % 3 === 0 && $num % 5 === 0) {
        $magic = "FizzBuzz";
    } elseif ($num % 3 === 0) {
        $magic = "Fizz";
    } elseif ($num % 5 === 0) {
        $magic = "Buzz";
    } else {
        $magic = $num;
    }
    echo "<p>The random number is {$num}</p>";
    echo "<p>The magic number is {$magic}</p>";
    ?>
</body>
</html>