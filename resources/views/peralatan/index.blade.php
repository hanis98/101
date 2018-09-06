@component('layouts.page')
		@slot('card_header')
			Senarai Peralatan
		<a href="{{ route('peralatan.create') }}" class="btn btn-default border-primary float-right">Tambah Peralatan</a>
	@endslot
    @slot('card_body')
    	<div class="float-right">
    		{{ $peralatans->links() }}
    	</div>
		<table class="table table-sm table-hover table-dark">
			<tr>
				<th class="text-center">#</th>
				<th>Nama</th>
				<th>Code</th>
				<th>Kuantiti</th>
				<th>Action</th>
			</tr>
			@foreach($peralatans as $key => $peralatan)
				<tr>
					<td class="text-center">{{ ($key + 1) + ($peralatans->currentPage() - 1) * ($peralatans->perPage()) }}</td>
					<td>{{ $peralatan->name }}</td>
					<td>{{ $peralatan->code }}</td>
					<td>{{ $peralatan->quantity }}</td>
					<td>
						<div class="btn-group">
							<a href="{{ route('peralatan.show', $peralatan->id) }}" class="btn btn-default btn-sm border-primary">Butiran</a>
							<a href="{{ route('peralatan.edit', $peralatan->id) }}" class="btn btn-primary btn-sm border-primary">Ubah</a>
							<div class="btn btn-danger btn-sm border-danger" 
								onclick="if(confirm('Are you sure want to delete this record?')) {
									document.getElementById('delete-peralatan-{{ $peralatan->id }}').submit();
								}">
								Padam
							</div>
							<form 
								id="delete-peralatan-{{ $peralatan->id }}" 
								method="POST" 
								action="{{ route('peralatan.destroy', $peralatan->id) }}">
								@csrf
								@method('DELETE')
							</form>
						</div>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="float-right">
    		{{ $peralatans->links() }}
    	</div>
    @endslot
@endcomponent