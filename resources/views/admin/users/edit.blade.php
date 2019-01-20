@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/admin/users/{{ $user->id }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="control-label" for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->profile->firstname }}" />
                        @if($errors->has('firstname'))
                            <span class="text-danger">{{ $errors->get('firstname')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->profile->lastname }}" />
                        @if($errors->has('lastname'))
                            <span class="text-danger">{{ $errors->get('lastname')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="text" name="email" disabled id="email" class="form-control" value="{{ $user->email }}" />
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->get('email')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"  />
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->get('password')[0] }}</span>
                        @endif
                    </div>
                     <div class="form-group">
                        <label class="control-label" for="password_confirmation">Password confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  />
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->get('password_confirmation')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->profile->phone }}" />
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->get('phone')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{ $user->profile->country }}" />
                        @if($errors->has('country'))
                            <span class="text-danger">{{ $errors->get('country')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="region">Region</label>
                        <input type="text" name="region" id="region" class="form-control" value="{{ $user->profile->region }}" />
                        @if($errors->has('region'))
                            <span class="text-danger">{{ $errors->get('region')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $user->profile->city }}" />
                        @if($errors->has('city'))
                            <span class="text-danger">{{ $errors->get('city')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="address">Address</label>
                        <textarea name="address" id="address" class="form-control">{{ $user->profile->address }}</textarea>
                        @if($errors->has('address'))
                            <span class="text-danger">{{ $errors->get('address')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="sex">Sex</label>
                        <select name="sex" class="form-control">
                            <option @if($user->profile->sex == 'male') selected @endif value="male">Male</option>
                            <option @if($user->profile->sex == 'female') selected @endif value="female">Female</option>
                            <option @if($user->profile->sex == 'undefined') selected @endif value="undefined">Undefined</option>
                        </select>
                        @if($errors->has('sex'))
                            <span class="text-danger">{{ $errors->get('sex')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="role">Role</label>
                        <select name="role" class="form-control">
                            <option @if($user->role == 'user') selected @endif value="user">User</option>
                            <option @if($user->role == 'admin') selected @endif value="admin">Administrator</option>
                        </select>
                        @if($errors->has('role'))
                            <span class="text-danger">{{ $errors->get('role')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Save user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
