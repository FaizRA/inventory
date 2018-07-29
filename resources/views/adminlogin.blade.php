<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="{{URL::asset('css/imagetab.css')}}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">



<style>

.logindiv{
  display: inline-block;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 400px;
  height: 250px;
  margin: auto;
  background-color: #009688;
}

.logindiv h3{
  text-align: center;
  color: #fff;
}
div.content {
    padding : 10px 10px 10px 10px;
}

</style>
</head>
<body background="{{ asset('image')}}/sbg.PNG">

  <div class="logindiv">
    <div class="content">
    <h3>Login Admin</h3>
      <br>
      <br>

    <h3>
      <form action="aksilogin" method="post">




                <!--username start-->
                <div>
                  <input placeholder="Username" id="Username" type="text" class="validate" name="user" style="color: black;">
                </div>

              <!--username end-->
              <br>
                <!--password start-->
                <div>
                  <input placeholder="Password" id="Password" type="password" class="validate" name="pass" style="color: black;">
                </div>

              <!--password end-->
              <br>
              <br>
              <div style="text-align:center">
                    <input type="submit" class="btn btn-default" style="color: black;width: 100px;" name="Submit" value="LOGIN">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                  </form>

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
    </h3>
  </div>
</div>
</div>
</body>
</html>
