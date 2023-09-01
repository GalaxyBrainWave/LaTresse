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
  $cardsContentList[] = '<div class="bmcard_head"><img src="' . $card['avatar_url'] . '" alt="Photo de profil" class="bmcard_profile_pic"><h3>' . $card['first_name'] . '</h3></div><div class="bmcard_txt"><p>' . nl2br($card['ht_text_content']) . '</p></div>' . imgConditionalDisplay($card['ht_image_url']) .'<div class="bmcard_foot"><svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="like-btn-default" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/><path d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z" class="like-btn"/></svg><p class="like-btn-default">15</p></div>';
}
// ne pas oublier (<a href="">voir la suite</a>) & like button

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($cardsContentList);
?>


