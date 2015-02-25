<?php
	// Use custom libraries
	use App\Libraries\SecureAssetLoader;
	use App\Libraries\LocalizationHelper;

	// Get the languages
	$languages = LocalizationHelper::getLanguages();
?>

<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
	<head>
		<title>IkaMapper by nXu</title>

		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<!-- Bootstrap typeahead -->
		<script src="{{ SecureAssetLoader::SecureAsset('resources/bootstrap-typeahead.min.js') }}"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Site CSS -->
		<link rel="stylesheet" href="{{ SecureAssetLoader::SecureAsset('css/style.css') }}">

		<!-- Quicksearch -->
		<script src="{{ SecureAssetLoader::SecureAsset('js/SearchSuggestion.js') }}"></script>
		<script src="{{ SecureAssetLoader::SecureAsset('js/QuickSearch.js') }}"></script>

		@yield('scripts')
	</head>

	<body>
		<!-- Fixed navbar -->
	    <nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">{{ Lang::get('menu.toggle_nav') }}</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/"><i class="fa fa-fw fa-compass"></i> IkaMapper</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="/players/">{{ Lang::get('menu.player') }}</a></li>
	            <li><a href="/allies/">{{ Lang::get('menu.alliance') }}</a></li>
	            <li><a href="/islands/">{{ Lang::get('menu.island') }}</a></li>
	            
	          </ul>
	          <form class="navbar-form navbar-right" role="search" id="quicksearch-form">
			  	<div class="form-group">
			    	<input type="text" id="quicksearch" class="form-control" autocomplete="off" placeholder="{{ Lang::get('menu.quick_search') }}">
			  	</div>
			  	<button type="submit" class="btn btn-default"><i class="fa fa-fw fa-search"></i></button>
			  </form>
			  <ul class="nav navbar-nav navbar-right">
				  	<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('menu.language') }} <span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		              	@foreach ($languages as $code => $name)
		              		<li><a href="?language={{ $code }}">{{ $name }}</a></li>
		              	@endforeach
		              </ul>
		            </li>
			  	</ul>
	        </div>
	      </div>
	    </nav>

	   	<div class="container content">
	   		@yield('content')
      		
    	</div> <!-- /container -->

	</body>
</html>