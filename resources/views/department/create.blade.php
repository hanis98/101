@component('layouts.page', ['card_header' => 'Add New Department'])
    @slot('card_body')
        <form method="POST" action="{{ route('department.store') }}" aria-label="{{ __('Add New Department') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('CODE') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required>

                    @include('components.forms.error', ['name' => 'code'])
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add New Department') }}
                    </button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent