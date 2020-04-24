@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $book->name }}</h1>
  <small>written by {{ $book->author_name }}</small>

  <p>
    {{ $book->synopsis }}
  </p>

  <p>Quantity left: {{ $book->quantity }}</p>
</div>
@endsection
