<h5>Kelulusan</h5>

<div class="form-group row">
    <label for="approved_remarks" class="col-md-2 col-form-label text-md-right">{{ __('Ulasan Kelulusan') }}</label>
    
    <div class="col-md-10">
    	<textarea 
    		class="form-control {{ $errors->has('approved_remarks') ? ' is-invalid' : '' }}"
    		name="approved_remarks" id="approved_remarks" 
    		required
    		cols="30" rows="10">{{ old('approved_remarks', $application->approved_remarks) }}</textarea>
        
        @include('components.forms.error', ['name' => 'approved_remarks'])
    </div>
</div>

<div class="form-group row">
    <label for="is_approved" class="col-md-2 col-form-label text-md-right">{{ __('Status Permohonan') }}</label>
    
    <div class="col-md-2">
        <select name="is_approved" id="is_approved" 
            class="form-control{{ $errors->has('is_approved') ? ' is-invalid' : '' }}"
             required autofocus>
            <option value="1" {{ ($application->is_approved) ? 'selected' : '' }}>Lulus</option>
            <option value="0" {{ (!$application->is_approved) ? 'selected' : '' }}>Ditolak</option>
        </select>

        @include('components.forms.error', ['name' => 'is_approved'])
    </div>
</div>