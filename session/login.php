<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <h1>Please Login!</h1>
    <section>
      <div class="">
        <form action="" method="post">
          <fieldset class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="username" class="form-control" id="" placeholder="Username">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </fieldset>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <?php
          include "config.php";
          if (isset($_POST['login'])) {
            $check = mysqli_query($conn, "SELECT * FROM users WHERE
            username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
            $result = mysqli_fetch_array($check);
            $count = mysqli_num_rows($check);
            $name = $result['username'];
            if ($count >0) {
              session_start();
              $_SESSION['username'] = $name;
              header("Location:index.php");
            }
            else {
              echo "Failed Login";
            }
          }
         ?>
      </div>
    </section>

    <footer>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
