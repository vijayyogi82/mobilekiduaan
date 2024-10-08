<option >Select Model</option>
@foreach($mobiles  as $mobile) 
   <option value="{{$mobile->phone}}">{{$mobile->phone}}</option>
@endforeach
