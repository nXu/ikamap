@extends('master')

@section('content')
<h1>{{ $ally }}</h1>
<p>{{ $players->count() }} {{ Lang::choice('ally.players', $players->count())}}</p>

<table class="table table-hover">
		<thead>
			<tr>
				<th>
					{{ Lang::get('ally.member_name') }}
				</th>
				<th>
					{{ Lang::get('ally.cities') }}
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($players as $player)
			<tr>
				<td>{{ $player->name }}</td>
				<td>{{ $player->cities->count() }}</td>
				<td>
					<a class="btn btn-primary" href="/player/{{ $player->name }}">
						<i class="fa fa-fw fa-external-link"></i> {{ Lang::get('ally.show') }}
					</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@overwrite