<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['btn-submit'])){

    //Get all the post values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $colour = $_POST['colour'];
    $genderM = $_POST['genderM'];
    $genderF = $_POST['genderF'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $password_confirm =$_POST['password_confirm'];

    $gender = [$genderM, $genderF];

   

    //Get todays date
   $date = date("Y-m-d"); 

    if(empty($first_name)){
        $error =   "<div class='alert alert-danger' role='alert'>
                        <span>First name is required</span>
                    </div>";
    }
    else if(empty($last_name)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Last name is required</span>
    </div>";
    }
    else if(empty($email)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Email is required</span>
    </div>";
    }
    else if(empty($dob)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Date of birth is required</span>
    </div>";
    }
    else if(empty($colour)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span> Favourite colour is required</span>
    </div>";
    }
    else if(empty($genderM) && empty($genderF)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Pick a gender</span>
    </div>";
    }
    else if(empty($department)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Pick a department</span>
    </div>";
    }
    else if(empty($password)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Password required</span>
    </div>";
    }
    else if(empty($password_confirm)){
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>You must confirm password</span>
    </div>";
    }

    //preg for numeric numbers
    $preg_numeric = preg_match("/[0-9]+/", $password, $matches);
    $count_preg_numeric = sizeof($matches);
    
    ///preg for special symbols
    $preg_special_symbol = preg_match("/[^\da-zA-Z]/", $password, $matches_special);
    $count_preg_special_symbol = sizeof($matches_special);

    
    //preg for lower case letters
    $preg_lowercase = preg_match("/[a-z]+/", $password, $matches_lower);
    $count_preg_lower  = sizeof($matches_lower);

    //preg for uppercase letters
    $preg_uppercase = preg_match("/[A-Z]+/", $password, $matches_upper);
    $count_preg_upper  = sizeof($matches_upper);


    if(!empty($first_name)&& !empty($last_name)&& !empty($email) && !empty($dob)&& !empty($colour) && !empty($gender)  && !empty($department) && !empty($password) && !empty($password_confirm)){
        if($dob <= $date){
            if($gender){

                if(strlen($password) >= 15){  
                    if($count_preg_numeric > 0){
                            if($count_preg_special_symbol > 0){
                                    if($count_preg_lower > 0){
                                            if($count_preg_upper > 0){
                                                if ($password == $password_confirm){
                                                    $error =   "<div class='alert alert-success' role='alert'>
                                                    <span>Success</span>
                                                </div>";
                                                 $_SESSION['colour'] = $colour;
                                                 $_SESSION['first_name'] = $first_name;
                                                 $_SESSION['last_name'] = $last_name;
                                                 $_SESSION['email'] = $email;
                                                 $_SESSION['dob'] = $dob;
                                                 $_SESSION['department'] = $department;
                                                header("location:success.php");
                                                }
                                                else{
                                                    $error =   "<div class='alert alert-danger' role='alert'>
                                                    <span>Passwords don't match</span>
                                                    </div>";
                                                }
                                           //preg for capital letter     
                                            }
                                            else{
                                                $error =   "<div class='alert alert-danger' role='alert'>
                                                <span>Passwords must contain an upper case letter</span>
                                                </div>";
                                            }
                                    
                            //preg for small letters
                            }
                            else{
                                $error =   "<div class='alert alert-danger' role='alert'>
                                <span>Passwords must contain a lower case letter</span>
                                </div>";
                            }     
                        

                    //preg for symbols
                       
                    }
                    else{
                        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Passwords must contain a special symbol</span>
    </div>";
                    }
            

    //preg for number
        }
        else{
            $error =   "<div class='alert alert-danger' role='alert'>
        <span>Passwords must contain a number</span>
    </div>";
        }
        

        

               

  //end of 15  
}
else{
    $error =   "<div class='alert alert-danger' role='alert'>
        <span>Password must be at least fifteen(15) characters</span>
    </div>";
}

//end of gender   
}


 //end of dob
    }
    else{
        $error =   "<div class='alert alert-danger' role='alert'>
        <span>Date of birth cant be more than today</span>
    </div>";
    }

//end of !empty

}

//end of isset
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Links to bootstrap-->
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap-theme.min.css'>
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>

    <link rel="stylesheet" href="style.css">

    <title>Form Validation</title>
</head>
<body>
    <div class="container wrapper">
        <h3>Form Validation</h3>

        <!--<div class="alert alert-danger" role="alert">-->
            <span class='message'></span>
       <!-- </div>-->

       <?php  if(isset($error)){ echo $error;} ?>

        <form action='' method='POST'>
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name='first_name'  placeholder="John">
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name='last_name' placeholder="Doe">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                <input type="email" class="form-control" name='email' placeholder="hello@exmaple.com">
                </div>
            </div>

            <div class="form-group row">
                <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-6">
                <input type="date" class="form-control" name='dob'>
                </div>
            </div>

            <div class="form-group row">
                <label for="colour" class="col-sm-2 col-form-label">Favourite Colour</label>
                <div class="col-sm-6">
                <input type="color" class="form-control" name='colour' placeholder="Email">
                </div>
            </div>

           <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-6">
                    Male
                    <input type="checkbox" id='male' value='male' name='genderM' onclick="male()" ><br>
                    Female
                    <input type="checkbox" id='female' value='female' onclick = "female()" name='genderF' ><br>
                </div>
            </div>

            <div class="form-group row">
                <label for="department" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-6">
                <select name="department" class='form-control'>
                    <option value="IT">I.T</option>
                    <option value="HR">H.R</option>
                    <option value="Staff">Staff</option>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                <input type="password" id='password' class="form-control" name='password' placeholder="Password">
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirm" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" name='password_confirm'  placeholder="Re-enter password">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-lg send" name='btn-submit'>SUBMIT</button>
                </div>
            </div>
        </form>
    </div>

</body>

<script >


</script>
</html>