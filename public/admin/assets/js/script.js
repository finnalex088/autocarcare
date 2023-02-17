// Add class on scroll
window.addEventListener("scroll", function() {
  let windowTop = window.pageYOffset;
  if (windowTop > 100) {
    document.querySelector('.header').classList.add('mini');
  } else {
    document.querySelector('.header').classList.remove('mini');
  }
});

// Add a class if the scroll size is > 100 (on reboot)
if (window.pageYOffset > 100) {
  document.querySelector('.header').classList.add('mini');
} else {
  document.querySelector('.header').classList.remove('mini');
}