<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4</title>
</head>
<body>
    <h2>Week 4 In Class Assessment </h2>
    <?php
    $connect = mysqli_connect(
                "localhost",
                "root",
                "",
                "CSV_DB 20");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $query = "SELECT * FROM colors";
    $colors = mysqli_query($connect, $query);

    echo "<pre>";
    print_r($colors);
    echo "</pre>";

    echo "<pre>" .  print_r($colors) . "</pre>";

    echo "<pre>" . print_r($colors, true) . "</pre>";

    foreach ($colors as $color){
        //echo $color['Name'] . "<br>";
        echo "<div style='
        width:100%; 
        height:50px; 
        display: flex; 
        align-items: center; 
        justify-content: center ;
        background-color: ". $color['Hex'] . " 
        ' >" 
        . $color['Name'] . 
        "</div>";
    }
    ?>
</body>
</html>