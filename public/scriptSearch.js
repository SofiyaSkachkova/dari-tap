async function searchMedicines(query) {
  const response = await fetch(`/api/medicines?query=${encodeURIComponent(query)}`);
  const data = await response.json();

  const resultsContainer = document.getElementById('results');
  resultsContainer.innerHTML = '';

  if (data.length === 0) {
    resultsContainer.innerHTML = '<p>Ничего не найдено.</p>';
    return;
  }

  data.forEach(med => {
    const div = document.createElement('div');
    div.classList.add('medicine-card');
    div.innerHTML = `
      <img src="/img/${med.image}" alt="${med.name}">
      <h3>${med.name}</h3>
      <p>${med.price ? 'Цена: ' + med.price + ' ₸' : 'Нет в наличии'}</p>
    `;
    resultsContainer.appendChild(div);
  });
}
