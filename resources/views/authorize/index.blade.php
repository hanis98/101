@component('layouts.page')
	@slot('card_header')
		Application Approval Management 
	@endslot
    @slot('card_body')
    	<div class="float-right">
    		{{ $applications->links() }}
    	</div>
		<table class="table table-sm table-hover">
			<tr>
				<th class="text-center">#</th>
				<th>Purpose</th>
				<th>Requestor</th>
				<th>Department</th>
				<th>Status</th>
				<th>Started At</th>
				<th>Ended At</th>
				<th>Actions</th>
			</tr>
			@foreach($applications as $key => $application)
				<tr>
					<td class="text-center">{{ ($key + 1) + ($applications->currentPage() - 1) * ($applications->perPage()) }}</td>
					<td>{{ $application->purpose }}</td>
					<td>{{ $application->user->name }}</td>
					<td>{{ $application->user->department->name }}</td>
					<td>
						@include('components.labels.status', ['status' => $application->status])
					</td>
					<td>{{ $application->started_at->format('l, d-m-Y H:i:s') }}</td>
					<td>{{ $application->ended_at->format('l, d-m-Y H:i:s') }}</td>
					<td>
						<a href="{{ route('authorize.edit', $application->id) }}" class="btn btn-primary btn-sm border-primary">Edit</a>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="float-right">
    		{{ $applications->links() }}
    	</div>
    @endslot
@endcomponent