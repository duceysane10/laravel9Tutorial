<h1  style="background-color:antiquewhite;">Add members To the Database</h1>
@if(session('save'))
<h3>{{toastr()->success('Data has been saved successfully!');}}</h3>
@endif
<form action="addmember" method="POST">
    @csrf
    <br/>
    <input type="text" name="name"  value="{{old('name')}}" placeholder="enter your name" ><br/>
    <span style="color: red;">@error('name'){{$message}}@enderror</span>
    <br/>
    <input type="text" name="email" placeholder="enter email"><br/>
    <span style="color: red;">@error('email'){{$message}}@enderror</span>
    <br/>
    <input type="text" name="address"  value="" placeholder="enter user address"><br/>
    <span style="color: red;">@error('address'){{$message}}@enderror</span><br/>
    <button type="submit"  style="background-color:aqua; height:30px; font: sixe 16px;">Add member</button>

</form><br/>


<h1 style="background-color:antiquewhite;">dispalying All Members from the database</h1>
@if(session('deleteS'))
<h3 style="color:red;">{{session('deleteS')}}</h3>
@endif
<table border="1px"  style="text-align:center">
<tr style="background-color: antiquewhite;">
    <th>Member id</th>
    <th>member name</th>
    <th>email</th>
    <th>Adrres</th>
    <th>action</th>
</tr>
@foreach($members as $row)
<tr>
    <td>{{$row['id']}}</td>
    <td>{{$row['name']}}</td>
    <td>{{$row['email']}}</td> 
    <td>{{$row['address']}}</td>
    <td><a href={{"delete/".$row['id']}} style="color:red">Delete</a>
    <a href={{"edit/".$row['id']}}>Edit</a></td>
    
</tr>
@endforeach 
</table>
<p>{{$members->links()}}</p>
<style>
    .w-5{
        display: none;
    }
</style>