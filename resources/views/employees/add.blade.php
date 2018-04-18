@extends('layouts.app')

@section('content')

<form method="post" action="" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="job">Job </label>
    <input type="text" class="form-control" id="job"  name="job" placeholder="Job">
  </div>
<!--  <div class="form-group">
    <label for="exampleTextarea">Example textarea</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
  -->
  <div class="form-group">
    <label for="exampleInputFile">Image</label>
    <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp">
  </div>
  <fieldset class="form-group">
    <legend>Status</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="statusRB" id="optionsRadios1" value="Active" checked>
        Active
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="statusRB" id="optionsRadios2" value="Not Active">
        Not Active
      </label>
    </div>
   </fieldset>

   <fieldset class="form-group">
    <legend>Admin</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="adminRB" id="optionsRadios3" value="yes" >
        Yes
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="adminRB" id="optionsRadios4" value="no" checked>
        No
      </label>
    </div>
   </fieldset>
   	<div class="form-group">
	   <label>Location</label>
	   <input type="text" name="locationSearch" id="locationText">
		<div style="width: 500px; height: 500px;" >
		{!! Mapper::render() !!}
		</div>
	</div>
  <button type="submit" class="btn btn-primary">Add User</button>
</form>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB73L1RyzXHkT9fZMlnitShWfEkF3bzrVk&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('locationText'));
        google.maps.event.addListener(places, 'place_changed', function () {

        });
    });
</script>

@endsection