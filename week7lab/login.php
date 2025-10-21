<?php
include('reusable/connect.php');
include('functions.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = 'SELECT * FROM users 
            WHERE email = "' . $email . '" 
            AND password = "' . md5($password) . '" 
            LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result)) {
    $record = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $record['id'];
    $_SESSION['name'] = $record['name'];
    $_SESSION['email'] = $record['email'];
    header('Location: index.php');
    exit;
  } else {
    set_message('Invalid email or password.', 'danger');
    header('Location: login.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col text-center mt-5 mb-3">
        <h3>Login</h3>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <?php get_message(); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-4">
        <form method="POST" action="login.php">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <button type="submit" class="btn btn-danger w-100" name="login">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
