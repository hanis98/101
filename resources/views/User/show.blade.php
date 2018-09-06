@component('layouts.page', ['card_header' => 'User Management'])
    @slot('card_body')
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-right">Name</th>
				<td>{{ $user->name }}</td>
			</tr>
			<tr>
				<th class="text-right">No. MyKad</th>
				<td>{{ $user->ic }}</td>
			</tr>
			<tr>
				<th class="text-right">E-mail</th>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<th class="text-right">Jabatan</th>
				<td>{{ $user->department->name }}</td>
			</tr>
			<tr>
				<th class="text-right">Jawatan</th>
				<td>{{ $user->jawatan }}</td>
			</tr>
			<tr>
				<th class="text-right">Role</th>
				<td>{{ $user->getRoleNames()->implode(' | ') }}</td>
			</tr>
			<tr>
				<th class="text-right">Permissions</th>
				<td>
					Can Approve - @include('components.labels.yes-no', ['yes' => $user->hasPermissionTo('can approve')])<br>
					Can Authorize - @include('components.labels.yes-no', ['yes' => $user->hasPermissionTo('can authorize')])<br>
				</td>
			</tr>
		</table>
		
    @endslot
    @slot('card_footer')
		<a href="{{ route('user.index') }}" class="btn btn-default border-primary">Back</a>

		<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary float-right">Edit</a>
    @endslot
@endcomponent