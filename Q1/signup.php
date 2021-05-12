<?php require_once 'authControllers/authControllers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--BOOTSTAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_signup.css">
    <title>Register</title>
</head>
<body>
    <div class="loader-bg">
    <div class="loader" id="loader"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 form-div signup">
            <form action="signup.php" method="post">
                <h3 class="text-center">Register</h3>

                <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value = "<?php echo $username; ?>" class = "form-control form-control lg">
                     </div>               
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value = "<?php echo $email; ?>" class="form-control form-control lg">
                        </div>            
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="form-control form-control lg">
                    </div>           
                <div class="form-group">
                    <label for="passwordConf">Confirm Password</label>
                    <input type="password" name="passwordConf" class="form-control form-control lg">
                    </div>                                
                <div class="form-group">
                    <button type="submit" name="signup-btn" class="btn btn-info btn-block btn-lg">Sign Up</button>                                   
                </div>
                <p class="text-center">Already a member? <a href="login.php">Sign In</a></p>
            </form>
            <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script type="text/javascript">
      VanillaTilt.init(document.querySelectorAll(".signup"), {
        max: 5,
        speed: 400
      });
    </script>
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