@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a book</h1>
  <form action="{{ route('store_book') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Book name</label>
      <input type="text" id="name" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label for="author_name">Author name</label>
      <input type="text" id="author_name" class="form-control" name="author_name">
    </div>
    <input type="submit" value="Create" class="btn btn-primary">
  </form>
</div>
@endsection
