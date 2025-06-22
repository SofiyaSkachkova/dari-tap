@extends('layouts.app')

@section('title', $category->name . ' | DÁRI-TAP')

@section('content')
    <h2 style="text-align: center;">{{ $category->name }}</h2>

    <section>
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
    </section>
@endsection

@push('scripts')
  <script src="{{ asset('catalog.js') }}"></script>
@endpush
