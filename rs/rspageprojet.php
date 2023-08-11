<?php
    require_once "phpinclude/rs_pagetop.php";

    $accueil_active = '';
    $projets_active = '';
    $reseau_active = '';
    $creer_active = '';
    $profil_active = '';
    $notifications_active = '';

?>

    <title>La Tresse - <?= $nomProjet ?></title>

</head>

<body class="rslayout rspageprojet">

<?php
    require_once "phpinclude/rs_header.php";
?>



  <main class="rscontent">
    <div class="project_discussion">
      <img src="../img/rs/pdm-banniere.png" alt="bannière du projet" class="project_banner">
      <div class="project_presentation">
        <h1>Passerelles De Mémoire</h1>
        <p class="project_category">Catégorie&nbsp;: Lambda</p>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit ama odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. 
        </p>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum  consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
        </p>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Loremm eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
        </p>      
      </div>
      <div class="project_reaction">
        <div class="reactions_count_icons">
          <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
          <p>15</p>
        </div>
        <p>4 réponses</p>
      </div>
      <form action="" class="project_comment_post">
        <textarea name="comment_input" id="comment_input" class="comment_input" placeholder="Ajoutez votre commentaire"></textarea>
        <button class="nice-blue-button">
          <svg class="dblock" width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.7682 9.64018C17.1218 9.21591 17.0645 8.58534 16.6402 8.23178C16.2159 7.87821 15.5853 7.93554 15.2318 8.35982L11.6338 12.6774C11.2871 13.0934 11.0922 13.3238 10.9366 13.4653L10.9306 13.4707L10.9242 13.4659C10.7564 13.339 10.5415 13.1272 10.1585 12.7443L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.74428 14.1585L8.78511 14.1993L8.78512 14.1993C9.11161 14.526 9.4257 14.8402 9.71794 15.0611C10.0453 15.3087 10.474 15.5415 11.0234 15.5165C11.5728 15.4916 11.9787 15.221 12.2823 14.9448C12.5534 14.6983 12.8377 14.3569 13.1333 14.0021L13.1333 14.0021L13.1703 13.9577L16.7682 9.64018Z" fill="#fbd629"></path> </g></svg>                    
          <p>Publier</p> 
        </button>
      </form>
      <h2>Tous les commentaires</h2>
      <p class="tcenter">Trier par</p>
      <div class="center">
        <select class="tcenter" name="sort-by" id="sort-by">
          <option value="last-comment">Dernier commenté</option>
          <option value="most-recent">Plus récent</option>
        </select>
      </div>
      <div class="project_comments_list">
        
        <div class="project_comment_itself">
          <div class="project_comment_header">
            <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
            <h3>John Doe</h3>
          </div>
          <p>
            Lorem, ipsum dolor aund sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
          </p>
          <div class="project_comment_reaction">
            <div class="reactions_count_icons">
              <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
              <p>15</p>
            </div>
            <button class="reply_btn">
              <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
              <p>Répondre</p>
            </button>
            <p>49 réponses</p>
          </div>
        </div>

        <div class="project_comment_body">
          <div class="project_comment_itself">
            <div class="project_comment_header">
              <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
              <h3>John Doe</h3>
            </div>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
            </p>
            <div class="project_comment_reaction">
              <div class="reactions_count_icons">
                <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                <p>15</p>
              </div>
              <button class="reply_btn">
                <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
                <p>Répondre</p>
              </button>
              <p>49 réponses</p>
            </div>
          </div>
    
          <div class="leftbar_container">
            <div class="leftbar"></div>
            <div class="project_subcomments_container">
              <div class="project_subcomment">
                <div class="project_subcomment_header">
                  <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
                  <h3>John Doe</h3>
                </div>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                </p>
                <div class="project_subcomment_reaction">
                  <div class="reactions_count_icons">
                    <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                    <p>15</p>
                  </div>
                  <button class="reply_btn">
                    <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
                    <p>Répondre</p>
                  </button>
                  <p>49 réponses</p>
                </div>
              </div>
              
              <div class="project_subcomment">
                <div class="project_subcomment_header">
                  <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
                  <h3>John Doe</h3>
                </div>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                </p>
                <div class="project_subcomment_reaction">
                  <div class="reactions_count_icons">
                    <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                    <p>15</p>
                  </div>
                  <button class="reply_btn">
                    <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
                    <p>Répondre</p>
                  </button>
                  <p>49 réponses</p>
                </div>
              </div>
              
              <div class="project_subcomment">
                <div class="project_subcomment_header">
                  <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
                  <h3>John Doe</h3>
                </div>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                </p>
                <div class="project_subcomment_reaction">
                  <div class="reactions_count_icons">
                    <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                    <p>15</p>
                  </div>
                  <button class="reply_btn">
                    <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
                    <p>Répondre</p>
                  </button>
                  <p>49 réponses</p>
                </div>
              </div>
            </div>
          </div>

          
          <div class="project_comment_itself">
            <div class="project_comment_header">
              <img src="../img/rs/alf.jpg" alt="Photo de profil" class="project_comment_header_pic">
              <h3>John Doe</h3>
            </div>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.
            </p>
            <div class="project_comment_reaction">
              <div class="reactions_count_icons">
                <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                <p>15</p>
              </div>
              <button class="reply_btn">
                <svg class="activity_card_item_icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#ffe154" fill-rule="evenodd" d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7.667a1 1 0 0 0-.6.2L3.6 21.8A1 1 0 0 1 2 21V6zm5 0a1 1 0 0 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H7zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H7z" clip-rule="evenodd"></path></g></svg>
                <p>Répondre</p>
              </button>
              <p>49 réponses</p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </main>

    
  <script src="../js/burger.js"></script>
  <script src="../js/resizing_textarea.js"></script>
</body>
</html>