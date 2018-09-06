@component('layouts.page', ['card_header' => 'Tambah Peralatan'])
    @slot('card_body')
        <form method="POST" action="{{ route('peralatan.store') }}" aria-label="{{ __('Tambah Peralatan') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Peralatan') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Nama Peralatan" value="{{ old('name') }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('No. Siri Peralatan') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required>

                    @include('components.forms.error', ['name' => 'code'])
                </div>
            </div>

            <div class="form-group row">
                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Kuantiti') }}</label>

                <div class="col-md-6">
                    <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required>

                    @include('components.forms.error', ['name' => 'quantity'])
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Tambah Peralatan') }}
                    </button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent