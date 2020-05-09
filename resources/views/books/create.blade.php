@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a book</h1>
  <form action="{{ route('store_book') }}" method="post" class="form">
    @csrf
    <div class="form__group">
      <label class="form__label" for="name">Book name</label>
      <input type="text" id="name" class="form__input" name="name" placeholder="Book name">
    </div>
    <div class="form__group">
      <label class="form__label" for="author_name">Author name</label>
      <input type="text" id="author_name" class="form__input" name="author_name" placeholder="Book author">
    </div>
    <div class="form__group">
      <label class="form__label" for="quantity">Quantity</label>
      <input type="text" id="quantity" class="form__input" name="quantity" placeholder="Quantity">
    </div>
    <div class="form__group">
      <label class="form__label" for="synopsis">Synopsis</label>
      <textarea id="synopsis" class="form__input" name="synopsis" rows="5" placeholder="Synopsis"></textarea>
    </div>
    <input type="submit" value="Create" class="button button--primary">
  </form>
</div>
@endsection
