<?php
session_name('La_Tresse');
session_start();

// require_once "../Model/User.php";
require_once "../Model/Hello_Thanks.php";
require_once "../tools/utils.php";


function imgConditionalDisplay($imgURL) {
  if ($imgURL != '') {
    return '<img src="' . $imgURL . '" alt="photo associée à la publication" class="bmcard_img dblock">';
  }
}

// Retrieve the offset from the query string
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 15;
$results = Hello_Thanks::get15($offset);
$cardsContentList = [];
foreach($results as $card) {
  $cardString = '<div class="bmcard_head"><div class="bmcard_head_child"><img src="' . $card['avatar_url'] . '" alt="Photo de profil" class="bmcard_profile_pic"><h3>' . $card['first_name'] . '</h3></div><div class="bmcard_head_child"><p class="bmcard_date">Le ' . date('d/m/y \à H:i', strtotime($card['ht_creation_datetime'])) . '</p>';
  if (+$card['ht_author'] === +$_SESSION['user_id'] || (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 1)) {
    $cardString .= '
      <div class="edit-container">
        <div class="edit-icon-container">
          <svg class="edit-icon" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="25" cy="25" r="10"/>
            <circle cx="75" cy="25" r="10"/>
            <circle cx="75" cy="75" r="10"/>
            <circle cx="25" cy="75" r="10"/>
          </svg>
        </div>
        <div>
          <div class="edit-modal dispnone">
            <ul>
              <li class="edit-btn"><p>Editer</p></li>
              <li class="delete-btn"><p>Supprimer</p></li>
            </ul>
          </div>
        </div>
      </div>';
  }
  $cardString .= '</div></div><div class="bmcard_txt"><p>' . nl2br($card['ht_text_content']) . '</p></div>' . imgConditionalDisplay($card['ht_image_url']) .'<div class="bmcard_foot"><div class="like-btn" data-liked="' . $card['has_liked'] . '" data-card="' . $card['ht_id'] . '"><svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg"><path id="path1-' . $card['ht_id'] . '" class="' . like_btn_class($card['has_liked']) . '" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/><path id="path2-' . $card['ht_id'] . '" class="' . like_btn_class($card['has_liked']) . '" d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z"/></svg><p class="' . like_btn_class($card['has_liked']) . '" id="like-count-' . $card['ht_id'] . '">' . non0($card['total_likes']) . '</p></div></div></div>';
  $cardsContentList[] = [ $cardString, $card['ht_id']];
}
// file_put_contents('log.txt', print_r($cardsContentList, true) . PHP_EOL, FILE_APPEND);
// ne pas oublier (<a href="">voir la suite</a>) & like button

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($cardsContentList);
?>


