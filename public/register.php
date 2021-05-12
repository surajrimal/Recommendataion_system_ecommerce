<?php require_once("../includes/initialize.php"); ?>
<?php include_layout_template('header.php'); ?>
<div class="container">
  <h2><center>Customer Registration Form</center></h2><br/>
  <form class="form-horizontal" method="post" action="reg.php">
   <div class="form-group">
      <label class="control-label col-sm-2" for="name">First Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" placeholder="Enter first name" name="fname">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" for="name">Last Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" placeholder="Enter last name" name="lname">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" for="email">Address:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"  placeholder="Enter address" name="caddress">
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" for="email">Contact Number:</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"  placeholder="Enter Phone Number" name="contact">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="cpass">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" name="submit" >Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
<br/><br/><br/><br/><br/>
<?php include_layout_template('footer.php'); ?>