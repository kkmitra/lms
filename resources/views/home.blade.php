@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page__header">Book Ordered</div>
    <ul class="list">
        @forelse($user_books as $book)
            <li class="list-item">
                <h1 class="list-item__title">
                    <a class="list-item__link"
                        href="{{ route('book', $book->id)}}">{{ $book->name }}</a>
                </h1>
                <p class="list-item__body">
                    {{ $book->synopsis }}
                </p>
                <p class="list-item__footer">{{ $book->author_name }}</p>
            </li>
        @empty
            <p>No orders yet...</p>
        @endforelse
    </ul>
    <h1 class="title">Popular Books</h1>
    <ul class="list">
        @forelse($popular_books as $book)
            <li class="list-item">
                <h1 class="list-item__title">
                    <a class="list-item__link"
                        href="{{ route('book', $book->id)}}">{{ $book->name }}</a>
                </h1>
                <p class="list-item__body">
                    {{ $book->synopsis }}
                </p>
                <p class="list-item__footer">{{ $book->author_name }}</p>
                <div>
                    <a class="button button--secondary" href="{{ route('order_book', $book->id) }}"
                        onclick="event.preventDefault();document.getElementById('order-book').submit();">
                        {{ __('Order Now') }}
                    </a>
                    <form id="order-book" action="{{ route('order_book', $book->id) }}"
                      method="POST" class="u-display-none;">
                      @csrf
                    </form>
                </div>
            </li>
        @empty
            <p>Nothing to show...</p>
        @endforelse
    </ul>
</div>
@endsection
