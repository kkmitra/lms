@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $book->name }}</h1>
  <p>written by {{ $book->author_name }}</p>
</div>
@endsection
