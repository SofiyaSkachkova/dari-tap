const bt2 = document.querySelector('.bt2');
const icon = document.getElementById('icon');

if (bt2 && icon) {
  bt2.onclick = () => {
    document.body.classList.toggle('dark-mode');
    icon.src = document.body.classList.contains('dark-mode') ? '/img/moon.webp' : '/img/sun.webp';
    localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
  };

  if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
    icon.src = '/img/moon.webp';
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const tooltip = document.createElement('div');
  tooltip.className = 'tooltip';
  document.body.appendChild(tooltip);

  const targets = document.querySelectorAll('[data-tooltip]');

  targets.forEach(target => {
    target.addEventListener('mouseenter', (e) => {
      tooltip.textContent = target.getAttribute('data-tooltip');
      tooltip.style.opacity = '1';
    });

    target.addEventListener('mouseleave', () => {
      tooltip.style.opacity = '0';
    });

    target.addEventListener('mousemove', (e) => {
      tooltip.style.top = `${e.clientY + 15}px`;
      tooltip.style.left = `${e.clientX + 15}px`;
    });
  });
});


document.addEventListener('DOMContentLoaded', () => {
  // ...твой tooltip-код тут

  const searchInput = document.getElementById('searchInput');
  const searchBtn = document.getElementById('searchBtn');
  const resultsDiv = document.getElementById('results');

  if (searchBtn && searchInput && resultsDiv) {
    searchBtn.addEventListener('click', () => {
      const query = searchInput.value.trim();

      if (!query) {
        resultsDiv.innerHTML = '<p>Введите запрос</p>';
        return;
      }

      fetch(`http://localhost/api/medicines?query=${encodeURIComponent(query)}`, {
        headers: {
          'Accept': 'application/json'
        }
      })
        .then(res => res.json())
        .then(data => {
          if (data.length === 0) {
            resultsDiv.innerHTML = '<p>Ничего не найдено</p>';
            return;
          }

          resultsDiv.innerHTML = data.map(med => `<p>${med.name}</p>`).join('');
        })
        .catch(err => {
          resultsDiv.innerHTML = '<p>Ошибка при загрузке данных</p>';
          console.error(err);
        });
    });
  }
});
