const themeToggleBtn = document.querySelector('.bt1');
const themeIcon = document.getElementById('icon');

themeToggleBtn.onclick = () => {
  document.body.classList.toggle('dark-mode');
  if (document.body.classList.contains('dark-mode')) {
    themeIcon.src = '/img/moon.webp';
    localStorage.setItem('theme', 'dark');
  } else {
    themeIcon.src = '/img/sun.webp';
    localStorage.setItem('theme', 'light');
  }
};

window.onload = () => {
  if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
    themeIcon.src = '/img/moon.webp';
  } else {
    themeIcon.src = '/img/sun.webp';
  }
};
