@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="book__title">{{ $book->name }}</h1>
  <div class="book__author-name">written by {{ $book->author_name }}</div>

  <div class="book__body">
    {{ $book->synopsis }}
  </div>

  <div class="body__footer">
    <p>Quantity left: {{ $book->quantity }}</p>
    <a class="button button--secondary" href="{{ route('order_book', $book->id) }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      {{ __('Order Now') }}
    </a>
    <form id="logout-form" action="{{ route('order_book', $book->id) }}"
      method="POST" class="u-display-none">
      @csrf
    </form>
  </div>
</div>
@endsection
