@component('layouts.page', ['card_header' => 'Peralatan'])
    @slot('card_body')
        <form id="update-peralatan-form" action="{{ route('peralatan.update', $peralatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Peralatan') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $peralatan->name) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('No Siri Peralatan') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $peralatan->code) }}" required>

                    @include('components.forms.error', ['name' => 'code'])
                </div>
            </div>

            <div class="form-group row">
                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('quantity') }}</label>

                <div class="col-md-6">
                    <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity', $peralatan->quantity) }}" required>

                    @include('components.forms.error', ['name' => 'quantity'])
                </div>
            </div>

        </form>
    @endslot
    @slot('card_footer')
        <a href="{{ route('peralatan.index') }}" class="btn btn-default border-primary">Kembali</a>
        <div class="float-right">
            <div class="btn btn-primary" onclick="document.getElementById('update-peralatan-form').submit()">OK</div>
        </div>
    @endslot
@endcomponent