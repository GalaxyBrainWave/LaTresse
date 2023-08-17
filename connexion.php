<?php
  session_name('Tresseaux');
  session_start();
  // Check if the user is logged in
  if (isset($_SESSION['user_id'])) {
    // if the user is logged in, redirect them to rsaccueil.php
    header("Location: rs/rsaccueil.php");
    exit();
  }
  // var_dump($_SESSION['registerError']);
  // var_dump(isset($_SESSION['display_login_form']));
  // var_dump(loginFormDisplay());
  function inputValueDisplay(string $string) {
    if (isset($_SESSION[$string])) {
      $output = $_SESSION[$string];
      unset($_SESSION[$string]);
      return $output;
    }
  }

  // function registerEmailDisplay(string $string) {
  //   if (isset($_SESSION[$string])) {
  //     $output = $_SESSION[$string];
  //     unset($_SESSION[$string]);
  //     return $output;
  //   }
  // }

  // function registerFirstNameDisplay(string $string) {
  //   if (isset($_SESSION[$string])) {
  //     $output = $_SESSION[$string];
  //     unset($_SESSION[$string]);
  //     return $output;
  //   }
  // }

  function loginFormDisplay() {
    if (isset($_SESSION['display_login_form'])) {
      return "dispflex";
    } else {
      return "dispnone";
    }
  }

  function registerFormDisplay() {
    if (isset($_SESSION['display_login_form'])) {
      return "dispnone";
    } else {
      return "dispflex";
    }
  }

  function loginErrorDisplay() {
    if (isset($_SESSION['loginError'])) {
      $output = $_SESSION['loginError'];
      unset($_SESSION['loginError']);
      return '<p class="connection-error">' . $output . '</p><br>';
    } else {
      return '&nbsp;';
    }
  }

  function registerErrorDisplay() {
    if (isset($_SESSION['registerError'])) {
      $output = $_SESSION['registerError'];
      unset($_SESSION['registerError']);
      return '<p class="connection-error">' . $output . '</p>';
    } else {
      return '';
    }
  }

  include "phpinclude/header.php";

?>

<div id="register-page">
  <div class="register-left">
    <h1>Tresseaux</h1>
    <img src="img/logo/tresseaux.png" alt="Logo de Tresseaux">
    <p id="register-left-tagline">Le réseau social de la Tresse<br>(slide show)</p>
  </div>
  <div class="register-right">
    <div id="register-form-container" class="register-form-container <?= registerFormDisplay() ?>">
      <h2>Vous avez déjà un compte&nbsp;?</h2>
      <button id="sidentifier" class="yel-btn green-border-btn">S'identifier</button>
      <p id="sinon">sinon</p>
      <h2>Inscrivez-vous pour participer</h2>
      <div class="register-error-container">
        <?= registerErrorDisplay() ?>
      </div>  
      <form action="rs/register.php" method="post" class="register-form">
        <input type="text" name="register-first-name" id="register-first-name" placeholder="Prénom" autocomplete="given-name"" value="<?= inputValueDisplay('registerFirstName') ?>" required>
        <input type="email" name="register-email" id="register-email" placeholder="Email" autocomplete="email" value="<?= inputValueDisplay('registerEmail') ?>" required>
        <input type="password" name="register-pwd" id="register-pwd" placeholder="Mot de passe (minimum 6 caractères)" autocomplete="new-password" required>
        <input type="password" name="register-pwd2" id="register-pwd2" placeholder="Vérification du mot de passe" required>
        <button id="btn-sinscrire" class="yel-btn blue-border-btn">S'inscrire</button>
      </form>
    </div>
    <div id="login-form-container" class="register-form-container <?= loginFormDisplay() ?> w100">
      <div class="login-error-container">
        <?= loginErrorDisplay() ?>
      </div>      
      <form action="rs/login.php" method="post" class="register-form">
        <!-- display the email if previously provided by the user -->
        <input type="email" name="login-email" id="login-email" placeholder="Email" autocomplete="email" value="<?= inputValueDisplay('loginEmail') ?>" required> 
        <input type="password" name="login-pwd" id="login-pwd" placeholder="Mot de passe" autocomplete="current-password" required>
        <div id="mdpoublie-container">
          <p id="mdpoublie-btn">Mot de passe oublié&nbsp;?</p>
          <p><a id="mdpoublie-link" href="contact.php">Contacter l'administrateur</a></p>
        </div>
        <button class="yel-btn blue-border-btn">Connexion</button>
      </form>
      <p id="pasdecompte">Vous n'avez pas encore de compte&nbsp;?</p>
      <button class="yel-btn green-border-btn" id="login-retour">Inscription</button>
    </div>
    
  </div>

</div>

<script src="js/connexion.js"></script>
<?php
  include "phpinclude/longedging.php";
?>

<?php
  include "phpinclude/footer.php";
?>