const bjrtxt = document.getElementById('bjrtxt');

bjrtxt.addEventListener('input', () => {
  bjrtxt.style.height = 'auto';
  bjrtxt.style.height = (bjrtxt.scrollHeight) + 'px';
});

// bjrtxt.addEventListener('keydown', (event) => {
//   if (event.key === 'Enter') {
//     event.preventDefault();
//     bjrtxt.value += '\n';
//     bjrtxt.dispatchEvent(new Event('input'));
//   }
// });



