@component('layouts.page')
	@slot('card_header')
		Department Management 
		<a href="{{ route('department.create') }}" class="btn btn-default border-primary float-right">Add New Department</a>
	@endslot
    @slot('card_body')
    	<div class="float-right">
    		{{ $departments->links() }}
    	</div>
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-center">#</th>
				<th>Name</th>
				<th>Code</th>
				<th>Actions</th>
			</tr>
			@foreach($departments as $key => $department)
				<tr>
					<td class="text-center">{{ ($key + 1) + ($departments->currentPage() - 1) * ($departments->perPage()) }}</td>
					<td>{{ $department->name }}</td>
					<td><pre>{{ $department->code }}</pre></td>
					<td>
						<div class="btn-group">
							<a href="{{ route('department.show', $department->id) }}" class="btn btn-default btn-sm border-primary">Details</a>
							<a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary btn-sm border-primary">Edit</a>
							<div class="btn btn-danger btn-sm border-danger" 
								onclick="if(confirm('Are you sure want to delete this record?')) {
									document.getElementById('delete-department-{{ $department->id }}').submit();
								}">
								Delete
							</div>
							<form 
								id="delete-department-{{ $department->id }}" 
								method="POST" 
								action="{{ route('department.destroy', $department->id) }}">
								@csrf
								@method('DELETE')
							</form>
						</div>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="float-right">
    		{{ $departments->links() }}
    	</div>
    @endslot
@endcomponent