<?php  
session_start();//session starts here    
?>

<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="container text-center">
  <h2 class="well well-lg">Welcome on your visit to check out cool Hospitality Solutions</h2>
  
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" id="myBtnLogin">Login</button><br><br>  
  
  <button type="button" class="btn btn-success" id="myBtnRegister">Register</button>

  <!-- Modal -->
  <div class="modal fade" id="myLogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="login.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="email" class="form-control" id="usrname" name="username" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <input class="btn btn-primary btn-block" type="submit" name="login" value="Log In">
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <button type="button" class="btn btn-success" id="myBtnRegister1">Register</button></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
  <div class="modal fade" id="myRegister" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:10px 35px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-ok"></span> Register</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="hotel.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="email" class="form-control" id="usrname" name="usrname" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password" required>
            </div>
			<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
              <input type="password" class="form-control" id="psw" name="confirmpsw" placeholder="Repeat password" required>
            </div>
			<div class="form-group">
              <label for="hotelname"><span class="glyphicon glyphicon-home"></span> Hotel Name</label>
              <input type="text" class="form-control" id="hotelname" name="hotelname" placeholder="Enter Hotel Name" required>
            </div>
			<div class="form-group">
              <label for="hotelloc"><span class="glyphicon glyphicon-map-marker"></span> Hotel Location</label>
              <input type="text" class="form-control" id="hotelloc" name="hotelloc" placeholder="Enter City Name" >
            </div>
           
              <!--<button type="submit" name="register" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Register</button>-->
			  <input class="btn btn-primary btn-block" type="submit" name="register" value="Register">
			  
          </form>
		  
        </div>
        <div class="modal-footer">
          
          <p>Already a member? <button type="button" class="btn btn-primary" id="myBtnLogin1">Login</button></p>
          
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtnLogin").click(function(){
        $("#myLogin").modal();
    });
});
$(document).ready(function(){
    $("#myBtnRegister").click(function(){
        $("#myRegister").modal();
    });
});
$(document).ready(function(){
    $("#myBtnLogin1").click(function(){
		$("#myRegister").modal('hide');
        $("#myLogin").modal('show');
    });
});
$(document).ready(function(){
    $("#myBtnRegister1").click(function(){
        $("#myLogin").modal('hide');
		$("#myRegister").modal('show');
    });
});
</script>

</body>
</html>
