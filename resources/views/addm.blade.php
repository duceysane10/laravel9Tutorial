<h1  style="background-color:antiquewhite;">User registration</h1>
@if(session('status'))
<h3 style="color:green;">{{session('status')}}</h3>
@endif
<form action="Addm" method="POST">
    @csrf
    <input type="text" name="id"  value="" placeholder="enter user id"><br/>
    <span style="color: red;"></span>
    <br/>
    <input type="text" name="first_name"  value="{{old('username')}}" placeholder="enter first name"><br/>
    <span style="color: red;"></span>
    <br/>
    <input type="text" name="last_name" placeholder="enter last name"><br/>
    <span style="color: red;"></span>
    <br/>
   
    <input type="text" name="email" placeholder="enter email"><br/>
    <span style="color: red;"></span>
    <br/>
    <input type="password" name="email" placeholder="enter password"><br/>
    <span style="color: red;"></span>
    <br/>
    <button type="submit">Save</button>

</form>