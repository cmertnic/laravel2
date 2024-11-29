@extends('layouts.main')

@section('content') 
<div class="cards">
        @foreach($array as $item)
                <div class="card">
                    <img src="{{ asset($item['path']) }}" class="card_img_top" alt="{{ $item['title'] }}">
                    <div class="card_body">
                        <h2 class="card_title">{{ $item['title'] }}</h2>
                        <p class="card_text">Цена: {{ $item['price'] }} ₽</p>
                    </div>
                </div>
             <img src="" alt="">
        @endforeach
    </div>        
    @endsection