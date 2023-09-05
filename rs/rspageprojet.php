<?php
  require_once "phpinclude/rs_pagetop.php";
  require_once "../Model/Project.php";
  require_once "../Model/Comment.php";

  $accueil_active = '';
  $projets_active = 'navbar-active';
  $reseau_active = '';
  $creer_active = '';
  $profil_active = '';
  $notifications_active = '';

  if (!empty($_GET)) {
    if (isset($_GET['id'])) {
      // get the project id
      $pjId = $_GET['id'];
      // build the project object
      $project = Project::findById($pjId);
      // get the project's number of likes
      $projectNumberOfLikes = $project->getNumberOfLikes();
      // find the project's 1st level comments 
      $comments = Comment::find1stLevelCommentsByProjectId($pjId);
      $numberOf1stLevelComments = count($comments);
      // $fullCommentsList will contain comments with subcomments as a sub-array
      $fullCommentsList = [];
      foreach($comments as $comment) {
        $commentNumberOfLikes = Comment::getNumberOflikes($comment['cm_id']);
        $subcomments = Comment::findSubcomments($pjId, $comment['cm_id']);
        // Adding & before $subcomment in the foreach loop makes it a reference to the original array elements, allowing to modify them directly
        foreach($subcomments as &$subcomment) {
          $subcomment['numberOfLikes'] = Comment::getNumberOflikes($subcomment['cm_id']);
        }
        unset($subcomment); // Unset the reference to avoid accidental modification later
        // file_put_contents('log.txt', var_export($subcomments, true) . PHP_EOL, FILE_APPEND);
        $numberOfSubcomments = count($subcomments);
        $comment['numberOfSubcomments'] = $numberOfSubcomments;
        $comment['numberOfLikes'] = $commentNumberOfLikes;
        $comment['subcomments'] = $subcomments;
        // add comment to the full list
        $fullCommentsList[] = $comment;
      } 
      // file_put_contents('log.txt', var_export($fullCommentsList, true) . PHP_EOL, FILE_APPEND);

    } // erreur
  } // erreur
    
?>

  <title>La Tresse - <?= $project->pjTitle ?></title>

</head>

<body class="rslayout rspageprojet">

<?php
    require_once "phpinclude/rs_header.php";
?>



  <main class="rscontent">
    <div class="project_discussion">
      <img src="<?= $project->pjBannerURL ?>" alt="bannière du projet" class="project_banner">
      <div class="project_presentation">
        <h1><?= $project->pjTitle ?></h1>
        <p class="project_category">Catégorie&nbsp;: <?= $project->pjCategory ?></p>
        <p class="project_category">Lieu&nbsp;: <?= $project->pjLocation ?></p>
        <p class="project_category">Budget&nbsp;: <?= $project->pjBudget ?></p>
        <p class="project_category">Catégorie&nbsp;: <?= $project->pjCategory ?></p>
        <p>
          <?= $project->pjDescription ?>
        </p>   
      </div>
      <div class="project_reaction">
        <div class="reactions_count_icons">
          <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
          <p><?= $projectNumberOfLikes ?></p>
        </div>
        <p><?= $numberOf1stLevelComments ?> réponses</p>
      </div>
      <form class="project_comment_post" id="project-comment-post">
        <textarea name="comment_input" id="comment_input" class="comment_input" placeholder="Ajoutez votre commentaire"></textarea>
        <input type="hidden" id="project-id" name="pj_id" value="<?= $pjId ?>">
        <button class="nice-blue-button" id="comment_input_btn">
          <img class="dblock" src="../img/icons/roundtick_yel.svg">
          <p>Publier</p> 
        </button>
      </form>

      <!-- <h2>Tous les commentaires</h2>
      <p class="tcenter">Trier par</p>
      <div class="center">
        <select class="tcenter" name="sort-by" id="sort-by">
          <option value="last-comment">Dernier commenté</option>
          <option value="most-recent">Plus récent</option>
        </select>
      </div> -->
      
      <div id="project_comments_list">    
        <div id="new-comment"></div>
        <?php foreach($fullCommentsList as $comment) { 
          $subcomments = $comment['subcomments']; /*var_dump($fullCommentsList); var_dump($subcomments);die();*/ ?>
          <div class="project_comment_body">
            <div data-cmid="<?= $comment['cm_id'] ?>" class="project_comment_itself">
              <div class="project_comment_header">
                <img src="<?= $comment['avatar_url'] ?>" alt="Photo de profil" class="project_comment_header_pic">
                <h3><?= $comment['first_name'] ?></h3>
              </div>
              <p>
                <?= nl2br($comment['cm_content']) ?>
              </p>
              <div class="project_comment_reaction">
                <div class="reactions_count_icons">
                  <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                  <p><?= $comment['numberOfLikes'] ?></p>  
                </div>
                <?php if ($comment['numberOfSubcomments'] === 0) { ?>
                  <button class="reply_btn nice-blue-button">
                    <img class="activity_card_item_icon" src="../img/icons/repondre.svg">
                    <p class="toggle-comment-form">Répondre</p>
                  </button>
                <?php } ?>
                <p class="comment-nb-responses"><?= $comment['numberOfSubcomments'] ?> réponses</p>
              </div>
            </div>

            <?php if ($comment['numberOfSubcomments'] > 0) {?>
              <div class="leftbar_container">
                <div class="leftbar"></div>
                <div class="project_subcomments_container">
                  <?php foreach($subcomments as $subcomment) {?>
                    <div class="project_subcomment">
                      <div class="project_subcomment_header">
                        <img src="<?= $subcomment['avatar_url'] ?>" alt="Photo de profil" class="project_comment_header_pic">
                        <h3><?= $subcomment['first_name'] ?></h3>
                      </div>
                      <p>
                        <?= nl2br($subcomment['cm_content']) ?>
                      </p>
                      <div class="project_subcomment_reaction">
                        <div class="reactions_count_icons">
                          <img src="../img/icons/like.png" alt="icone j'aime" class="project_reaction_icon">
                          <p><?= $subcomment['numberOfLikes'] ?></p>
                        </div>

                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="center">
                <button class="reply_btn nice-blue-button multisubcom">
                  <img class="activity_card_item_icon" src="../img/icons/repondre.svg">
                  <p class="toggle-comment-form">Répondre</p>
                </button>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        



        <!-- <div class="project_comment_itself">
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
              <p class="toggle-comment-form">Répondre</p>
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
                <p class="toggle-comment-form">Répondre</p>
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
                    <p class="toggle-comment-form">Répondre</p>
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
                    <p class="toggle-comment-form">Répondre</p>
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
                    <p class="toggle-comment-form">Répondre</p>
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
                <p class="toggle-comment-form">Répondre</p>
              </button>
              <p>49 réponses</p>
            </div>
          </div> -->
      </div> <!-- projects comments list -->
    </div>


  </main>

  <script>

  </script>
  <script src="../js/burger.js"></script>
  <script src="../js/resizing_textarea_comment.js"></script>
  <script src="../js/posting_comments.js"></script>
  <script src="../js/posting_subcomments.js"></script>
  <script src="../js/display_subcomments_forms.js"></script>
</body>
</html>