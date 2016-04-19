<?php

// If the form was submitted, scrub the input (server-side validation)
// see below in the html for the client-side validation using jQuery

$name = '';
$gender = '';
$address = '';
$email = '';
$username = '';
$password = '';
$output = '';

if($_POST) {
  // collect all input and trim to remove leading and trailing whitespaces
  $name = trim($_POST['name']);
  $gender = trim($_POST['gender']);
  $address = trim($_POST['address']);
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  $errors = array();
  
  // Validate the input
  if (strlen($name) == 0)
    array_push($errors, "Please enter your name");

  if (!(strcmp($gender, "Male") || strcmp($gender, "Female") || strcmp($gender, "Other"))) 
    array_push($errors, "Please specify your gender");
  
  if (strlen($address) == 0) 
    array_push($errors, "Please specify your address");
    
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    array_push($errors, "Please specify a valid email address");
    
  if (strlen($username) == 0)
    array_push($errors, "Please enter a valid username");
    
  if (strlen($password) < 5)
    array_push($errors, "Please enter a password. Passwords must contain at least 5 characters.");
    
  // If no errors were found, proceed with storing the user input
  if (count($errors) == 0) {
    array_push($errors, "No errors were found. Thanks!");
  }
  
  //Prepare errors for output
  $output = '';
  foreach($errors as $val) {
    $output .= "<p class='output'>$val</p>";
  }
  
}

?>

<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
  <style type="text/css">
    .label {text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
  </style>
  
  <script src="bootstrap.min.js" type="text/javascript"></script>
  <script src="jquery-1.5.1.min.js"></script>
  <script src="validate.js"></script>
  <script>
  
  // When the browser is ready...
  $(function() {
  
    $("#register-form").validate({
        rules: {
            name: "required",
            gender: "required",
            address: "required",
            city:"required",
            email: {
                required: true,
                email: true
            },
            username: "required",
            password: {
                required: true,
                minlength: 5
            }
        },
        
        messages: {
            name: "Please enter your name",
            gender: "Please specify your gender",
            address: "Please enter your address",
            city: "Please enter your city",
            email: "Please enter a valid email address",
            username: "Please enter a valid username",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
</head>
<body>
  <?php echo $output; ?>
  
  <div class="container" style="margin-top:100px;">
    <div class="row">
      <form id="register-form" novalidate="novalidate">
        <div class="form-group col-sm-6">
          <label for="name" class="col-sm-4 control-label input-sm">Name</label>
          <div class="col-sm-8">
            <input type="text" id="name" name="name" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-6">
          <label for="address" class="col-sm-4 control-label input-sm">Address</label>
          <div class="col-sm-8">
            <input type="text" id="address" name="address" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-6">
          <label for="city" class="col-sm-4 control-label input-sm">City</label>
          <div class="col-sm-8">
            <input type="text" id="city" name="city" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-6">
          <label for="email" class="col-sm-4 control-label input-sm">Email</label>
          <div class="col-sm-8">
            <input type="text" id="email" name="email" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-6">
          <label for="username" class="col-sm-4 control-label input-sm">Username</label>
          <div class="col-sm-8">
            <input type="text" id="username" name="username" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-6">
          <label for="password" class="col-sm-4 control-label input-sm">Password</label>
          <div class="col-sm-8">
            <input type="password" id="password" name="password" class="form-control input-sm " />
          </div>
        </div>
        <div class="form-group col-sm-12">
          <div class="col-md-12" >
            <button type="submit"  class="btn btn-success btn-sm sub pull-right" >Submit</button>
          </div>
    </div>
      </form>
      
    </div>
  </div>
  
</body>
</html>