<?php
	// Use custom libraries
	use App\Libraries\SecureAssetLoader;
?>

@extends('master')

@section('content')

	<h1>{{ Lang::get($singular . '.search') }}</h1>
	<form class="form" id="search">
		<div class="form-group row">
			<div class="col-xs-12 col-md-10">
				<input type="text" class="form-control" id="name" placeholder="{{ Lang::get($singular . '.name') }}">	
			</div>
			<div class="col-xs-12 col-md-2"> 
				<button type="submit" class="btn btn-primary full-width">
						<i class="fa fa-fw fa-search"></i> {{ Lang::get('menu.search') }} 
				</button>
			</div>
		</div>
	</form>

@overwrite

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			// Activate typeahead
			searchSuggestion.init("#name", "/{{ $plural }}/search", "name", '#search', "/{{ $singular }}/");
		});
	</script>
@overwrite