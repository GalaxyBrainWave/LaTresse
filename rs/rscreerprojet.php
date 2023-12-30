<?php
    require_once "phpinclude/rs_pagetop.php";

    $accueil_active = '';
    $projets_active = '';
    $reseau_active = '';
    $creer_active = 'navbar-active';
    $profil_active = '';
    $notifications_active = '';
?>

    <title>La Tresse - Créer un Projet</title>

</head>

<body class="rslayout rscreerprojet">

<?php
    require_once "phpinclude/rs_header.php";
?>



  <main class="rsform rscontent">
    <div class="rsform_container">
      <h2 class="tcenter">
        Créer un projet
      </h2>
      <?php
        if (isset($_SESSION['processError'])) {
      ?>
        <div id="process-error">
          <p><?= $_SESSION['processError'] ?></p>
        </div>
      <?php
          unset($_SESSION['processError']);
        }
      ?>
      <br>
      <form action="post_project.php" method="post" id="creer-projet-form" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre de votre projet" required>
        <div class="project-image-input-container">
            <div id="project-banner-input-container">
              <label for="picinput" class="horiz_btn_w_icon yel_btn_white_border">
                <svg class="dblock fillbluetxt" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>
                <p class="cbluetxt">Ajouter une bannière</p>        
              </label>
              <div class="icon-container gcenter">
                <svg class="picinput-confirm-icon dispnone" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke-width="1.5"></path> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
              </div>
            </div>
            <p class="picinput-description"><span>&#9432;</span>&nbsp;&nbsp; La bannière (facultative) s'affiche avec les dimensions 800 x 300 pixels</p>
            <input type="file" id="picinput" name="project-banner-picinput">            
        </div>
        
        <label for="category" class="cbeige">Catégorie</label>
        <br>
        <select name="category" id="category">
          <option value="">Sans catégorie (défaut)</option>
          <!-- Ici il faudra chercher la liste dans la BDD et l'afficher avec un foreach -->
        </select>
        <br>
        <input type="text" name="location" id="location" placeholder="Lieu">
        <input type="text" name="budget" id="budget" placeholder="Budget (€)">

        <p>Vous pouvez ajouter jusqu'à 4 photos pour illustrer votre projet&nbsp;:</p>
        <div id="project-picinputs-container">
          <div class="project-image-input-container">
            <div>
              <label for="project-picinput1" class="horiz_btn_w_icon yel_btn_white_border project-pic-btn">
                <svg class="dblock fillbluetxt" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>        
              </label>
              <input type="file" id="project-picinput1" name="project-picinput1">
            </div>
            <div class="icon-container gcenter">
              <svg class="picinput-confirm-icon dispnone" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#fff" stroke-width="1.5"></path> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
          </div>
          
          <div class="project-image-input-container">
            <div>
              <label for="project-picinput2" class="horiz_btn_w_icon yel_btn_white_border project-pic-btn">
                <svg class="dblock fillbluetxt" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>        
              </label>
              <input type="file" id="project-picinput2" name="project-picinput2">
            </div>
            <div class="icon-container gcenter">
              <svg class="picinput-confirm-icon dispnone" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#fff" stroke-width="1.5"></path> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
          </div>
          <div class="project-image-input-container">
            <div>
              <label for="project-picinput3" class="horiz_btn_w_icon yel_btn_white_border project-pic-btn">
                <svg class="dblock fillbluetxt" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>        
              </label>
              <input type="file" id="project-picinput3" name="project-picinput3">
            </div>
            <div class="icon-container gcenter">
              <svg class="picinput-confirm-icon dispnone" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#fff" stroke-width="1.5"></path> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
          </div>
          <div class="project-image-input-container">
            <div>
              <label for="project-picinput4" class="horiz_btn_w_icon yel_btn_white_border project-pic-btn">
                <svg class="dblock fillbluetxt" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z"></path></g></svg>        
              </label>
              <input type="file" id="project-picinput4" name="project-picinput4">
            </div>
            <div class="icon-container gcenter">
              <svg class="picinput-confirm-icon dispnone" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#fff" stroke-width="1.5"></path> <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
          </div>
        </div>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="Décrivez votre projet…" required></textarea>
        <button class="horiz_btn_w_icon yel_btn_white_border" id="publish">
          <svg class="dblock fillbluetxt" width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.7682 9.64018C17.1218 9.21591 17.0645 8.58534 16.6402 8.23178C16.2159 7.87821 15.5853 7.93554 15.2318 8.35982L11.6338 12.6774C11.2871 13.0934 11.0922 13.3238 10.9366 13.4653L10.9306 13.4707L10.9242 13.4659C10.7564 13.339 10.5415 13.1272 10.1585 12.7443L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.74428 14.1585L8.78511 14.1993L8.78512 14.1993C9.11161 14.526 9.4257 14.8402 9.71794 15.0611C10.0453 15.3087 10.474 15.5415 11.0234 15.5165C11.5728 15.4916 11.9787 15.221 12.2823 14.9448C12.5534 14.6983 12.8377 14.3569 13.1333 14.0021L13.1333 14.0021L13.1703 13.9577L16.7682 9.64018Z"></path> </g></svg>                    
          <p class="cbluetxt">Publier</p> 
        </button>        
      </form>
    </div>
  </main>
<?php
include "phpinclude/rs_footer.php";
?>
    


  <script src="../js/burger.js"></script>
  <script src="../js/picinput_icons.js"></script>
	<script src="../js/color_checkbox.js"></script>
</body>
</html>