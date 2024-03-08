@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update',$user->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                            <label>{{$user->username}}</label>

                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                            <label>{{$user->phone_number}}</label>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                            <input id="gender" type="radio" name="gender" readonly value="Male" {{ $user->gender=='Male' ? "checked" : ""}}> Male
                            <input id="gender" type="radio" name="gender" readonly value="Female" {{ $user->gender=='Female' ? "checked" : ""}}> Female

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <label>{{$user->address}}</label>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                @if($user->photo)
                                <img src="{{asset('profile/'.$user->photo)}}" class="profile">
                                @else
                                <img src="{{asset('noimg.png')}}" class="profile">
                                @endif
                              
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('home')}}" class="btn btn-secondary">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
