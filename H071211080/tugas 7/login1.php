<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .row{
        padding-left:35%;
        padding-top:20%;
    }
    body{
        background-image:url("background.jpeg");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:right;
    }
</style>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-6">
            <div class="container">
                <h2>Login Database</h2>
                <?php 
require_once('../dasar/config.php');
$user = new insert();
 
if(isset($_POST['login'])){
    $username = $user->escape_string($_POST['username']);
    $password =$user->escape_string($_POST['password']);
    

    $ver=$user->login($username,$password);
    if(!$ver){
        echo '<div class="alert alert-warning">Your login is not success</div>';
    }
    else{
        echo '<div class="alert alert-warning">Your login is success</div>';
	}

}

?>
                <form method="POST">
                    <input type="text" name="username" placeholder=" nama" class="form-control mb-2" required>
                    <div class = "mt -3">
                    <input type="text" name="password"  placeholder=" alamat" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-primary" name="login">Login </button><a href="regis.php" class = "ps-3">Not Have account?</a>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>