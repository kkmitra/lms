<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
			<header class="main__navigation">
				<div class="container">

					<div class="main__navigation__logo">
						<a href="/">
							<!-- lms -->
							<img src="{{ asset('images/logo.png') }}" alt="" class="image">
						</a>
					</div>

					<input type="checkbox" id="navbar-toggle-checkbox" class="navbar-toggle-checkbox">
					<label for="navbar-toggle-checkbox" class="navbar-toggle-label">
						<span></span>
					</label>

					<ul class="menu">
						@guest
							<li class="menu__item">
								<a href="{{ route('login') }}" class="menu__link {{ Route::currentRouteName() === 'login' ? 'active' : '' }}">{{ __('Login') }}</a>
							</li>
						@else
							<li class="menu__item">
								<a href="{{ route('books') }}" class="menu__link {{ Route::currentRouteName() === 'books' ? 'active' : ''}}">Show Books</a>
							</li>
							@if(!Auth::user()->hasRole(\App\Role\UserRole::ROLE_CUSTOMER))
								<li class="menu__item">
									<a href="{{ route('create_book') }}"
										class="menu__link {{ Route::currentRouteName() === 'create_book' ? 'active' : '' }}">Add
										Books</a>
								</li>
								@if (Route::has('register'))
								<li class="menu__item">
									<a class="menu__link {{ Route::currentRouteName() === 'register' ? 'active' : '' }}"
										href="{{ route('register') }}">{{ __('Add User') }}</a>
								</li>
								@endif
							@endif
							<li class="menu__item">
								<a class="menu__link menu__link--danger" href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						@endguest
					</ul>
				</div>
			</header>
        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
