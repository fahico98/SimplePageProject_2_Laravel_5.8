@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                           <div class="col-md-6">
                               <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                   name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                               @error('lastname')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Your Country') }}</label>

                           <div class="col-md-6">
                                 <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                 @error('country')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Your City') }}</label>

                           <div class="col-md-6">
                                 <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                 @error('city')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                           </div>
                        </div>

                       <div class="form-group row">
                           <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                           <div class="col-md-6">
                              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                 name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                              @error("phone_number")
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="e_mail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="e_mail" type="email" class="form-control @error('e_mail') is-invalid @enderror"
                                    name="e_mail" value="{{ old('e_mail') }}" required autocomplete="e_mail">

                                @error('e_mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
