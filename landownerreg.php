<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


  </head>
  <body>

<span style="background-color:red;">
  <div class="container">
      <!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Please do Land Owner Registration here</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('user/register_landowner'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus required="required" pattern="[a-z]{1,35}">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter E-mail" name="user_email" type="email" autofocus required="required">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="" required="required">
                              </div>

                              <div class="form-group">Gender : 
                                  <input placeholder="Enter Age" name="gender" type="radio" checked value="Male"/>Male

<input  placeholder="Enter Age" name="gender" type="radio" value="Female"/>Female
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter 10 digit Mobile No" name="user_mobile" type="tel" value="" required="required" pattern="[9|8|7]{1}[0-9]{9}">
                              </div>
                                   <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Aadhar No" name="aadhar" type="text" autofocus required="required" pattern="[0-9]{12}">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Address" name="address" type="text" value="" required="required">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>"> Please Login</a></center><!--for centered text-->
                      <center><b>Tapper Registration ?</b> <br></b><a href="<?php echo base_url('user'); ?>">Tapper Register here</a></center>
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>
