@component('layouts.page', ['card_header' => 'User Management'])
    @slot('card_body')
        <form id="update-user-form" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="ic" class="col-md-4 col-form-label text-md-right">{{ __('No. MyKad') }}</label>

                <div class="col-md-6">
                    <input id="ic" type="text" class="form-control{{ $errors->has('ic') ? ' is-invalid' : '' }}" name="ic" value="{{ old('ic', $user->ic) }}" required>

                    @include('components.forms.error', ['name' => 'ic'])
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>

                <div class="col-md-6">
                    <select name="department_id" id="department_id" 
                        required
                        class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $department->id == $user->department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>

                    @include('components.forms.error', ['name' => 'department_id'])
                </div>
            </div>

            <div class="form-group row">
                <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                <div class="col-md-6">
                    <select name="role" id="role" 
                        required
                        class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                            <option value="0">-- Tiada --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" 
                                {{ (optional($user_role)->id == $role->id) ? 'selected' : '' }}>
                                    {{ title_case($role->name) }}
                            </option>
                        @endforeach
                    </select>
                    @include('components.forms.error', ['name' => 'role'])
                </div>
            </div>

            <div class="form-group row">
                <label for="can_authorize" class="col-md-4 col-form-label text-md-right">{{ __('Permission') }}</label>

                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input name="can_approve" type="checkbox" {{ $user->hasPermissionTo('can approve') ? 'checked' : '' }} class="form-check-input">
                                {{ __('Can Approve') }}
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input name="can_authorize" type="checkbox" {{ $user->hasPermissionTo('can authorize') ? 'checked' : '' }} class="form-check-input">
                                {{ __('Can Authorize') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="jawatan" class="col-md-4 col-form-label text-md-right">{{ __('Jawatan') }}</label>

                <div class="col-md-6">
                    <input id="jawatan" type="text" class="form-control{{ $errors->has('jawatan') ? ' is-invalid' : '' }}" name="jawatan" value="{{ old('jawatan', $user->jawatan) }}" required>

                    @include('components.forms.error', ['name' => 'jawatan'])
                </div>
            </div>

        </form>
    @endslot
    @slot('card_footer')
        <a href="{{ route('user.index') }}" class="btn btn-default border-primary">Back</a>
        <div class="float-right">
            <div class="btn btn-primary" onclick="document.getElementById('update-user-form').submit()">Update</div>
        </div>
    @endslot
@endcomponent