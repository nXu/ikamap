<?php 
	use App\Libraries\SecureAssetLoader;
?>
@extends('master')

@section('content')
	<h1>{{ $player->name }}</h1>
	<p><strong>{{ Lang::get('player.name_history') }}:</strong> 
	@foreach($names as $name) 
		{{ $name->name }}; 
	@endforeach
	</p>
	<p><strong>{{ Lang::get('player.current_ally') }}:</strong> {{ $player->ally_tag }}</p>
	<p><strong>{{ Lang::get('player.ally_history') }}:</strong> 
	@foreach($allies as $ally) 
		{{ $ally->ally_tag }}; 
	@endforeach
	</p>

	<h2>{{ count($player->cities) }} {{ Lang::choice('player.cities', count($player->cities)) }}</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					{{ Lang::get('player.city_name') }}
				</th>
				<th>
					{{ Lang::get('player.coordinates') }}
				</th>
				<th>
					{{ Lang::get('player.level') }}
				</th>
				<th>
					{{ Lang::get('player.resource') }}
				</th>
				<th>
					{{ Lang::get('player.wonder') }}
				</th>
				<th>
					{{ Lang::get('player.fortress') }}
				</th>
				<th>
					{{ Lang::get('player.link') }}
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($player->cities as $city)
			<tr>
				<td>
					{{ $city->name}}
				</td>
				<td>
					[{{ $city->island->x_coord }}:{{ $city->island->y_coord }}]
				</td>
				<td>
					{{ $city->town_size }}
				</td>
				<td>
					<img src="{{ SecureAssetLoader::SecureAsset('img/res_' . $city->island->resource . '.gif') }}" alt="Resource" class="img-icon" />
				</td>
				<td>
					<img src="{{ SecureAssetLoader::SecureAsset('img/wonder_' . $city->island->wonder . '.gif') }}" alt="wonder" class="img-icon" />
				</td>
				<td>
					@if($city->has_fortress)
						<i class="fa fa-fw fa-check"></i>
					@else
						<i class="fa fa-fw fa-times"></i>
					@endif
				</td>
				<td>
					<a href="http://s14-us.ikariam.gameforge.com/index.php?view=island&islandId={{ $city->island->id }}&selectCity={{ $city->id }}" target="_blank">{{ Lang::get('player.open') }}</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@overwrite