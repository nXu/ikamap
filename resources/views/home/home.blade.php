@extends('master')

@section('content')
<div class="jumbotron">
	        	<h1>{{ Lang::get('welcome.title') }}</h1>
	        	<p>{{ Lang::get('welcome.intro') }}</p>
	        	<p>{{ Lang::get('welcome.limit') }}</p>
	        	<p>{{ Lang::get('welcome.start') }}</p>
	        	<p>{{ Lang::get('welcome.update') }}: {{ $update }}</p>
</div>
@overwrite