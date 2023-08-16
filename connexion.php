<?php
  session_name('Tresseaux');
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION['user_id'])) {
    // if the user is logged in, redirect them to rsaccueil.php
    header("Location: rs/rsaccueil.php");
    exit();
  }

  function displayLoginEmail() {
    if (isset($_SESSION['loginEmail']) {
      return $_SESSION['loginEmail'];
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
    <div id="register-form-container" class="register-form-container dispflex">
      <h2>Vous avez déjà un compte&nbsp;?</h2>
      <button id="sidentifier" class="yel-btn green-border-btn">S'identifier</button>
      <p id="sinon">sinon</p>
      <h2>Inscrivez-vous pour participer</h2>

      <?php if (isset($alert)): ?>
          <p><?= $alert; ?></p>
      <?php endif; ?>

      <form action="rs/register.php" method="post" class="register-form">
        <!-- <div class="register-part1"> -->
          <input type="text" name="register-first-name" id="register-first-name" placeholder="Prénom" autocomplete="given-name">
          <!-- <div>
            <label for="last-name">Nom *</label>
            <input type="text" name="last-name" id="last-name" placeholder="Nom de famille" autocomplete="family-name">
          </div> -->
            <input type="email" name="register-email" id="register-email" placeholder="Email" autocomplete="email" required>
            <input type="password" name="register-hash" id="register-hash" placeholder="Mot de passe" autocomplete="new-password" required>
            <input type="password" name="register-hash2" id="register-hash2" placeholder="Vérification du mot de passe" required>
            <button class="yel-btn blue-border-btn">S'inscrire</button>

        <!-- </div>
        <div class="register-part2">
          <div>
            <button type="submit" name="register">S'inscrire</button>
          </div>
        </div> -->
      </form>
    </div>
    <div id="login-form-container" class="register-form-container dispnone w100">
      <form action="rs/login.php" method="post" class="register-form">
          <input type="email" name="login-email" id="login-email" placeholder="Email" autocomplete="email" value="<?= displayLoginEmail() ?>" required> // display the email if previously provided by the user
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