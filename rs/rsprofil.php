<?php
  require_once "phpinclude/rs_pagetop.php";
  require_once "../Model/Project.php";
  require_once "../Model/Hello_Thanks.php";


  $accueil_active = '';
  $projets_active = '';
  $reseau_active = '';
  $creer_active = '';
  $profil_active = 'navbar-active';
  $notifications_active = '';

  require_once "../tools/utils.php";
  require_once "../Model/User.php";

  if (!empty($_GET) && isset($_GET['slug'])) {
    $slug = sanitize($_GET['slug']);
    $user = User::getUserDetailsFromSlug($slug);
    $htList = Hello_Thanks::findByUser($user->userId);
  } else {
    $user = User::getUserDetails($_SESSION['user_id']);
    $htList = Hello_Thanks::findByUser($_SESSION['user_id']);
  }

  $newbieThreshold = 200;
  $seniorThreshold = 500;
  $engagementScore = $user->nbLikes + 5*$user->nbComments + 10*$user->nbHelloThanks + 20*$user->nbProjects;
  if ($engagementScore < $newbieThreshold) {
    $engagement = 'Débutant';
  }
  else if ($engagementScore < $seniorThreshold) {
    $engagement = 'Habitué';
  }
  else {
    $engagement = 'Expérimenté';
  }

  $occasionalThreshold = 30;
  $addictThreshold = 50;
  $now = new DateTime();
  $elapsedTime = $now->getTimestamp() - $user->accountCreationDate->getTimestamp();
  $loyaltyScore = 10**6 * $engagementScore / $elapsedTime;
  if ($loyaltyScore < $occasionalThreshold) {
    $loyalty = 'Occasionnel';
  }
  else if ($loyaltyScore < $addictThreshold) {
    $loyalty = 'Régulier';
  }
  else {
    $loyalty = 'Mordu';
  }
?>

    <title>La Tresse - Mon profil</title>

</head>

<body class="rslayout rsprofil">

<?php
    require_once "phpinclude/rs_header.php";
?>

  <main class="rscontent">
    <div id="rsprofil-content">
      <img src="<?= $user-> bannerURL ?>" alt="bannière de l'utilisateur" class="rs_user_banner">
        <div id="gear-container">
        <?php if (empty($_GET) && $user->userId === $_SESSION['user_id']) { ?>
          <svg id="gear-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
            <path id="gear" fill-rule="evenodd" clip-rule="evenodd" d="M12.7848 0.449982C13.8239 0.449982 14.7167 1.16546 14.9122 2.15495L14.9991 2.59495C15.3408 4.32442 17.1859 5.35722 18.9016 4.7794L19.3383 4.63233C20.3199 4.30175 21.4054 4.69358 21.9249 5.56605L22.7097 6.88386C23.2293 7.75636 23.0365 8.86366 22.2504 9.52253L21.9008 9.81555C20.5267 10.9672 20.5267 13.0328 21.9008 14.1844L22.2504 14.4774C23.0365 15.1363 23.2293 16.2436 22.7097 17.1161L21.925 18.4339C21.4054 19.3064 20.3199 19.6982 19.3382 19.3676L18.9017 19.2205C17.1859 18.6426 15.3408 19.6754 14.9991 21.405L14.9122 21.845C14.7167 22.8345 13.8239 23.55 12.7848 23.55H11.2152C10.1761 23.55 9.28331 22.8345 9.08781 21.8451L9.00082 21.4048C8.65909 19.6754 6.81395 18.6426 5.09822 19.2205L4.66179 19.3675C3.68016 19.6982 2.59465 19.3063 2.07505 18.4338L1.2903 17.1161C0.770719 16.2436 0.963446 15.1363 1.74956 14.4774L2.09922 14.1844C3.47324 13.0327 3.47324 10.9672 2.09922 9.8156L1.74956 9.52254C0.963446 8.86366 0.77072 7.75638 1.2903 6.8839L2.07508 5.56608C2.59466 4.69359 3.68014 4.30176 4.66176 4.63236L5.09831 4.77939C6.81401 5.35722 8.65909 4.32449 9.00082 2.59506L9.0878 2.15487C9.28331 1.16542 10.176 0.449982 11.2152 0.449982H12.7848ZM12 15.3C13.8225 15.3 15.3 13.8225 15.3 12C15.3 10.1774 13.8225 8.69998 12 8.69998C10.1774 8.69998 8.69997 10.1774 8.69997 12C8.69997 13.8225 10.1774 15.3 12 15.3Z"></path> 
          </g></svg>
          <div id="profile-menu">
            <ul>
              <a href="rsupdateprofile.php">
                <li class="profile-menu-item">
                  <svg id="update-profile-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="update_icon" viewBox="0 0 94 94" xml:space="preserve"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <path d="M94,47C94,21.043,72.958,0,47,0S0,21.043,0,47s21.042,47,47,47S94,72.957,94,47z M69.273,67.466 c-5.67,5.67-13.221,8.792-21.26,8.792c-8.038,0-15.587-3.122-21.256-8.792C15.873,56.58,15.001,39.54,24.358,27.66l-8.424-8.424 h24.397l0.001,24.397l-8.017-8.017c-5.015,7.4-4.192,17.475,2.311,23.979c3.57,3.568,8.324,5.534,13.39,5.534 c5.063,0,9.818-1.966,13.389-5.537c3.568-3.567,5.535-8.323,5.535-13.389c0-5.062-1.965-9.817-5.535-13.389 c-1.637-1.634-3.521-2.938-5.604-3.876l-2.33-1.049l4.568-10.15l2.33,1.052c3.316,1.491,6.312,3.564,8.904,6.157 C80.996,36.672,80.995,55.744,69.273,67.466z"></path> </g> </g></svg>
                  <p>Modifier mon profil</p>
                </li>
              </a>
              <a href="disconnect.php">
                <li class="profile-menu-item">
                  <svg class="update_icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path id="disconnect-icon" d="M2 6a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v2a1 1 0 1 1-2 0V6H4v12h9v-2a1 1 0 1 1 2 0v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm15.293 2.293a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a1 1 0 0 1-1.414-1.414L18.586 13H9a1 1 0 1 1 0-2h9.586l-1.293-1.293a1 1 0 0 1 0-1.414z"></path></g></svg>
                  <p>Déconnexion</p>
                </li>
              </a>
            </ul>           
          </div>

          <?php } ?>
        </div>
      <div id="user-namepic">
        <img src="<?= $user-> avatarURL ?>" alt="photo de profil" class="rs_user_profile_pic">
        <h1><?= $user-> firstName ?></h1>
      </div>
      <div id="scores" class="participation_score_title">
        <div class="profile_score">
          <p>Engagement&nbsp;:</p>
          <div class="participation_score">
            <p>
              <?= $engagement ?>
            </p>
          </div>
        </div>
        <div class="profile_score">
          <p>Fidélité&nbsp;:</p>
          <div class="participation_score">
            <p>
              <?= $loyalty ?>
            </p>
          </div>
        </div>
      </div>
      <p id="profil-autodescription"><?= includeLinks($user-> autoDescription) ?></p>
      <div id="tabs">
        <div id="projects">
          <p>Projets (<?= Project::countUserProjects($user->userId)[0]['nbProjects'] ?>)</p>
        </div>
        <div id="smiles" class="pointer">
          <p>Sourires (<?= $user->nbHelloThanks ?>)</p>
        </div>
      </div>
      <div id="profile-project-list" class="toggled">
        <div id="project-list-container"></div>
      </div>
      <div id="profile-ht-list">
        <div id="ht-list-container">
          <?php foreach($htList as $card) { ?>
            <div class="bmcard">
              <div class="bmcard_head">
							  <div class="bmcard_head_child">
                  <img src="<?= $card['avatar_url'] ?>" alt="Photo de profil" class="bmcard_profile_pic">
                  <h3><?= $card['first_name'] ?></h3>
                </div>
                <div class="bmcard_head_child">
                  <p class="bmcard_date">
                    Le <?= date('d/m/y \à H:i', strtotime($card['ht_creation_datetime'])) ?>
                  </p>
                </div>
              </div>
              <div class="bmcard_txt">
                <p>
                  <?= nl2br(includeLinks($card['ht_text_content'])) ?>
                </p>
              </div>
              <?php if ($card['ht_image_url'] != '') { ?>
                <img src="<?= $card['ht_image_url'] ?>" alt="photo associée à la publication" class="bmcard_img dblock">
              <?php } ?>
              <div class="bmcard_foot">
                <div class="like-btn" data-liked="0" data-card="<?= $card['ht_id'] ?>">
                  <svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="path1-<?= $card['ht_id'] ?>" class="like-btn-default" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/>
                    <path id="path2-<?= $card['ht_id'] ?>" class="like-btn-default" d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z"/>
                  </svg>
                  <p class="like-btn-default" id="like-count-<?= $card['ht_id'] ?>">
                    <?= non0(+$card['total_likes']) ?>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>


    </div>

  </main>
  <?php
    include "phpinclude/rs_footer.php";
  ?>
  <script> const projectsList = <?= Project::findByUser($user->userId) ?>;</script>
  <script src="../js/display_projects.js"></script>
  <script src="../js/profile_switch_tabs.js"></script>
  <script src="../js/profile_menu.js"></script>
  <script src="../js/burger.js"></script>
	<script src="../js/color_checkbox.js"></script>
</body>
</html>