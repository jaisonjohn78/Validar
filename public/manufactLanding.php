<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION["user_id"])) {
  header("Location: welcome.php");
}

if (isset($_POST["signup"])) {
  $full_name = mysqli_real_escape_string($conn, $_POST["signup_full_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));

  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM manufacturer WHERE email='$email'"));

  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match.');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already exists in our database.');</script>";
  } else {
    $sql = "INSERT INTO manufacturer (full_name, email, password, status) VALUES ('$full_name', '$email', '$password', '1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('Registration successful.');</script>";
    } else {
      echo "<script>alert('Registration failed.');</script>";
}
  }
}

if (isset($_POST["signin"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

  $check_email = mysqli_query($conn, "SELECT id FROM manufacturer WHERE email='$email' AND password='$password' AND status='1'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: welcome.php");
  } else {
    echo "<script>alert('Login details is incorrect. Please try again.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Validar</title>
  <style>
    .ball {
  position: absolute;
  border-radius: 100%;
  opacity: 0.5;
  
}
/* color:F6987C */

.container:before {
  content: "";
  position: absolute;
  height: 2000px;
  width: 2000px;
  top: -10%;
  right: 48%;
  transform: translateY(-50%);
  background-image: radial-gradient(circle, rgba(245,155,124,1) 0%, rgba(245,156,125,1) 76%, rgba(0, 119, 255, 0.51) 100%);
  transition: 1.8s ease-in-out;
  border-radius: 50%;
  z-index: 6;
}
.logbtn{
  background: radial-gradient(circle, rgba(245,155,124,0.9363095580028886) 0%, rgba(245,156,125,0.3956933115042892) 100%);
}
@keyframes slidebg {
  to {
    background-position:20vw;
  }
}

/* .signbtn:hover{
  box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
  border: 3px solid #00d7c3;
  color:green;
  background-color:green;
} */
 .btn.transparent:hover{
   
   box-shadow: 0 0 10px 0 rgba(245,155,124,1) inset, 0 0 20px 2px rgba(245,156,125,0.3956933115042892);
  border: 3px solid #00d7c3; 
 } 

@media screen and (min-width: 1024px) and (max-height: 1310px)
{
  body {
    overflow: hidden;

  }
}


@media screen and (max-width: 1024px)
{
  .ball {
    display: none;

  }
}
    </style>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="email" value="<?php echo $_POST['email']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required />
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid logbtn" />
        </form>
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="signup_full_name" value="<?php echo $_POST["signup_full_name"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="signup_email" value="<?php echo $_POST["signup_email"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signup_password" value="<?php echo $_POST["signup_password"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"]; ?>" required />
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent signbtn" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <!-- <img src="img/log.svg" class="image" alt="" /> -->
        <img src="./assets/img/gallery/Factory_Worker.png" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>

</html>