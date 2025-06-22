<header class="header">
  <h1>DÁRI-TAP</h1>
  <div class="poisk-lang">
    {{-- Форма поиска --}}
    <form action="{{ route('search') }}" method="GET" class="stroka-poiska">
      <input type="text" name="query" placeholder="Поиск лекарств" required>
      <button type="submit" class="bt1">
        <img src="{{ asset('img/poisk.webp') }}" alt="Поиск" loading="lazy">
      </button>
    </form>

    {{-- Кнопка смены темы --}}
    <button class="bt2">
      <img src="{{ asset('img/sun.webp') }}" id="icon" loading="lazy">
    </button>
  </div>
</header>
