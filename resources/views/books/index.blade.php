@extends('layouts.app')

@section('content')
<div class="container">
  <div class="page__header">List of books</div>
  <ul class="list">
    @foreach($books as $book)
      <li class="list-item">
        <h1 class="list-item__title">
          <a class="list-item__link" href="{{ route('book', $book->id)}}">{{ $book->name }}</a>
        </h1>
        <div class="list-item__body">
          <p>Quantity left {{ $book->quantity }}</p>
          <a class="button button--secondary" href="{{ route('order_book', $book->id) }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Order Now') }}
          </a>
        </div>

        <form id="logout-form" action="{{ route('order_book', $book->id) }}" method="POST" class="u-display-none;">
          @csrf
        </form>
      </li>
    @endforeach
  </ul>
</div>
@endsection
