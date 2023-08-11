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

<body class="rslayout rsprofil">

<?php
    require_once "phpinclude/rs_header.php";
?>





  <main class="rscontent">
    <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_user_banner">
    <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_user_profile_pic">
    <h1>John Doe</h1>
    <a href="rsupdateprofile.php">
      <div class="update_profile_btn">
        <svg fill="#fffced" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="update_icon" viewBox="0 0 94 94" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M94,47C94,21.043,72.958,0,47,0S0,21.043,0,47s21.042,47,47,47S94,72.957,94,47z M69.273,67.466 c-5.67,5.67-13.221,8.792-21.26,8.792c-8.038,0-15.587-3.122-21.256-8.792C15.873,56.58,15.001,39.54,24.358,27.66l-8.424-8.424 h24.397l0.001,24.397l-8.017-8.017c-5.015,7.4-4.192,17.475,2.311,23.979c3.57,3.568,8.324,5.534,13.39,5.534 c5.063,0,9.818-1.966,13.389-5.537c3.568-3.567,5.535-8.323,5.535-13.389c0-5.062-1.965-9.817-5.535-13.389 c-1.637-1.634-3.521-2.938-5.604-3.876l-2.33-1.049l4.568-10.15l2.33,1.052c3.316,1.491,6.312,3.564,8.904,6.157 C80.996,36.672,80.995,55.744,69.273,67.466z"></path> </g> </g></svg>
        <p>Modifier mon profil</p>
      </div>
    </a>
    <div class="maincontent">
      <!-- row transversal contenant la carte activité et l'auto-description  -->
      <div class="toprow">
        <div class="activity_card">
  
          <div class="activity_card_item">
            <img src="../img/icons/group.png" alt="icône projets" class="activity_card_item_icon">
            <p>3 projets proposés</p>
          </div>
          <div class="activity_card_item">
            <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#fffced" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
            <p>47 commentaires</p>
          </div>
          <div class="activity_card_item">
            <svg class="activity_card_item_icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fffced"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.41377 17.859C4.77159 17.6504 5.23081 17.7713 5.43947 18.1291C6.26633 19.5471 7.53043 20.6193 9.0893 21.3151C9.46755 21.4839 9.63733 21.9274 9.46851 22.3057C9.29969 22.6839 8.85621 22.8537 8.47796 22.6849C6.66645 21.8764 5.14664 20.6046 4.14369 18.8847C3.93503 18.5269 4.05595 18.0677 4.41377 17.859Z" fill="#fffced"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9058 3.92194C17.8919 2.88646 16.4459 2.50452 15.0303 2.9073C14.6319 3.02066 14.2171 2.78959 14.1037 2.39119C13.9904 1.99279 14.2214 1.57792 14.6198 1.46456C16.558 0.913072 18.5745 1.43959 19.9775 2.8725C20.2673 3.16846 20.2623 3.64331 19.9664 3.9331C19.6704 4.2229 19.1956 4.2179 18.9058 3.92194Z" fill="#fffced"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1901 3.30839C10.9761 2.94131 10.3523 2.7187 9.71858 3.08085C9.08722 3.44168 8.97618 4.07772 9.18651 4.4384L11.7122 8.76952C11.9208 9.12734 11.7999 9.58656 11.4421 9.79522C11.0843 10.0039 10.6251 9.88296 10.4164 9.52514L7.04885 3.75032C6.83479 3.38324 6.21098 3.16063 5.57731 3.52278C4.94595 3.88361 4.83491 4.51965 5.04525 4.88033L8.83373 11.377C9.04239 11.7348 8.92147 12.1941 8.56365 12.4027C8.20583 12.6114 7.74661 12.4905 7.53795 12.1326L5.85418 9.24522C5.64012 8.87814 5.01631 8.65553 4.38264 9.01768C3.75128 9.37851 3.64024 10.0145 3.85058 10.3752L7.63906 16.8719C9.248 19.631 13.2184 20.5264 16.5853 18.6021C19.95 16.6792 21.146 12.8377 19.5408 10.085L17.0152 5.75387C16.8011 5.38679 16.1773 5.16418 15.5436 5.52633C14.9123 5.88716 14.8012 6.5232 15.0116 6.88389L16.6953 9.7713C16.7961 9.94411 16.8237 10.15 16.7719 10.3432C16.7201 10.5365 16.5933 10.701 16.4196 10.8003C14.8771 11.6818 14.4044 13.3863 15.0797 14.5443C15.2884 14.9022 15.1675 15.3614 14.8096 15.57C14.4518 15.7787 13.9926 15.6578 13.7839 15.3C12.8712 13.7348 13.24 11.8501 14.4189 10.5181C14.7485 10.1457 14.8613 9.60396 14.6108 9.17438L11.1901 3.30839Z" fill="#fffced"></path> </g></svg>
            <p>13 bonjour / merci</p>
          </div>
          <div class="activity_card_item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fffced" class="activity_card_item_icon" viewBox="0 0 24 24"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"></path></g></svg>
            <p>Score de participation</p>
          </div>
          <div class="participation_score">
            <p>370</p>
          </div>
        </div>
        <div class="self-description">
          <p></p>
        </div>
      </div>

      <div class="acrsmiddle">
        
        <div class="bmcard">
          <div class="bmcard_head">
            <img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
            <h3>John Doe</h3>
          </div>
          <div class="bmcard_txt">
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in... (<a href="">voir la suite</a>)
            </p>
          </div>
          <img src="../img/rs/img1.jpg" alt="" class="bmcard_img dblock">
          <div class="bmcard_foot">
            <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fbd629"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M9.33 11.5h2.17A4.5 4.5 0 0 1 16 16H8.999L9 17h8v-1a5.578 5.578 0 0 0-.886-3H19a5 5 0 0 1 4.516 2.851C21.151 18.972 17.322 21 13 21c-2.761 0-5.1-.59-7-1.625L6 10.071A6.967 6.967 0 0 1 9.33 11.5zM4 9a1 1 0 0 1 .993.883L5 10V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h2zm9.646-5.425L14 3.93l.354-.354a2.5 2.5 0 1 1 3.535 3.536L14 11l-3.89-3.89a2.5 2.5 0 1 1 3.536-3.535z"></path> </g> </g></svg>
            <p>15</p>
          </div>
        </div>

        <div class="bmcard">
          <div class="bmcard_head">
            <img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
            <h3>John Doe</h3>
          </div>
          <div class="bmcard_txt">
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in... (<a href="">voir la suite</a>)
            </p>
          </div>
          <img src="../img/rs/img1.jpg" alt="" class="bmcard_img dblock">
          <div class="bmcard_foot">
            <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fbd629"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M9.33 11.5h2.17A4.5 4.5 0 0 1 16 16H8.999L9 17h8v-1a5.578 5.578 0 0 0-.886-3H19a5 5 0 0 1 4.516 2.851C21.151 18.972 17.322 21 13 21c-2.761 0-5.1-.59-7-1.625L6 10.071A6.967 6.967 0 0 1 9.33 11.5zM4 9a1 1 0 0 1 .993.883L5 10V19a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h2zm9.646-5.425L14 3.93l.354-.354a2.5 2.5 0 1 1 3.535 3.536L14 11l-3.89-3.89a2.5 2.5 0 1 1 3.536-3.535z"></path> </g> </g></svg>
            <p>15</p>
          </div>
        </div>

      </div>
    </div>


  </main>

    
  <script src="../js/burger.js"></script>
</body>
</html>