<h1>User Login</h1>
@if(session('status'))
<h3 style="color:green;">{{session('status')}}</h3>
@endif
<form action="upload" method="POST" enctype="multipart/form-data"  name="formName">
    @csrf
    <input type="file" name="file" ><br/>
    <!-- <span style="color: red;">@error('password'){{$message}}@enderror</span> -->
    <br/>
    <button type="submit">Upload</button>

</form>