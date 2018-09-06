@component('layouts.page')
	@slot('card_header')
		Data Pekerja
		<a href="{{ route('user.create') }}" class="btn btn-default border-primary float-right">Tambah Pengguna</a>
	@endslot
    @slot('card_body')
    	<div class="float-right">
    		{{ $users->links() }}
    	</div>
		<table class="table table-sm table-hover table-dark">
			<tr>
				<th class="text-center">#</th>
				<th>Nama</th>
				<th>E-mail</th>
				<th>Action</th>
			</tr>
			@foreach($users as $key => $user)
				<tr>
					<td class="text-center">{{ ($key + 1) + ($users->currentPage() - 1) * ($users->perPage()) }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<div class="btn-group">
							<a href="{{ route('user.show', $user->id) }}" class="btn btn-default btn-sm border-primary">Butiran</a>
							<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm border-primary">Ubah</a>
							<div class="btn btn-danger btn-sm border-danger" 
								onclick="if(confirm('Are you sure want to delete this record?')) {
									document.getElementById('delete-user-{{ $user->id }}').submit();
								}">
								Padam
							</div>
							<form 
								id="delete-user-{{ $user->id }}" 
								method="POST" 
								action="{{ route('user.destroy', $user->id) }}">
								@csrf
								@method('DELETE')
							</form>
						</div>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="float-right">
    		{{ $users->links() }}
    	</div>
    @endslot
@endcomponent