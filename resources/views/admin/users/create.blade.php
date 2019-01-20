@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/admin/users">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" />
                    @if($errors->has('firstname'))
                            <span class="text-danger">{{ $errors->get('firstname')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastname">Lasttname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" />
                    @if($errors->has('lastname'))
                            <span class="text-danger">{{ $errors->get('lastname')[0] }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" />
                    @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->get('email')[0] }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control">
                            <option value="" selected disabled>Select role...</option>
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
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

