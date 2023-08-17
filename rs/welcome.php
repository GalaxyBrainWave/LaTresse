<?php
  require_once "phpinclude/rs_pagetop.php";

  $accueil_active = 'navbar-active';
  $projets_active = '';
  $reseau_active = '';
  $creer_active = '';
  $profil_active = '';
  $notifications_active = '';

?>

  <title>La Tresse - Accueil</title>

</head>

<body class="rslayout">





<h1>Bienvenue, <?= $_SESSION['user_id'] ?></h1>

<a href="rsaccueil.php">Aller à l'accueil</a>


<script src="../js/resizing_textarea_bjr.js"></script>
	<script src="../js/burger.js"></script>
</body>
</html>