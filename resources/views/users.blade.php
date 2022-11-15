<h1  style="background-color:antiquewhite;">User registration</h1>
<form action="Users" method="POST">
    @csrf
    <br/>
    <input type="text" name="first_name"  value="{{old('username')}}" placeholder="enter first name"><br/>
    <span style="color: red;">@error('username'){{$message}}@enderror</span>
    <br/>
    <input type="password" name="last_name" placeholder="enter last name"><br/>
    <span style="color: red;">@error('password'){{$message}}@enderror</span>
    <br/>
   
    <input type="password" name="email" placeholder="enter email"><br/>
    <span style="color: red;">@error('password'){{$message}}@enderror</span>
    <br/>
    <button type="submit">Save</button>

</form>


<h1 style="background-color:antiquewhite;">dispalying All users from the Api</h1>
<table border="1px"  style="text-align:center">
<tr style="background-color: antiquewhite;">
    <th>user id</th>
    <th>first name</th>
    <th>last name</th>
    <th>email</th>
    <th>Profile</th>
</tr>
@foreach($all as $row)
<tr>
    <td>{{$row['id']}}</td>
    <td>{{$row['first_name']}}</td>
    <td>{{$row['last_name']}}</td>
    <td>{{$row['email']}}</td> 
    <td><img src="{{$row['avatar']}}" style="width: 50px; height: 50px;"></td> 
</tr>
@endforeach 
</table>