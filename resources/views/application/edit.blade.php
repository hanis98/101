@component('layouts.page', ['card_header' => 'Edit Application'])
    @slot('card_body')
        <form id="update-application-form" action="{{ route('application.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="form-group row">
                <label for="purpose" class="col-md-4 col-form-label text-md-right">{{ __('Tujuan') }}</label>
                
                <div class="col-md-6">
                    <input id="purpose" type="text" class="form-control{{ $errors->has('purpose') ? ' is-invalid' : '' }}" 
                        name="purpose" value="{{ old('purpose', $application->purpose) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'purpose'])
                </div>
            </div>

            <div class="form-group row">
                <label for="usage" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                <div class="col-md-6">
                    <select name="usage" id="usage" 
                        class="form-control{{ $errors->has('usage') ? ' is-invalid' : '' }}"
                         required autofocus>
                        <option value="{{ \App\Models\Application::EXTERNAL }}" {{ $application->usage == \App\Models\Application::EXTERNAL ? 'selected' : '' }}>Luar</option>
                        <option value="{{ \App\Models\Application::INTERNAL }}" {{ $application->usage == \App\Models\Application::INTERNAL ? 'selected' : '' }}>Dalaman</option>
                    </select>

                    @include('components.forms.error', ['name' => 'usage'])
                </div>
            </div>

            <div class="form-group row">
                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Lokasi') }}</label>
                
                <div class="col-md-6">
                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" 
                        value="{{ old('location', $application->location) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'location'])
                </div>
            </div>

            <div class="form-group row">
                <label for="total_participants" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Peserta') }}</label>
                
                <div class="col-md-6">
                    <input id="total_participants" type="text" class="form-control{{ $errors->has('total_participants') ? ' is-invalid' : '' }}" name="total_participants" value="{{ old('total_participants', $application->total_participants) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'total_participants'])
                </div>
            </div>

            <div class="form-group row">
                <label for="started_at" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh Mula') }}</label>
                
                <div class="col-md-6">
                    <input id="started_at" type="datetime-local" class="form-control{{ $errors->has('started_at') ? ' is-invalid' : '' }}" 
                        min="{{ now()->addDays(3)->format('Y-m-d') }}T00:00"
                        name="started_at" value="{{ old('started_at', $application->started_at->format('Y-m-d\TH:i')) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'started_at'])
                </div>
            </div>

            <div class="form-group row">
                <label for="ended_at" class="col-md-4 col-form-label text-md-right">{{ __('Tarikh Tamat') }}</label>
                
                <div class="col-md-6">
                    <input id="ended_at" type="datetime-local" class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" 
                        min="{{ now()->addDays(3)->format('Y-m-d') }}T00:00"
                        name="ended_at" value="{{ old('ended_at', $application->ended_at->format('Y-m-d\TH:i')) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'ended_at'])
                </div>
            </div>

            <hr>
            
            @include('application.partials.peralatan')

        </form>
    @endslot
    @slot('card_footer')
        <a href="{{ route('application.index') }}" class="btn btn-default border-primary">Back</a>
        <div class="float-right">
            <div class="btn btn-primary" onclick="document.getElementById('update-application-form').submit()">Update</div>
        </div>
    @endslot
@endcomponent