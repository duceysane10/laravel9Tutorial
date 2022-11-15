<h1>User Login</h1>
<form action="user" method="POST">
    @csrf
    <input type="text" name="username"  value="{{old('username')}}" placeholder="enter user name"><br/>
    <span style="color: red;">@error('username'){{$message}}@enderror</span>
    <br/>
    <input type="password" name="password" placeholder="enter password"><br/>
    <span style="color: red;">@error('password'){{$message}}@enderror</span>
    <br/>
    <button type="submit">Login</button>

</form>