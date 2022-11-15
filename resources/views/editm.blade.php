<h1  style="background-color:antiquewhite;">Add members To the Database</h1>
@if(session('status'))
<h3 style="color:green;">{{session('status')}}</h3>
@endif
<form action="/update" method="POST">
    @csrf
    <br/>
    <input type="hidden" name="id"  value="{{$data['id']}}" ><br/>
    <input type="text" name="name"  value="{{$data['name']}}" ><br/>
    <br/>
    <input type="text" name="email" value="{{$data['email']}}"><br/>
    <br/>
    <input type="text" name="address"  value="{{$data['address']}}"><br/><br/>
    <button type="submit"  style="background-color:darkseagreen; color:#fff;height:30px; font: sixe 16px;">Update</button>

</form><br/[