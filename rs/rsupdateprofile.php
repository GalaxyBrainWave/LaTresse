<?php
    require_once "phpinclude/rs_pagetop.php";

    $accueil_active = '';
    $projets_active = '';
    $reseau_active = '';
    $creer_active = '';
    $profil_active = 'navbar-active';
    $notifications_active = '';

?>

    <title>La Tresse - <?= $userName ?></title>

</head>

<body class="rslayout update_profile">

<?php
    require_once "phpinclude/rs_header.php";
?>





  <main class="rsform rscontent">
    <div class="rsform_container">
      <h2>
        Modifier mon profil
      </h2>
      <form action="" method="post" id="update-profile-form" enctype="multipart/form-data">
        <input type="password" name="password" id="password" placeholder="Mon mot de passe (obligatoire)" required>
        <input type="text" name="firstname" id="firstname" placeholder="Mettre à jour mon prénom">
        <input type="text" name="lastname" id="lastname" placeholder="Mettre à jour mon nom de famille">
        <input type="text" name="area" id="area" placeholder="Mettre à jour ma localité">
        <textarea name="self-description" id="self-description" placeholder="Mettre à jour mon auto-description"></textarea>
        <label for="avatarinput" class="horiz_btn_w_icon yel_btn_white_border">
          <svg class="dblock fillbluetxt picicon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>
          <p class="cbluetxt">Modifier mon Avatar</p>        
        </label>
        <input type="file" id="avatarinput" name="avatarinput">
        <p class="picinput-description"><span>&#9432;</span>&nbsp;&nbsp; Une photo carrée sera plus facile à utiliser</p>
        <label for="bannerpicinput" class="horiz_btn_w_icon yel_btn_white_border">
          <svg class="dblock fillbluetxt picicon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>
          <p class="cbluetxt">Modifier ma bannière</p>        
        </label>
        <input type="file" id="bannerpicinput" name="bannerpicinput">
        <p class="picinput-description"><span>&#9432;</span>&nbsp;&nbsp; La bannière s'affiche avec les dimensions 800 x 200 pixels</p>
        <p class="tcenter">
          Modifier mon mot de passe (optionnel)&nbsp;:
        </p>
        <input type="password" name="newpassword1" id="newpassword1" placeholder="Nouveau mot de passe">
        <input type="password" name="newpassword2" id="newpassword2" placeholder="Confirmer mon nouveau mot de passe">
        <button class="horiz_btn_w_icon yel_btn_white_border" id="publish">
          <svg class="dblock fillbluetxt" width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.7682 9.64018C17.1218 9.21591 17.0645 8.58534 16.6402 8.23178C16.2159 7.87821 15.5853 7.93554 15.2318 8.35982L11.6338 12.6774C11.2871 13.0934 11.0922 13.3238 10.9366 13.4653L10.9306 13.4707L10.9242 13.4659C10.7564 13.339 10.5415 13.1272 10.1585 12.7443L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.74428 14.1585L8.78511 14.1993L8.78512 14.1993C9.11161 14.526 9.4257 14.8402 9.71794 15.0611C10.0453 15.3087 10.474 15.5415 11.0234 15.5165C11.5728 15.4916 11.9787 15.221 12.2823 14.9448C12.5534 14.6983 12.8377 14.3569 13.1333 14.0021L13.1333 14.0021L13.1703 13.9577L16.7682 9.64018Z"></path> </g></svg>                    
          <p class="cbluetxt">Enregistrer</p>
        </button>        
      </form>
    </div>
  </main>

    


  <script src="../js/burger.js"></script>
</body>
</html>