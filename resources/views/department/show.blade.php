@component('layouts.page', ['card_header' => 'Department'])
    @slot('card_body')
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-right">Nama</th>
				<td>{{ $department->name }}</td>
			</tr>
			<tr>
				<th class="text-right">Code</th>
				<td>{{ $department->code }}</td>
			</tr>
			
		</table>
		<a href="{{ route('department.index') }}" class="btn btn-default border-primary">Kembali</a>
    @endslot
@endcomponent