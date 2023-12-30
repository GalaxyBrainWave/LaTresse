const userCardsContainer = document.getElementById('user-cards-container');

userList.forEach(userCard => {
  renderUserCard(userCard);
});


function renderUserCard(userCard) {
  userCard.registerDate = new Date(userCard.registerDate);
  const card = document.createElement('a');
  card.href = 'rsprofil.php?slug=' + userCard.slug;
  const chunk1 = '<div class="rs_card"><img src="';
  const chunk2 = '" alt="bannière utilisateur" class="rs_card_banner"><img src="';
  const chunk3 = '" alt="photo de profil" class="rs_card_profile_pic"><div class="rs_card_middle"><h3>';
  const chunk4 = '</h3><p>';
  const chunk5 = '</p><p>Nous a rejoint le ';
  const chunk6 = '</p></div><div class="participation_score_title"><div><p>Engagement</p><div class="participation_score"><p>';
  const chunk7 = '</p></div></div><div><p>Fidélité</p><div class="participation_score"><p>';
  const chunk8 = '</p></div></div></div></div>';
  let htmlString = chunk1 + userCard.bannerURL + chunk2 + userCard.avatarURL + chunk3;
  htmlString += userCard.firstName + chunk4 + userCard.autodescription + chunk5 + userCard.registerDate.getDate() + '/' + userCard.registerDate.getMonth() + '/' + (userCard.registerDate.getFullYear() - 2000) + chunk6;
  htmlString += userEngagementScore(+userCard.likes, +userCard.htCount, +userCard.cmCount, +userCard.pjCount);
  htmlString += chunk7 + userLoyaltyScore(+userCard.likes, +userCard.htCount, +userCard.cmCount, +userCard.pjCount, userCard.registerDate) + chunk8;
  card.innerHTML = htmlString;
  userCardsContainer.appendChild(card);
}

function userEngagementScore(likes, ht, comments, projects) {
  const score = likes + 5*comments + 10*ht + 20*projects;
  console.log({score});
  const newbieThreshold = 200;
  const seniorThreshold = 500;
  if (score < newbieThreshold) {
    return 'Débutant';
  } else if (score < seniorThreshold) {
    return 'Habitué';
  } else return 'Expérimenté';
}

function userLoyaltyScore(likes, ht, comments, projects, registrationDate) {
  const now = new Date();
  const elapsedTimeSinceRegistration = now.getTime() - registrationDate.getTime();
  console.log({elapsedTimeSinceRegistration});
  const score = (likes + 5*comments + 10*ht + 20*projects) * 10**9 / elapsedTimeSinceRegistration;
  const occasionalThreshold = 30;
  const addictThreshold = 50;
  console.log('userLoyaltyScore: ', score);
  if (score < occasionalThreshold) {
    return 'Occasionnel';
  } else if (score < addictThreshold) {
    return 'Régulier';
  } else return 'Mordu';
}


// Fidélité
// occasionnel
// régulier
// mordu

// Engagement
// débutant
// confirmé
// experimenté