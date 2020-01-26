<?php 

require_once('db/db.php');
session_start();

if (isset($_SESSION['login']) && ($_SESSION['login']==true)) {
  if ($_SESSION['userStatus'] == 1) {
    if (($_SESSION['userType'] == 1)) {
      header("Location: user/index");
    } else {
      header("Location: admin/index");
    }
    die();
  } elseif ($_SESSION['userStatus']==0) {
    $_SESSION['loginError'] = "You are not confirmed, user details.";
  } else {
    $_SESSION['loginError'] = "You are banned by Adminstration.";
  }
} 

if (isset($_POST['login'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $pass = $conn->real_escape_string($_POST['pass']);
  $pass = md5($pass);

    $queryCount = $conn->query("SELECT * FROM user WHERE email = '{$email}' AND password = '{$pass}';");
    $conn->close();
    if ($queryCount->num_rows == 1) {
      $_SESSION['login'] = true;
      $resultCount = $queryCount->fetch_assoc();
      $_SESSION['userId'] = $resultCount['userId'];
      $_SESSION['userType'] = $resultCount['type'];
      $_SESSION['userStatus'] = $resultCount['status'];
      header("Refresh:0");
      die();
    } else {
      unset($_POST);
      $_SESSION['loginError'] = "Invalid email or password. Try again.";
      header("Refresh:0");
      die();
  }

} elseif (isset($_POST['signUp'])) {

    // remove sql injection threat
    $email = $conn->real_escape_string($_POST['email']);
    $fName = $conn->real_escape_string($_POST['fName']);
    $lName = $conn->real_escape_string($_POST['lName']);
    $tpNo = $conn->real_escape_string($_POST['tpNo']);
    $pass = $conn->real_escape_string($_POST['pass']);

    $pass = md5($pass);

    $queryCount = $conn->query("SELECT * FROM user WHERE email = '{$email}';");
    
    if ($queryCount->num_rows == 0) {
      $conn->query("INSERT INTO user (`email`, `fName`, `lName`, `tp`, `password`, `status`, `type`) VALUES ('{$email}', '{$fName}', '{$lName}', {$tpNo}, '{$pass}', 1, 1);");
      $conn->close();
      $_SESSION['loginSuccess'] = "Registered successfully. Login in to continue.";
      unset($_POST);
      header("Refresh:0");
      die();

    } else {
      $_SESSION['loginError'] = "This email is already registered.Login in to continue.";
      unset($_POST);
      header("Refresh:0");
      die();
    }

} else {
  # code...
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="nav-btn-list">
      <button class="btn signup-btn" id="signUp-btn" onclick="signUp();" >Sign Up</button>
      <button class="btn login-btn" id="login-btn" onclick="login();" >Login</button>
    </div>
    <div class="box" id="login-box">
      <img src="img/logo.png" alt="yoyo-logo">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="textbox">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="Email" name="email" tabindex="1" required>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="pass" tabindex="2" required>
        </div>
        <div class="errorMsg">
          <?php 
            if (isset($_SESSION['loginError'])) {
              echo $_SESSION['loginError'];
              unset ($_SESSION['loginError']);
            }
           ?>
        </div>
        <div class="loginSuccess">
          <?php 
            if (isset($_SESSION['loginSuccess'])) {
              echo $_SESSION['loginSuccess'];
              unset ($_SESSION['loginSuccess']);
            }
           ?>
        </div>
        <button type="submit" class="btn" name="login" tabindex="3">Login</button>
        <div class="alt-link-div">
          <span class="alt-link" tabindex="4">Forgot Password?</span>
          <span> | </span>
          <span onclick="signUp();" class="alt-link" tabindex="5">SignUp</span>
        </div>
      </form>
    </div>

    <div class="box" id="signUp-box">
      <img src="img/logo.png" alt="yoyo-logo">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="textbox">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="Email" name="email" tabindex="1" required>
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="First Name" name="fName" tabindex="2" required>
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Last Name" name="lName" tabindex="3" required>
        </div>
        <div class="textbox">
          <i class="fas fa-phone"></i>
          <input type="text" placeholder="Telephone Number" name="tpNo" tabindex="4" minlength="10" maxlength="10" required>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="pass" tabindex="5" required id="pass" onkeyup="signupValidate();" minlength="6">
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Confirm Password" name="passConfirm" tabindex="6" required id="passConfirm" onkeyup="signupValidate();" minlength="6">
        </div>
        <div class="errorMsg" id="errorMsg">
          <?php 
            if (isset($_SESSION['loginError'])) {
              echo $_SESSION['loginError'];
              unset ($_SESSION['loginError']);
            }
           ?>
        </div>
        <button type="submit" class="btn" name="signUp" tabindex="7" id="signUp">Sign Up</button>
        <div class="alt-link">
          <span onclick="login();" tabindex="8">Already have an account?</span>
        </div>
      </form>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>