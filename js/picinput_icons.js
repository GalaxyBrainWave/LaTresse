const picInputs = document.querySelectorAll('input[type=file]');

picInputs.forEach(
  input => {
    input.addEventListener('change', 
    () => {
      if (input.files.length > 0) {
        const inputContainer = input.closest('.project-image-input-container');
        inputContainer.querySelector('.picinput-confirm-icon').classList.remove('dispnone');
      }
    })
    
  }
)