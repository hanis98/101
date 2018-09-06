<span class="badge badge-{{ $status == 1 ? 'warning' : ($status == 2 ? 'success' : 'danger') }}">
	{{ $status == 1 ? 'In Progress' : ($status == 2 ? 'Success' : 'Rejected') }}
</span>