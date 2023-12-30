<?php
    require_once "phpinclude/rs_pagetop.php";
    require_once "../Model/Notification.php";

    $accueil_active = '';
    $projets_active = '';
    $reseau_active = '';
    $creer_active = '';
    $profil_active = '';
    $notifications_active = 'navbar-active';
    $_SESSION['notifications'] = true;

  $newNotifications = Notification::getNew($_SESSION['user_id']);
  $oldNotifications = Notification::getOld($_SESSION['user_id']);

  function generateContent(array $notification):string {
    // var_dump($notification);die();
    if ($notification['parent_cm_id'] === null) {
      $textContent = $notification['first_name'] . ' a commenté votre projet ' . $notification['pj_title'] . '&nbsp;: "' . substr($notification['cm_content'], 0, 100) . '…"';
    }
    else {
      $cm = '#cm' . $notification['cm_id'];
      $textContent = $notification['first_name'] . ' a répondu à votre commentaire sur le projet ' . $notification['pj_title'] . '&nbsp;: "' . substr($notification['cm_content'], 0, 100) . '…"';
    }
    return $textContent;
  }




?>

    <title>La Tresse - Notifications</title>

</head>

<body class="rslayout rsnotifications">

<?php
    require_once "phpinclude/rs_header.php";
?>

  <main class="rscontent">
    <div class="notifications_container">
      <h2>Notifications</h2>

      <?php 
        if(count($newNotifications) > 0) {
          foreach($newNotifications as $newNotification) { 
            // -----------
            $cm = $newNotification['cm_id'] !== null ? '' : '#cm' . $newNotification['cm_id'];
            ?>
            <a href="rspageprojet.php?id=<?= $newNotification['pj_id'] . $cm ?>">
              <div class="notif_card notif_card_active">
                <div class="notif_card_top">
                  <div class="notif_card_top_pic_container">
                    <img src="<?= $newNotification['avatar_url'] ?>" alt="photo de profil">
                  </div>
                  <div class="notif_card_top_txt_container">
                    <p>
                      <?= generateContent($newNotification) ?>
                    </p>
                  </div>
                </div>
                <div class="notif_card_bottom">
                  <p>Le <?= date('d/m/y \à H:i', strtotime($newNotification['nf_datetime'])) ?></p>
                </div>
              </div>
            </a>
          <?php  }
        } 
      ?>


      <?php 
        if(count($oldNotifications) > 0) {
          foreach($oldNotifications as $oldNotification) { 
            $cm = $oldNotification['cm_id'] !== null ? '' : '#cm' . $oldNotification['cm_id']  ?>
            <a href="rspageprojet.php?id=<?= $oldNotification['pj_id'] . $cm ?>">
              <div class="notif_card">
                <div class="notif_card_top">
                  <div class="notif_card_top_pic_container">
                    <img src="<?= $oldNotification['avatar_url'] ?>" alt="photo de profil">
                  </div>
                  <div class="notif_card_top_txt_container">
                    <p>
                      <?= generateContent($oldNotification) ?>
                    </p>
                  </div>
                </div>
                <div class="notif_card_bottom">
                  <p>Le <?= date('d/m/y \à H:i', strtotime($oldNotification['nf_datetime'])) ?></p>
                </div>
              </div>
            </a>



          <?php  }
        }
      ?>
    </div>

      
    
  </main>
  <?php
include "phpinclude/rs_footer.php";
?>
    
  <script src="../js/burger.js"></script>
	<script src="../js/color_checkbox.js"></script>
</body>
</html>