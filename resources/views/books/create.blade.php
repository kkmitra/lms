

@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a book</h1>
  <form action="{{ route('store_book') }}" method="post" class="form">
    @csrf
    <div class="form__group">
      <label class="form__label" for="name">Book name</label>
      <input type="text" id="name" class="form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Book name">
      @error('name')
        <div class="error-message">{{ $message }}</div>
      @enderror
    </div>
    <div class="form__group">
      <label class="form__label" for="author_name">Author name</label>
      <input type="text" id="author_name" class="form__input @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" placeholder="Book author">
      @error('author_name')
        <div class="error-message">{{ $message }}</div>
      @enderror
    </div>
    <div class="form__group">
      <label class="form__label" for="quantity">Quantity</label>
      <input type="text" id="quantity" class="form__input @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Quantity">
      @error('quantity')
        <div class="error-message">{{ $message }}</div>
      @enderror
    </div>
    <div class="form__group">
      <label class="form__label" for="synopsis">Synopsis</label>
      <textarea id="synopsis" class="form__input @error('synopsis') is-invalid @enderror" name="synopsis" rows="5" placeholder="Synopsis">{{ old('synopsis') }}</textarea>
      @error('synopsis')
        <div class="error-message">{{ $message }}</div>
      @enderror
    </div>
    <input type="submit" value="Create" class="button button--primary">
  </form>
</div>
@endsection
