<h5>Peralatan</h5>


<div class="row">
	@foreach($peralatans as $peralatan)
	    <div class="col-4">
	    	<div class="form-group row">
		        <label for="peralatan" class="col-md-6 col-form-label text-md-right">{{ $peralatan->name }}</label>
		        
		        <div class="col-md-4">
		            <input type="number" 
		            	class="form-control" 
		            	@if(isset($disabled) && $disabled)
							disabled readonly 
		            	@endif

		            	@isset($application_peralatan)
		            	value="{{ 
		            		$application_peralatan->contains('peralatan_id', $peralatan->id) ? 
		            			data_get($application_peralatan->where('peralatan_id', $peralatan->id)->first(), 'quantity') : 0
		            	}}" 
		            	@endisset
		            	name="peralatan[{{ $peralatan->id }}]">
					
		            @include('components.forms.error', ['name' => 'peralatan'])
		        </div>
		    </div>
	    </div>
	@endforeach
</div>