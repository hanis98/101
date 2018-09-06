@if ($errors->has($name))
    <span class="badge badge-danger" role="alert">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
@endif