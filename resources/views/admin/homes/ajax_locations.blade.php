<option value="">Select location</option>
@foreach($locations as $location)
<option value="{{$location->id}}">{{$location->name}}</option>
@endforeach