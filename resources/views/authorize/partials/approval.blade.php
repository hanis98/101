<h5>Kelulusan</h5>

<div class="form-group row">
    <label for="approved_remarks" class="col-md-2 col-form-label text-md-right">{{ __('Ulasan Kelulusan') }}</label>
    
    <div class="col-md-10">
        <p class="alert alert-info">{{ $application->approved_remarks }}</p>
    </div>
</div>

<div class="form-group row">
    <label for="is_approved" class="col-md-2 col-form-label text-md-right">{{ __('Status Permohonan') }}</label>
    
    <div class="col-md-2">
        <span class="p-3 badge badge-{{ ($application->is_approved) ? 'success' : 'danger' }}">
            {{ ($application->is_approved) ? 'Diluluskan' : 'Ditolak' }}
        </span>

        @include('components.forms.error', ['name' => 'is_approved'])
    </div>
</div>