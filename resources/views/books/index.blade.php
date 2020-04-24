@extends('layouts.app')

@section('content')
<div class="container">
  <h1>List of books</h1>
  <ul class="list-group mb-2">
    @foreach($books as $book)
      <li class="list-group-item">
        <h1>
          <a href="{{ route('book', $book->id)}}">{{ $book->name }}</a>
        </h1>
        <form action="{{ route('order_book', $book->id) }}" method="post" class="form-inline">
          @csrf
          <label for="" class="mr-3">Quantity left {{ $book->quantity }}</label>
          <input type="submit" value="Order Now" class="btn btn-primary">
        </form>
      </li>
    @endforeach
  </ul>

  <a href="{{ route('create_book') }}" class="btn btn-info">Create Book</a>
</div>
@endsection
