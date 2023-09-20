<?php
  require_once "phpinclude/rs_pagetop.php";
  require_once "../Model/Project.php";


  $accueil_active = '';
  $projets_active = 'navbar-active';
  $reseau_active = '';
  $creer_active = '';
  $profil_active = '';
  $notifications_active = '';

    
?>

    <title>La Tresse - Projets</title>

</head>

<body class="rslayout rsprojets">

<?php
    require_once "phpinclude/rs_header.php";
?>



  <main class="rscontent">
    <div class="rscards_header">
      <h2>Les projets de La Tresse</h2>
      <p>Catégorie</p>
      <select name="project-category" id="project-category">
        <option value="all">Toutes</option>
        <option value="all">Categorie 1</option>
        <option value="all">Categorie 2</option>
      </select>
      <!-- compléter tout ceci en JS -->
    </div>
    <div id="project-list-centerer">
      <div class="rs_cards_container" id="project-list-container">
        <!-- <div class="rs_card">
          <h3>Passerelle De Mémoire</h3>
          <img src="../img/rs/pdm.png" alt="Passerelle de mémoire">
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
          </p>
        </div> -->
      </div>
    </div>
  </main>
    
  <script> const projectsList = <?= Project::findAll() ?>;</script>
  <script src="../js/burger.js"></script>
  <script src="../js/display_projects.js"></script>
</body>
</html>