@component('layouts.page', ['card_header' => 'Add New User'])
    @slot('card_body')
        <form method="POST" action="{{ route('user.store') }}" aria-label="{{ __('Add New User') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @include('components.forms.error', ['name' => 'name'])
                </div>
            </div>

            <div class="form-group row">
                <label for="ic" class="col-md-4 col-form-label text-md-right">{{ __('No. MyKad') }}</label>

                <div class="col-md-6">
                    <input id="ic" type="text" class="form-control{{ $errors->has('ic') ? ' is-invalid' : '' }}" name="ic" value="{{ old('ic') }}" required>

                    @include('components.forms.error', ['name' => 'ic'])
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @include('components.forms.error', ['name' => 'email'])
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>

                <div class="col-md-6">
                    <select name="department_id" id="department_id" 
                        required
                        class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}">
                            <option value="0" selected>-- Tiada --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ title_case($role->name) }}</option>
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
                          <input name="can_approve" type="checkbox" class="form-check-input">
                                {{ __('Can Approve') }}
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input name="can_authorize" type="checkbox" class="form-check-input">
                                {{ __('Can Authorize') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="jawatan" class="col-md-4 col-form-label text-md-right">{{ __('Jawatan') }}</label>

                <div class="col-md-6">
                    <input id="jawatan" type="text" class="form-control{{ $errors->has('jawatan') ? ' is-invalid' : '' }}" name="jawatan" value="{{ old('jawatan') }}" required>

                    @include('components.forms.error', ['name' => 'jawatan'])
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                    @include('components.forms.error', ['name' => 'password'])
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add New User') }}
                    </button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent