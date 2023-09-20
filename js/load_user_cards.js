const userCardsContainer = document.getElementById('user-cards-container');

userList.forEach(userCard => {
  userCard.likes = userCard.htLikesCount + userCard.cmLikesCount + userCard.pjLikesCount
  renderUserCard(userCard);
});

// console.log('userList: ', userList);

// async function getAllUsers() {
//   try { // send a request to this php file
//     const response = await fetch('load_user_cards.php');
//     if (response.ok) {
//       const userList = await response.json();
//       const listLength = userList.length;
//       // resolve order logic
//       for (let i = 0; i < listLength; i++) {
//         renderUserCard(userList[i]);
//       }
//     }
//   } catch (error) {
//     console.error("An error occurred:", error); // handle
//   }
// }


function renderUserCard(userCard) {
  userCard.registerDate = new Date(userCard.registerDate);
  const card = document.createElement('a');
  card.href = '';
  card.target = "_blank";
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
  htmlString += userEngagementScore(userCard.likes, userCard.htCount, userCard.cmCount, userCard.pjCount);
  htmlString += chunk7 + userLoyaltyScore(userCard.likes, userCard.htCount, userCard.cmCount, userCard.pjCount, userCard.registerDate) + chunk8;
  card.innerHTML = htmlString;
  userCardsContainer.appendChild(card);
}

function userEngagementScore(likes, ht, comments, projects) {
  const score = likes + 5*comments + 10*ht + 20*projects;
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
  const score = (likes + 5*comments + 10*ht + 20*projects) * 10**9 / elapsedTimeSinceRegistration;
  const occasionalThreshold = 130;
  const addictThreshold = 330;
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