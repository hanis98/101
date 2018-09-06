<h5>Authorize</h5>

<div class="form-group row">
    <label for="authorized_remarks" class="col-md-2 col-form-label text-md-right">{{ __('Ulasan') }}</label>
    
    <div class="col-md-10">
        <textarea 
            class="form-control {{ $errors->has('authorized_remarks') ? ' is-invalid' : '' }}"
            name="authorized_remarks" id="authorized_remarks" 
            required
            cols="30" rows="10">{{ old('authorized_remarks', $application->authorized_remarks) }}</textarea>
        
        @include('components.forms.error', ['name' => 'authorized_remarks'])
    </div>
</div>

<div class="form-group row">
    <label for="is_authorized" class="col-md-2 col-form-label text-md-right">{{ __('Status Permohonan') }}</label>
    
    <div class="col-md-2">
        <select name="is_authorized" id="is_authorized" 
            class="form-control{{ $errors->has('is_authorized') ? ' is-invalid' : '' }}"
             required autofocus>
            <option value="1" {{ ($application->is_authorized) ? 'selected' : '' }}>Lulus</option>
            <option value="0" {{ (!$application->is_authorized) ? 'selected' : '' }}>Ditolak</option>
        </select>

        @include('components.forms.error', ['name' => 'is_authorized'])
    </div>
</div>