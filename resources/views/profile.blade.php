@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>My profile</h1>
			<form method="post" action="/profile">
				@csrf
				{{ method_field('PUT') }}
				<div class="form-group">
					<label class="control-label" for="firstname">Firstname</label>
					<input type="text" name="firstname" id="firstname" class="form-control" value="{{ Auth::User()->profile->firstname }}" />

				</div>
				<div class="form-group">
					<label class="control-label" for="lastname">Lastname</label>
					<input type="text" name="lastname" id="lastname" class="form-control" value="{{ Auth::User()->profile->lastname }}" />

				</div>
				<div class="form-group">
					<label class="control-label" for="phone">Phone</label>
					<input type="text" name="phone" id="phone" class="form-control" value="{{ Auth::User()->profile->phone}}" />

				</div>
				<div class="form-group">
					<label class="control-label" for="country">Country</label>
					<input type="text" name="country" id="country" class="form-control" value="{{ Auth::User()->profile->country }}" />

				</div>

				<div class="form-group">
					<label class="control-label" for="region">Region</label>
					<input type="text" name="region" id="region" class="form-control" value="{{ Auth::User()->profile->region }}" />

				</div>

				<div class="form-group">
					<label class="control-label" for="city">City</label>
					<input type="text" name="city" id="city" class="form-control" value="{{ Auth::User()->profile->city }}" />

				</div>

				<div class="form-group">
					<label class="control-label" for="address">Address</label>
					<textarea type="text" name="address" id="address" class="form-control" >{{ Auth::User()->profile->address }}</textarea>

				</div>
				<div class="form-group">
					<label class="control-label" for="sex">Sex</label>
					<!-- <input type="text" name="sex" id="sex" class="form-control" value="{{ Auth::User()->profile->sex }}" /> -->
					<select name="sex" class="form-control">
						<option value="" @if(auth()->user()->profile->sex == 'underfined' ) selected @endif disabled>Underfined</option>
						<option value="male" @if(auth()->user()->profile->sex == 'male' ) selected @endif >Male</option>
						<option value="female" @if(auth()->user()->profile->sex == 'female' ) selected @endif>Female</option>

					</select>

				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
