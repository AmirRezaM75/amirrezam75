<?php
include 'core/init.php';

if ($getFromUser -> loggedIn() == false) {
    if (isset($_POST['signup'])) {
        $username    = $_POST['username'];
        $first_name  = $_POST['first_name'];
        $last_name   = $_POST['last_name'];
        $student_id  = $_POST['student_id'];
        $password    = $_POST['password'];
        $email       = $_POST['email'];

        if (empty($username) or empty($first_name) or empty($last_name) or empty($password) or empty($student_id) or empty($email)) {
            $error [1] = 'همه ی فیلد ها را پر کنید';
        } else {
            $first_name = $getFromUser->checkInput($first_name);
            $last_name  = $getFromUser->checkInput($last_name);
            $student_id = $getFromUser->checkInput($student_id);
            $username   = $getFromUser->checkInput($username);
            $password   = $getFromUser->checkInput($password);
            $email      = $getFromUser->checkInput($email);
            $error      = array();

            if ($getFromUser -> persianChecker($first_name) == 1 and $getFromUser -> persianChecker($last_name) == 1) {

                if ($getFromUser -> englishChecker($username) == 1) {

                    if (strlen($username) >= 6 and strlen($username) <= 32) {

                        if ($getFromUser->checkUsername($username) === false) {

                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (strlen($password) >= 6 and strlen($password) <= 256) {

                                    if (strlen($student_id) == 9) {

                                        if (filter_var($student_id, FILTER_VALIDATE_INT)) {

                                            $getFromUser -> register($first_name,$last_name,$username,$password,$student_id,$email);
                                            header('Location: ' . BASE_URL . 'user/dashboard.php');

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if ($getFromUser -> persianChecker($first_name) == 0 or $getFromUser -> persianChecker($last_name) == 0) {
                $error [2] = "نام و نام خانوادگی باید فارسی باشد";
            }
            if (strlen($student_id) != 9) {
                $error [3] = "شماره ی دانشجویی باید 9 رقمی باشد";
            }
            if (!filter_var($student_id, FILTER_VALIDATE_INT)) {
                $error [4] = "شماره دانشجویی فقط شامل عدد باید باشد";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error [5] = "فرمت ایمیل صحیح نمی باشد";
            }
            if (strlen($username) <= 5 or strlen($username) > 32) {
                $error [6] = "نام کاربری باید بین 6 - 32 کاراکتر باشد";
            }
            if ($getFromUser->checkUsername($username) === true) {
                $error [7] = "این نام کاربری قبلا به ثبت رسیده";
            }
            if ($getFromUser -> englishChecker($username) == 0) {
                $error [8] = "نام کاربری فقط میتواند عدد و حروف انگلیسی باشد و با عدد شروع نشود";
            }
            if (strlen($password) > 256 or strlen($password) <= 5) {
                $error [9] = "رمز عبور باید بین 6 - 32 کاراکتر باشد";
            }

        } /*END OF ELSE [EMPTY(USERNAME)]*/
    }/*END OF SIGNUP*/
    if (isset($_POST['login'])) {
        $username = $getFromUser -> checkInput($_POST['login_username']);
        $password = $getFromUser -> checkInput($_POST['login_password']);
        $loginResult = $getFromUser -> login($username,$password);
        if ($loginResult == false) {
            $loginError = "نام کاربری یا رمز عبور اشتباه است";
        }
    }/*END OF LOGIN*/
} elseif($getFromUser -> loggedIn() == true) {
    header('Location:' . BASE_URL . 'user/dashboard.php');
} elseif ($getFromUser -> admin_loggedIn() == true){
    header('Location:' . BASE_URL . 'admin/dashboard.php');
} /*END OF LOGGED IN METHOD*/
?>
<!DOCTYPE html>
<html lang="en" class="login_page">

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>روش پژوهش و ارائه</h1>
          
          <form action="" method="post">

          <div class="field-wrap RTL_direction text-right">
             <label>نام</label>
             <input name="first_name" type="text" required autocomplete="off" title="فقط حروف فارسی"/>

          </div>

          <div class="field-wrap RTL_direction text-right">
            <label>نام خانوادگی</label>
            <input name="last_name" type="text" required autocomplete="off" title="فقط حروف فارسی"/>
          </div>

          <div class="field-wrap RTL_direction text-right">
              <label>شماره دانشجویی</label>
              <input name="student_id" type="text" required autocomplete="off"/>

          </div>

          <div class="field-wrap RTL_direction text-right">
              <label for="signup_email">ایمیل</label>
              <input name="email" id="signup_email" type="text" required autocomplete="off" class="EnFont"/>
          </div>

          <div class="field-wrap RTL_direction text-right">
            <label for="signup_username">نام کاربری</label>
            <input name="username" id="signup_username" type="text" required autocomplete="off" class="EnFont"/>
          </div>
          
          <div class="field-wrap RTL_direction text-right">
            <label> کلمه عبور </label>
            <input name="password" type="password" required autocomplete="off"/>
          </div>

          <?php if (isset($error)) { ?>
          <div class="field-wrap alert-validate RTL_direction" style="text-align: right;">
              <ul>
                  <?php  foreach ($error as $exception){ ?>

                      <li><?php echo $exception ?> </li>

                  <?php } ?>
              </ul>
          </div>
          <?php } ?>

          
          <button name="signup" type="submit" class="button button-block main_fonts">ثبت نام</button>
          
          </form>

        </div>
        
        <div id="login">
          <h1>ورود به سیستم</h1>
          
          <form action="" method="post">
              <div class="field-wrap RTL_direction text-right">
                  <label for="login_username">نام کاربری</label>
                  <input id="login_username" class="EnFont" name="login_username" type="text" required autocomplete="off"/>
              </div>
          
          <div class="field-wrap RTL_direction text-right">
              <label for="login_password">کلمه ی عبور</label>
              <input id="login_password" name="login_password" type="password" required autocomplete="off"/>
          </div>
          
          <!--<p class="forgot EnFont"><a href="#">Forgot Password?</a></p>-->

          <?php if (isset($loginError)) { ?>
              <div class="field-wrap alert-validate RTL_direction" style="text-align: right;">
                  <ul>
                      <li><?php echo $loginError; ?> </li>
                  </ul>
              </div>
          <?php } ?>
          <button class="button button-block main_fonts" name="login">ورود</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="assets/js/index.js"></script>

</body>

</html>