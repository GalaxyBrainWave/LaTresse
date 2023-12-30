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
    </div>

  </main>

  <?php
include "phpinclude/rs_footer.php";
?>
  <script>const userList = <?= User::getAll() ?>; </script>
  <script src="../js/load_user_cards.js"></script>
	<script src="../js/color_checkbox.js"></script>
  <script src="../js/burger.js"></script>
</body>
</html>