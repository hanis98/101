@component('layouts.page', ['card_header' => 'Peralatan'])
    @slot('card_body')
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-right">Nama Peralatan</th>
				<td>{{ $peralatan->name }}</td>
			</tr>
			<tr>
				<th class="text-right">No. Siri Barang</th>
				<td>{{ $peralatan->code }}</td>
			</tr>
			<tr>
				<th class="text-right">Kuantiti</th>
				<td>{{ $peralatan->quantity }}</td>
			</tr>
			
		</table>
		<a href="{{ route('peralatan.index') }}" class="btn btn-default border-primary">Kembali</a>
    @endslot
@endcomponent