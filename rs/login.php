<?php
  session_name('La_Tresse');
  session_start();

  // to make sure that the sanitize() function is available
  require_once "../tools/utils.php";

  // only execute the following code if the form has been filled,  
  // which means the user has submitted either the login or the register form
  if (!empty($_POST)) {
    if (isset($_POST['login-email']) && isset($_POST['login-pwd'])) {
    // remove trailing whitespace and html tags
    $loginEmail = sanitize($_POST['login-email']);
    $loginPwd = trim($_POST['login-pwd']);
    require_once "../tools/config.php";
    require_once "../Model/User.php";
    // call the login method of the User class
    User::login($loginEmail, $loginPwd);
    } // error handling needed here
  }