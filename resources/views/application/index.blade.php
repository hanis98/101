@component('layouts.page')
	@slot('card_header')
		Application Management 
		<a href="{{ route('application.create') }}" class="btn btn-default border-primary float-right">Add New Application</a>
	@endslot
    @slot('card_body')
    	<div class="float-right">
    		{{ $applications->links() }}
    	</div>
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-center">#</th>
				<th>Purpose</th>
				<th>Status</th>
				<th>Started At</th>
				<th>Ended At</th>
				<th>Actions</th>
			</tr>
			@foreach($applications as $key => $application)
				<tr>
					<td class="text-center">{{ ($key + 1) + ($applications->currentPage() - 1) * ($applications->perPage()) }}</td>
					<td>{{ $application->purpose }}</td>
					<td>
						@include('components.labels.status', ['status' => $application->status])
					</td>
					<td>{{ $application->started_at->format('l, d-m-Y H:i:s') }}</td>
					<td>{{ $application->ended_at->format('l, d-m-Y H:i:s') }}</td>
					<td>
						<div class="btn-group">
							<a href="{{ route('application.show', $application->id) }}" class="btn btn-default btn-sm border-primary">Details</a>
							@if($application->status == \App\Models\Application::IN_PROGRESS)
								<a href="{{ route('application.edit', $application->id) }}" class="btn btn-primary btn-sm border-primary">Edit</a>
								@hasrole('admin')
									<div class="btn btn-danger btn-sm border-danger" 
										onclick="if(confirm('Are you sure want to delete this record?')) {
											document.getElementById('delete-application-{{ $application->id }}').submit();
										}">
										Delete
									</div>
									<form 
										id="delete-application-{{ $application->id }}" 
										method="POST" 
										action="{{ route('application.destroy', $application->id) }}">
										@csrf
										@method('DELETE')
									</form>
								@endrole
							@endif
						</div>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="float-right">
    		{{ $applications->links() }}
    	</div>
    @endslot
@endcomponent