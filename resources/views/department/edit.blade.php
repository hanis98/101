@component('layouts.page', ['card_header' => 'Department'])
    @slot('card_body')
        <form id="update-department-form" action="{{ route('department.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $department->name) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $department->code) }}" required>

                    @include('components.forms.error', ['name' => 'code'])
                </div>
            </div>

        </form>
    @endslot
    @slot('card_footer')
        <a href="{{ route('department.index') }}" class="btn btn-default border-primary">Kembali</a>
        <div class="float-right">
            <div class="btn btn-primary" onclick="document.getElementById('update-department-form').submit()">OK</div>
        </div>
    @endslot
@endcomponent