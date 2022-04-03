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

<body class="bg-cgrey-100">
	<div id="app">
		<nav class="bg-white">
			<div class="container mx-auto">
				<div class="flex justify-between items-center py-2">

					<!-- Left Side Of Navbar -->
					<h1>
						<a class="navbar-brand" href="{{ url('/projects') }}">
							<img src="/images/logo.svg" alt="birdboard">
						</a>
					</h1>

					<!-- Right Side Of Navbar -->
					<div>
						<div class="flex items-center ml-auto">
							<!-- Authentication Links -->
							@guest
								@if (Route::has('login'))
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								@endif

								@if (Route::has('register'))
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								@endif
							@else
								<theme-switcher></theme-switcher>
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							@endguest
							</div>
					</div>

				</div>
			</div>
		</nav>

		<main class="container mx-auto py-4">
			@yield('content')
		</main>
	</div>
</body>
</html>
