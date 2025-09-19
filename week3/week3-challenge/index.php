<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3</title>
</head>
<body>
    <h2>Challenge 1</h2>
    <?php
    $hour = date('G'); // hour in 24 format
    // $hour = 5;
    if ($hour >= 5 && $hour < 9) {
        $meal = "Breakfast";
        $food = "Bananas, Apples, and Oats";
    } elseif ($hour >= 12 && $hour < 14) {
        $meal = "Lunch";
        $food = "Fish, Chicken, and Vegetables";
    } elseif ($hour >= 19 && $hour < 21) {
        $meal = "Dinner";
        $food = "Steak, Carrots, and Broccoli";
    } else {
        $meal = null;
    }
    // meal condition
    if ($meal) {
        echo "It's {$meal} time! The animals should eat these: {$food}.";
    } else {
        echo "The animals are not being fed right now.";
    }

    ?>
    <h2>Challenge 2</h2>
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