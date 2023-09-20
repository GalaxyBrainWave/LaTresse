<?php
  require_once "phpinclude/rs_pagetop.php";
  require_once "../Model/User.php";


  $accueil_active = '';
  $projets_active = '';
  $reseau_active = 'navbar-active';
  $creer_active = '';
  $profil_active = '';
  $notifications_active = '';

  $userCount = User::countAll();
  function displayUserCount($userCount) {
    if ($userCount != false) {
      return $userCount[0]['user_count'];
    } else return '';
  }


?>
  <title>La Tresse - Réseau</title>
</head>

<body class="rslayout rsreseau">
<?php
    require_once "phpinclude/rs_header.php";
?>
  <main class="rscontent">
    <div class="rscards_header">
      <h2>Le réseau de La Tresse</h2>
      <p>
        Nombre total de membres&nbsp;: 
        <span class="members_number">
          <?= displayUserCount($userCount) ?>
        </span>
      </p>
      
    </div>

    <div class="" id="user-cards-container">

      <!-- <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
        </div>
        <p>Star Trek Fan</p>
        <p>Membre depuis le 21/05/2023</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3> -->
          <!-- <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div> -->
          <!-- <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <div>
            <p>Engagement</p>
            <div class="participation_score">
              <p>Habitué</p>
            </div>
          </div>
          <div>
            <p>Assiduité</p>
            <div class="participation_score">
              <p>Addict</p>
            </div>
          </div>
        </div>

      </div> -->

    </div>
  </main>

    
  <script>const userList = <?= User::getAll() ?>; </script>
  <script src="../js/load_user_cards.js"></script>
  <script src="../js/burger.js"></script>
</body>
</html>