<?php
  require_once "phpinclude/rs_pagetop.php";
  // error_reporting(E_ALL); ini_set('display_errors', 1);
  if (!file_exists("../img/users/" . $_SESSION['user_id'])) {
    mkdir("../img/users/" . $_SESSION['user_id'], 0777, true);
  }
  require_once "../Model/User.php";
  $user = User::getUserDetails($_SESSION['user_id']);
?>
  <title>Bienvenue sur La Tresse</title>
</head>

<body class="rslayout">
  <main id="welcome"  class="rsform">
    <div id="welcome-left">
      <h1>Merci, <?= $user-> firstName ?>. <br>Bienvenue sur La Tresse</h1>
      <img src="../img/logo/tresseaux.png" alt="Logo de La Tresse">
    </div>
    <div id="welcome-right">
      <div id="welcome-right-first-display">
        <p>(toggle jour/nuit)</p>
        <p id="welcome-question">Souhaites-tu compléter ton profil maintenant&nbsp;?</p>
        <div id="welcome-choice">
          <button class="yel-btn green-border-btn" id="welcome-maintenant">Maintenant</button>
          <a href="rsaccueil.php">
            <button class="yel-btn green-border-btn">Plus tard</button>
          </a>
        </div>
        <br>    
        <p id="welcome-question-info">
          Il s'agit de choisir votre avatar, votre bannière<br>et de remplir votre autodescription.
        </p>
        <p id="welcome-question-info">
          Vous pourrez toujours les modifier plus tard<br>dans votre profil.
        </p>
        <p id="welcome-question-info">
          Sinon par défaut vous avez l'avatar<br>et la bannière de La Tresse.
        </p>
      </div>
      <div id="complete-profile-form-container">
        <form action="complete_profile.php" method="post" enctype="multipart/form-data" id="update-profile-form" class="complete-profile">
          <div class="center">
            <label for="avatarinput" class="horiz_btn_w_icon yel_btn_white_border">
              <svg class="dblock fillbluetxt picicon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>
              <p class="cbluetxt">Avatar</p>        
            </label>
            <input type="file" id="avatarinput" name="avatarinput">
          </div>
          <p class="picinput-description">
            &#9432;&nbsp;&nbsp; Une photo carrée sera plus facile à utiliser
          </p>
          <br>
          <div class="center">
            <label for="bannerpicinput" class="horiz_btn_w_icon yel_btn_white_border">
              <svg class="dblock fillbluetxt picicon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>
              <p class="cbluetxt">Bannière</p>        
            </label>
            <input type="file" id="bannerpicinput" name="bannerpicinput">
          </div>
          <p class="picinput-description">
            &#9432;&nbsp;&nbsp; La bannière s'affiche avec les dimensions 800x200 px
            <br>
            Taille maximum: 2Mo
          </p>
          <br>
          <textarea name="autodescription" id="autodescription" placeholder="Décrivez-vous en quelques mots"></textarea>
          <div class="center">
            <button id="valider" class="yel_btn_white_border">Valider</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="../js/welcome.js"></script>
</body>
</html>