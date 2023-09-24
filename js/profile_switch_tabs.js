const smiles = document.getElementById('smiles');
const projects = document.getElementById('projects');
const htList = document.getElementById('profile-ht-list');
const projectList = document.getElementById('profile-project-list');

smiles.addEventListener('click', showSmiles);

projects.addEventListener('click', showProjects);

function showSmiles() {
  if(!smiles.classList.contains('toggled')) {
    projectList.style.display = 'none';
    htList.style.display = 'flex';
    smiles.classList.remove('pointer');
    projects.classList.add('pointer');
    projects.classList.remove('toggled');
    smiles.classList.add('toggled');
  }
}
  
function showProjects() {
  if(!projects.classList.contains('toggled')) {
    htList.style.display = 'none';
    projectList.style.display = 'flex';
    projects.classList.remove('pointer');
    smiles.classList.remove('toggled');
    smiles.classList.add('pointer');
    projects.classList.add('toggled');
  }
}