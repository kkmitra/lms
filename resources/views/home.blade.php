@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Book Ordered</h1>
    <ul class="list">
        <li class="list-item">
            <h1 class="list-item__title">
                <a href="#" class="list-item__link">Book name</a>
            </h1>
            <p class="list-item__body">
                Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Consectetur mollitia aut et? Nobis, enim totam!...
            </p>
            <p class="list-item__footer">Authored by John Doe</p>
        </li>
        <li class="list-item">
            <h1 class="list-item__title">
                <a class="list-item__link" href="#" >Book name</a>
            </h1>
            <p class="list-item__body">
                Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Consectetur mollitia aut et? Nobis, enim totam!...
            </p>
            <p class="list-item__footer">Authored by John Doe</p>
        </li>
    </ul>
    <h1 class="title">Popular Books</h1>
    <ul class="list">
        <li class="list-item">
            <h1 class="list-item__title">
                <a href="#" class="list-item__link">Book name</a>
            </h1>
            <p class="list-item__body">
                Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Consectetur mollitia aut et? Nobis, enim totam!...
            </p>
            <p class="list-item__footer">Authored by John Doe</p>
            <button class="button button--secondary">Order Now</button>
        </li>
        <li class="list-item">
            <h1 class="list-item__title">
                <a href="#" class="list-item__link">Book name</a>
            </h1>
            <p class="list-item__body">
                Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Consectetur mollitia aut et? Nobis, enim totam!...
            </p>
            <p class="list-item__footer">Authored by John Doe</p>
            <button class="button button--secondary">Order Now</button>
        </li>
    </ul>
</div>
@endsection
