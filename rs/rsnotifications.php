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
          foreach($newNotifications as $newNotifification) { ?>
            <div class="notif_card notif_card_active">
              <div class="notif_card_top">
                <div class="notif_card_top_pic_container">
                  <img src="<?= $newNotifification['avatar_url'] ?>" alt="photo de profil">
                </div>
                <div class="notif_card_top_txt_container">
                  <p>
                    <?= $newNotifification['nf_content'] ?>
                  </p>
                </div>
              </div>
              <div class="notif_card_bottom">
                <p>Le <?= $newNotifification['nf_datetime'] ?></p>
              </div>
            </div>
          
          <?php  }
        } 
      ?>


      <?php 
        if(count($oldNotifications) > 0) {
          foreach($oldNotifications as $oldNotification) { ?>
            <div class="notif_card">
              <div class="notif_card_top">
                <div class="notif_card_top_pic_container">
                  <img src="<?= $oldNotification['avatar_url'] ?>" alt="photo de profil">
                </div>
                <div class="notif_card_top_txt_container">
                  <p>
                    <?= $oldNotification['nf_content'] ?>
                  </p>
                </div>
              </div>
              <div class="notif_card_bottom">
                <p>Le <?= $oldNotification['nf_datetime'] ?></p>
              </div>
            </div>
          <?php  }
        }
      ?>
    </div>

      
    
  </main>

    
  <script src="../js/burger.js"></script>
</body>
</html>