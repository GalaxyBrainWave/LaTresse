<?php
  session_name('Tresseaux');
  session_start();

  // to make sure that the sanitize() function is available
  require_once "../tools/sanitize.php";

  // only execute the following code if the form has been filled,  
  // which means the user has submitted either the login or the register form
  if (!empty($_POST)) {
    // remove trailing whitespace and html tags
    $loginEmail = sanitize($_POST['login-email']);
    $loginPwd = trim($_POST['login-pwd']);
    require_once "../tools/config.php";
    require_once "../Model/User.php";
    User::login($loginEmail, $loginPwd);
  }