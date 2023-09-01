<?php
	
	require_once "phpinclude/rs_pagetop.php";
	require_once "../Model/Hello_Thanks.php";

	$first15Cards = Hello_Thanks::get15(0);

	function like_btn_class($has_liked) {
		return $has_liked === '1' ? 'like-btn-active' : 'like-btn-default';
	}


	// show accueil as active on the navbar
	$accueil_active = 'navbar-active';
	$projets_active = '';
	$reseau_active = '';
	$creer_active = '';
	$profil_active = '';
	$notifications_active = '';

?>

	<title>La Tresse - Accueil</title>

</head>

<body class="rslayout">

<?php
	require_once "phpinclude/rs_header.php";
?>

<div id="modal">
	<!-- <div id="modal-content"> -->
    <span id="modal-close-btn">&times;</span>
		<img src="" alt="photo associée à la publication" id="big-img">
  <!-- </div> -->
</div>

<main class="rscontent accueilrs">
	<aside class="acrsasd acrscom">
		<div class="acrsasd_head">
			<h3 class="tcenter">Derniers commentaires</h3>
		</div>
		<div class="acrsasd_card_container">
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
					<h5>Jean Durand</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Projet&nbsp;: <br> Passerelle de mémoire</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
					<h5>Jean Durand</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Projet&nbsp;: <br> Passerelle de mémoire</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
					<h5>Jean Durand</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Projet&nbsp;: <br> Passerelle de mémoire</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
		</div>
	</aside>

	<aside class="acrsasd acrsproj">
		<div class="acrsasd_head">
			<h3 class="tcenter">Derniers projets</h3>
		</div>
		<div class="acrsasd_card_container">
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<h5>Passerelle de mémoire</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Auteur&nbsp;: <br> Jean Durand</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<h5>Passerelle de mémoire</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Auteur&nbsp;: <br> Jean Durand</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
			<div class="acrsasd_card">
				<div class="acrsasd_card_head">
					<h5>Passerelle de mémoire</h5>
				</div>
				<div class="acrsasd_card_body">
					<p class="acrsasd_projet">Auteur&nbsp;: <br> Jean Durand</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, ipsum dolor sit amet consectetur adipisicing elit ...</p>
					<p class="acrsasd_date">Le 20/05/2023 à 22:43</p>
				</div>
			</div>
		</div>
	</aside>

		<div class="acrsmiddle">
			<form action="hello_thx.php" method="post" enctype="multipart/form-data" class="bjrmrc">
				<textarea name="bjrtxt" id="bjrtxt" class="comment_input" placeholder="Dire bonjour ou merci…"></textarea>
				<div class="bmbuttons">
					<input type="file" name="illustration" id="picinput">
					<label for="picinput" class="nice-blue-button">            
						<svg class="dblock" width="12px" height="12px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.205 3h11.59c1.114 0 1.519.116 1.926.334.407.218.727.538.945.945.218.407.334.811.334 1.926v7.51l-4.391-4.053a1.5 1.5 0 0 0-2.265.27l-3.13 4.695-2.303-1.48a1.5 1.5 0 0 0-1.96.298L3.005 18.15A12.98 12.98 0 0 1 3 17.795V6.205c0-1.115.116-1.519.334-1.926.218-.407.538-.727.945-.945C4.686 3.116 5.09 3 6.205 3zm9.477 8.53L21 16.437v1.357c0 1.114-.116 1.519-.334 1.926a2.272 2.272 0 0 1-.945.945c-.407.218-.811.334-1.926.334H6.205c-1.115 0-1.519-.116-1.926-.334a2.305 2.305 0 0 1-.485-.345L8.2 15.067l2.346 1.508a1.5 1.5 0 0 0 2.059-.43l3.077-4.616zM7.988 6C6.878 6 6 6.832 6 7.988 6 9.145 6.879 10 7.988 10 9.121 10 10 9.145 10 7.988 10 6.832 9.121 6 7.988 6z" fill="#fbd629"></path></g></svg>          
						<p>Image</p>
					</label>
					<button class="nice-blue-button">
						<svg class="dblock" width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.7682 9.64018C17.1218 9.21591 17.0645 8.58534 16.6402 8.23178C16.2159 7.87821 15.5853 7.93554 15.2318 8.35982L11.6338 12.6774C11.2871 13.0934 11.0922 13.3238 10.9366 13.4653L10.9306 13.4707L10.9242 13.4659C10.7564 13.339 10.5415 13.1272 10.1585 12.7443L8.70711 11.2929C8.31658 10.9024 7.68342 10.9024 7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L8.74428 14.1585L8.78511 14.1993L8.78512 14.1993C9.11161 14.526 9.4257 14.8402 9.71794 15.0611C10.0453 15.3087 10.474 15.5415 11.0234 15.5165C11.5728 15.4916 11.9787 15.221 12.2823 14.9448C12.5534 14.6983 12.8377 14.3569 13.1333 14.0021L13.1333 14.0021L13.1703 13.9577L16.7682 9.64018Z" fill="#fbd629"></path> </g></svg>          
						<p>Publier</p> 
					</button>
				</div>
			</form>
			
			<div id="bmcards-container">
				<?php foreach($first15Cards as $card) { ?>
					<div class="bmcard">
						<div class="bmcard_head">
								<img src="<?= $card['avatar_url'] ?>" alt="Photo de profil" class="bmcard_profile_pic">
							<h3><?= $card['first_name'] ?></h3>
						</div>
						<div class="bmcard_txt">
							<p>
								<?= nl2br($card['ht_text_content']) ?>
							</p>
						</div>
						<?php if ($card['ht_image_url'] != '') { ?>
							<img src="<?= $card['ht_image_url'] ?>" alt="photo associée à la publication" class="bmcard_img dblock">
						<?php } ?>
						<div class="bmcard_foot">
							<div class="ht-like-btn" data-liked="<?= $card['has_liked'] ?>" data-card="<?= $card['ht_id'] ?>">
								<svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="path1-<?= $card['ht_id'] ?>" class="<?= like_btn_class($card['has_liked']) ?>" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/>
									<path d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z" id="path2-<?= $card['ht_id'] ?>" class="<?= like_btn_class($card['has_liked']) ?>"/>
								</svg>
								<p class="<?= like_btn_class($card['has_liked']) ?>" id="like-count-<?= $card['ht_id'] ?>"><?= $card['total_likes'] ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<button id="load-button">Voir plus</button>

				<!-- <div class="bmcard">
					<div class="bmcard_head">
						<img src="../img/rs/alf.jpg" alt="Photo de profil" class="bmcard_profile_pic">
						<h3>John Doe</h3>
					</div>
					<div class="bmcard_txt">
						<p>
							Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in... (<a href="">voir la suite</a>)
						</p>
					</div>
					<img src="../img/rs/img1.jpg" alt="photo associée à la publication" class="bmcard_img dblock">
					<div class="bmcard_foot">
						<img src="../img/icons/like.png" alt="icône j'aime">
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
				</div> -->
		</div>
		

</main>

	
	<script>const userId = <?= $_SESSION['user_id'] ?>;</script>
	<script src="../js/resizing_textarea_bjr.js"></script>
	<script src="../js/burger.js"></script>
	<script src="../js/load_htcards.js"></script>
	<script src="../js/modal_img.js"></script>
	<script src="../js/htcards_likes.js"></script>
</body>
</html>