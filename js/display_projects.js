const projectListContainer = document.getElementById('project-list-container');
const projectsLisLength = projectsList.length
renderProjectList(projectsList);

function renderProjectList(projectList) {
  for (let i = 0; i < projectsLisLength; i++) {
  // projectsList.foreach((project)=> {
    const projectContainer = document.createElement('a');
    projectContainer.href = 'rspageprojet.php?id=' + projectList[i].pj_id;
    projectContainer.classList.add('w100');
    const chunk1 = '<div class="project-container rsprojets-container"><div class="project-header"><div class="project-author"><img src="';
    const chunk2 = '" alt="Photo de profil" class="bmcard_profile_pic"><p class="project-author-name">';
    const chunk3 = '</p></div><p class="project-date">Le ';
    const chunk4 = '</p></div><img src="';
    const chunk5 = '" alt="bannière du projet" class="project_banner"><div class="project_presentation"><h1>';
    const chunk6 = '</h1><div class="project-attributes"><div class="project-card"><svg class="project-category-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path class="icon-fill-blue-medium" opacity="0.8" d="M18.6695 2H16.7695C14.5895 2 13.4395 3.15 13.4395 5.33V7.23C13.4395 9.41 14.5895 10.56 16.7695 10.56H18.6695C20.8495 10.56 21.9995 9.41 21.9995 7.23V5.33C21.9995 3.15 20.8495 2 18.6695 2Z"></path><path class="icon-fill-blue-light" opacity="0.9" d="M7.24 13.4302H5.34C3.15 13.4302 2 14.5802 2 16.7602V18.6602C2 20.8502 3.15 22.0002 5.33 22.0002H7.23C9.41 22.0002 10.56 20.8502 10.56 18.6702V16.7702C10.57 14.5802 9.42 13.4302 7.24 13.4302Z"></path><path class="icon-fill-standard" d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z"></path><path class="icon-fill-active" d="M17.7099 21.9999C20.0792 21.9999 21.9999 20.0792 21.9999 17.7099C21.9999 15.3406 20.0792 13.4199 17.7099 13.4199C15.3406 13.4199 13.4199 15.3406 13.4199 17.7099C13.4199 20.0792 15.3406 21.9999 17.7099 21.9999Z"></path></g></svg><p class="project_category tcenter">';
    const chunk7 = '</p></div><div class="project-card"><svg class="project-location-icon" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="none"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path class="icon-fill-standard" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path></g></svg><p class="project_category tcenter">';
    const chunk8 = '</p></div><div class="project-card" class="budget"><svg class="project-budget-icon icon-fill-standard" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.011 512.011" xml:space="preserve" stroke="#ddd"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <g><path d="M503.602,307.211h-28.6c-15-31.7-35.7-50.6-63-57.7l14.5-50.9c1-3.4-0.3-7-3.1-9.2c-2.8-2.1-6.7-2.3-9.7-0.4l-62.9,39.3 c-41.1-33.4-106.7-40.6-155.5-40.6c-37.7,0-72.9,7.5-102.7,20.5l-15.4,7.4c-1.3,0.7-2.7,1.5-4,2.2c-1.2-9.7-5.6-19-11.9-25.9 c-13.2-14.5-31.9-17.4-47.7-7.3c-7.4,4.7-12.3,12.4-13,20.4c-0.9,9.6,4.4,18.8,12.7,22.5c6.3,2.7,13.7,2.3,22.3-1.2 c3.8-1.6,5.6-6,4.1-9.8c-1.6-3.8-6-5.6-9.8-4.1c-3.2,1.3-7.6,2.6-10.5,1.3c-2.4-1.1-4.1-4.3-3.8-7.4c0.3-3.4,2.7-6.9,6.1-9.1 c14.3-9.1,25.5,1.3,28.6,4.7c6,6.6,9.6,16.3,7.8,25.3c-35.8,24.9-58,59.2-58,97.1c0,28.2,8.8,52.6,26.3,72.3l25.1,108.8 c0.9,3.9,4.3,6.6,8.3,6.6h76.8c4.7,0,8.5-3.8,8.5-8.5v-30.7c36.5,11.6,74.6,13.5,115.8,5.9l22.4,29.9c1.6,2.2,4.1,3.4,6.8,3.4 h59.7c4.7,0,8.5-3.8,8.5-8.5v-43.7c89.8-12.6,153.9-58.2,153.6-109.9v-34.1C512.102,311.011,508.302,307.211,503.602,307.211z M272.602,246.011c-1.3,3.4-4.5,5.5-8,5.5c-1,0-2-0.2-3-0.5c-42.5-16-82.3-16-121.8-0.1c-4.4,1.8-9.3-0.3-11.1-4.7 c-1.8-4.4,0.4-9.3,4.7-11.1c43.6-17.6,87.5-17.6,134.2-0.1C272.002,236.711,274.302,241.611,272.602,246.011z M416.502,303.811 c-1.7,2.2-4.2,3.4-6.8,3.4c-1.8,0-3.6-0.6-5.1-1.7c-3.8-2.8-4.6-8.2-1.7-12c2.8-3.8,8.1-4.6,11.9-1.7l0.1,0.1 C418.602,294.711,419.402,300.011,416.502,303.811z"></path><path d="M181.902,169.511c58.3,9.7,108.3-40.3,98.6-98.6c-5.8-35.4-34.3-63.9-69.6-69.7c-58.3-9.7-108.3,40.3-98.6,98.6 C118.102,135.111,146.602,163.611,181.902,169.511z M145.202,76.711h5.9c2,0,3.6-1.4,4.1-3.4c5.4-22.5,25.6-39.3,49.7-39.3 c4.7,0,8.5,3.8,8.5,8.5s-3.8,8.5-8.5,8.5c-13.6,0-25.3,8-30.7,19.6c-1.3,2.8,0.8,6,3.9,6h9.7v0.2c4.7,0,8.5,3.8,8.5,8.5 s-3.8,8.5-8.5,8.5h-9.7c-3.1,0-5.3,3.2-3.9,6c5.5,11.5,17.1,19.6,30.7,19.6c4.7,0,8.5,3.8,8.5,8.5c0,4.7-3.8,8.5-8.5,8.5 c-24.1,0-44.4-16.8-49.7-39.3c-0.5-1.9-2.1-3.4-4.1-3.4h-5.9c-4.7,0-8.5-3.8-8.5-8.5 C136.702,80.511,140.502,76.711,145.202,76.711z"></path></g></g></g></g></svg><p class="project_category tcenter">';
    const chunk9 = '</p></div></div><p>';
    const chunk10 = '</p></div><div id="project_reaction" class="project-reaction"><div class="like-btn"><svg width="20" height="20" viewBox="0 0 90 86" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="like-btn-active" d="M18.5 85L1.5 62.5C6.29746 50.4098 10.6441 45.7408 22 42C27.3943 41.2335 30.4774 41.5048 36 43L57.5 43.5C63 44.5 64 52.5 57.5 55.5L38 56C36.5 56.5 36.5 59 38 59.5H58C59.8725 59.1695 60.7786 58.7848 62 57.5L78 42C86.5 39 91 43.5 88 51.5L65.5 74C61.9829 77.7723 59.877 78.8437 56 78.5L45.5 77.5C30.0921 75.2017 23.9499 76.7544 18.5 85Z"/><path class="like-btn-active" d="M85.0062 27.5001C82.0062 32.5 73.5062 38 66.0062 47.5001C64.7149 43.0428 61.5 39 59.0062 39.0001H40.0062C34.1302 38.6457 27 37.5 26.5062 37.0001C0.500718 14.5 29.5 -14 51.0062 11.0001C67.5062 -6.00003 92.0062 0.999996 85.0062 27.5001Z"/></svg><p class="like-btn-active">';
    const chunk11 = '</p></div><p>';
    let s = '';
    if(Number(projectList[i].nbComments) > 1) {
      s = 's';
    }
    const chunk12 = ' commentaire' + s + '</p></div></div>';

    // display the number of likes only if it's not 0
    let totalLikes = '';
    if(Number(projectList[i].total_likes) > 0) {
      totalLikes = projectList[i].total_likes;
    }
    let nbCommentaires = '';
    if(Number(projectList[i].nbComments) === 0) {
      nbCommentaires = 'aucun';
    } else {
      nbCommentaires = projectList[i].nbComments;
    }
    const pjDate = new Date(projectList[i].pj_creation_date);
    const pjYear = pjDate.getFullYear().toString().substring(2);
    const projectHtml = chunk1 + projectList[i].avatar_url + chunk2 + projectList[i].first_name + chunk3 + pjDate.getDate() + '/' + pjDate.getMonth() + '/' + pjYear + chunk4 + projectList[i].pj_bannerURL + chunk5 + projectList[i].pj_title + chunk6 + 'Aucune' + chunk7 + projectList[i].pj_location + chunk8 + projectList[i].pj_budget + chunk9 + projectList[i].pj_description.substring(0,400) + ' …' + chunk10 + totalLikes + chunk11 + nbCommentaires + chunk12;
    projectContainer.innerHTML = projectHtml;
    projectListContainer.appendChild(projectContainer);
  // })
  }
}