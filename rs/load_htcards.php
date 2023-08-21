<?php
session_name('La_Tresse');
session_start();

// require_once "../Model/User.php";
require_once "../Model/Hello_Thanks.php";

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
  $cardsContentList[] = '<div class="bmcard_head"><img src="' . $card['avatar_url'] . '" alt="Photo de profil" class="bmcard_profile_pic"><h3>' . $card['first_name'] . '</h3></div><div class="bmcard_txt"><p>' . $card['ht_text_content'] . '</p></div>' . imgConditionalDisplay($card['ht_image_url']) .'<div class="bmcard_foot"><img src="../img/icons/like.png" alt="icône j\'aime"><p>15</p></div>';
}
// ne pas oublier (<a href="">voir la suite</a>) & like button

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($cardsContentList);
?>
