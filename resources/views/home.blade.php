@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<section class="section">
  <div class="block1">
    <p class="Zagolovok">Поиск лекарств быстро и удобно</p>

    <div class="foto-podzag">
      <img src="{{ asset('img/podzagolovok.webp') }}" loading="lazy">
      <p class="Podzagolovok">Найдите нужный препарат по названию или в каталоге</p>
    </div>

    <div class="katalog">
      @foreach ([
        ['allergiya', 'Аллергия'],
        ['antibiotiki', 'Антибиотики'],
        ['vitaminy', 'Витамины'],
        ['vich', 'ВИЧ'],
        ['glaza', 'Глаза'],
        ['dermatologiya', 'Дерматология'],
        ['diabet', 'Диабет'],
        ['dyhatelnaya', 'Дыхательная система'],
        ['zhenskoe-zdorovie', 'Женское здоровье'],
        ['immunopreparaty', 'Иммунопрепараты'],
        ['krov', 'Кровь'],
        ['lor', 'ЛОР'],
        ['muzhskoe-zdorovie', 'Мужское здоровье'],
        ['nervnaya', 'Нервная система'],
        ['onkologiya', 'Онкология'],
        ['ods', 'ОДС'],
        ['pishchevaritelnaya', 'Пищеварительная система'],
        ['prostuda', 'Простуда и грипп'],
        ['virus', 'Противовирусные'],
        ['sss', 'ССС'],
        ['endokrinnaya', 'Эндокринная система']
      ] as $item)
        <a href="{{ route('categories.show', $item[0]) }}" class="category-item" data-tooltip="{{ $item[1] }}">
          <img src="{{ asset('img/' . $item[0] . '.webp') }}" loading="lazy">
          <p>{{ $item[1] }}</p>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
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

        fetch(`{{ url('/api/medicines') }}?query=${encodeURIComponent(query)}`, {
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
</script>
@endpush
