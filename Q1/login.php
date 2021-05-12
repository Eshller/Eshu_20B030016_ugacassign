<?php require_once 'authControllers/authControllers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>
</head>
<body>
    <div class="loader-bg">
    <div class="loader" id="loader"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 form-div login">
            <form action="login.php" method="post">
                <h3 class="text-center">Login</h3>
                <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username or email</label>
                    <input type="text" name="username" value = "<?php echo $username;?>" class= "form-control form-control lg">

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="form-control form-control lg">
                                                        
                <div class="form-group">
                    <button type="submit" name="login-btn" class="btn btn-info btn-block btn-lg button">Login</button>                                   
                </div>
                <p class="text-center">Not yet a member? <a href="signup.php">Sign Up</a></p>
            </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script type="text/javascript">
      VanillaTilt.init(document.querySelectorAll(".login"), {
        max: 10,
        speed: 400
      });
      </script>
      <!-- <script>
      var loader = document.getElementById('loader');
      function loader(){
          loader.style.display='none';
      }
      </script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
         $(window).on('load',function(){
            setTimeout(function(){
                $(".loader").fadeOut('slow');
            }, 200);
         })
      </script>
     <script>
         $(window).on('load',function(){
            setTimeout(function(){
                $(".loader-bg").fadeOut('slow');
            }, 200);
         })
      </script>
    
</body>
</html>