document.addEventListener('DOMContentLoaded', () => {
  const icon = document.getElementById('icon');
  const bt2 = document.querySelector('.bt2');

  if (icon && bt2) {
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark-mode');
      icon.src = '/img/moon.webp';
    } else {
      icon.src = '/img/sun.webp';
    }

    bt2.onclick = () => {
      const isDark = document.body.classList.toggle('dark-mode');
      icon.src = isDark ? '/img/moon.webp' : '/img/sun.webp';
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    };
  }
});
