@extends('layouts.app')

@section('content')
<div class="container">
  <h1>List of books</h1>
  <ul class="list-group mb-2">
    @foreach($books as $book)
      <li class="list-group-item">
        <a href="{{ route('book', $book->id)}}">{{ $book->name }}</a>
      </li>
    @endforeach
  </ul>

  <a href="{{ route('create_book') }}" class="btn btn-primary">Create Book</a>
</div>
@endsection
