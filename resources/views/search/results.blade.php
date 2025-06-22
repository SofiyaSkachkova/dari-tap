@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('content')
    <h2>Результаты поиска по запросу: "{{ $query }}"</h2>

    @if ($medicines->count() > 0)
        <div class="medicine-grid">
            @foreach ($medicines as $medicine)
                <div class="medicine-card">
                    <img src="{{ asset('img/' . $medicine->image) }}" alt="{{ $medicine->name }}">
                    <h3>{{ $medicine->name }}</h3>
                    <p>
                        @if ($medicine->price)
                            Цена: {{ $medicine->price }} ₸
                        @else
                            Нет в наличии
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p>Ничего не найдено.</p>
    @endif
@endsection
