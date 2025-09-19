<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2: For LOOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card{
            border-radius: 20px;
            width: 20rem;
            display: inline-block;
            margin: 12px;
        }
        .card-body{
            background: #222222;
            color: #ffffff;
            border-radius: 20px;
            height: 10rem;
        }
        .card-body a{
            color:rgb(90, 200, 65);
        }
        .card-title{
            font-family: "Snell Roundhand";
        }
        .card-text{
            font-family: "Big Caslon";
        }
    </style>
</head>
<body>
    <h2>Task 2: For LOOP</h2>
    <?php
    // Function to fetch user data from the JSONPlaceholder API
    function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
    }
    // Get the list of users
    $users = getUsers();

    // displaying user data in bootstrap card format using for loop
    $numUsers = count($users);
    for ($i = 0; $i < $numUsers; $i++) {
        $name = $users[$i]['name'];
        $email = $users[$i]['email'];
        $address = $users[$i]['address']['street'] . ", " . $users[$i]['address']['suite'] . ", " . $users[$i]['address']['city'] . ", " . $users[$i]['address']['zipcode'];
        echo '
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">'.$name.'</h3>
            <p class="card-text"><strong>Email:</strong> <a href="mailto:'.$email.'">'.$email.'</a></p>
            <p class="card-text"><strong>Address:</strong> '.$address.'</p>   
            </div>
        </div>
        ';
    }
    ?>
</body>
</html>