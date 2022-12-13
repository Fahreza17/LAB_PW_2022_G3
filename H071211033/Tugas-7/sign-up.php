<?php
    require 'functions.php';

    if(isset($_SESSION['id'])) {
        header('Location: index.php');
    }

    
    $signUp = new SignUp();

    if(isset($_POST['submit'])) {
        $result = $signUp->reg($_POST['username'], $_POST['email'], $_POST['password'], $_POST['conPass']);

        if($result == 1) {
            echo '<script>'; 
            echo 'alert("Account created!");';
            echo 'window.location.href = "sign-in.php";';
            echo '</script>';
        } else if($result == 10) {
            echo '<script>'; 
            echo 'alert("Account with username/email already exists!");'; 
            echo '</script>';
        } else if($result == 100) {
            echo '<script>'; 
            echo 'alert("Password does not match!");'; 
            echo '</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
    <div class="container-md pt-5">
        <div class="card mt-5 bg-dark text-white">

            <div class="card-body">
                <h3 class='card-title'>Sign Up</h3>
                <form action="" method='post' autocomplete='off'>

                    <div class="form-group row pt-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" required value=''>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" required value=''>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder='***********' required value=''>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                    <label for="conPass" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="conPass" name="conPass" placeholder='***********' required value=''>
                        </div>
                    </div>
                    <div class='pb-3 d-flex justify-content-end pt-4'>
                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </div>
                    <p class='text-center'>
                        <small class="text-muted">Already have an account? </small><a href="sign-in.php">Sign In</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>