
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            @if($data["action"] === "register")
               <div class="card-header">{{ __('Register') }}</div>
               <div class="card-body">
                  <form method="POST" action="{{ asset('register') }}">
            @elseif($data["action"] === "edit")
               <div class="card-header">{{ __('Update') }}</div>
               <div class="card-body">
                  <form method="POST" id="updateForm" action="{{ route('users.update', ['id' => $data["user"]->id]) }}">
                     @method('PUT')
            @elseif($data["action"] === "seller_register")
               <div class="card-header">{{ __('Seller Register') }}</div>
               <div class="card-body">
                  <form method="POST" action="{{ route('users.seller_register') }}">
            @endif
                  @csrf
                  <div class="form-group row">
                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                     <div class="col-md-6">
                        @if(empty($data["user"]))
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                              name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @else
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                              name="name" value="{{ $data["user"]->name }}" required autocomplete="name" autofocus>
                        @endif
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
                        @if(empty($data["user"]))
                           <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                              name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                        @else
                           <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                              name="lastname" value="{{ $data["user"]->lastname }}" required autocomplete="lastname" autofocus>
                        @endif
                        @error('lastname')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Your Country') }}</label>
                     <div class="col-md-6">
                        @if(empty($data["user"]))
                           <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                              name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                        @else
                           <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                              name="country" value="{{ $data["user"]->country }}" required autocomplete="country"
                              autofocus>
                        @endif
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
                        @if(empty($data["user"]))
                           <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                              name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        @else
                           <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                              name="city" value="{{ $data["user"]->city }}" required autocomplete="city" autofocus>
                        @endif
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
                        @if(empty($data["user"]))
                           <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                              name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"
                              autofocus>
                        @else
                           <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                              name="phone_number" value="{{ $data["user"]->phone_number }}" required autocomplete="phone_number"
                              autofocus>
                        @endif
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
                        @if(empty($data["user"]))
                           <input id="e_mail" type="email" class="form-control @error('e_mail') is-invalid @enderror"
                              name="e_mail" value="{{ old('e_mail') }}" required autocomplete="e_mail">
                        @else
                           <input id="e_mail" type="email" class="form-control @error('e_mail') is-invalid @enderror"
                              name="e_mail" value="{{ $data["user"]->e_mail }}" required autocomplete="e_mail">
                        @endif
                        @error('e_mail')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  @if($data["action"] !== "edit")
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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                           {{ __('Confirm Password') }}
                        </label>
                        <div class="col-md-6">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                              required autocomplete="new-password">
                        </div>
                     </div>
                  @endif

                  @if($data["action"] === "edit")
                     <div class="form-group row mb-0">
                        <div class="col-md-1 offset-md-4">
                           <button type="button" id="sendButton" class="btn btn-primary">{{ __('Send') }}</button>
                        </div>
                        <div class="col-md-1">
                           <button onclick="location.href='{{ route('users.index') }}'" type="button"
                              class="btn btn-outline-secondary">{{ __('Cancel') }}
                           </button>
                        </div>
                     </div>
                     <script src="{{ asset('js/administrator/update.js') }}" defer></script>
                  @else
                     <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                           <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </div>
                     </div>
                  @endif
               </form>
            </div>
         </div>
      </div>
   </div>
   <div id="modalContent"></div>
</div>
@endsection
