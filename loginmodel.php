<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <?php
    $e = "";
    $p = "";

    if (isset($_COOKIE["e"])) {
        $e = $_COOKIE["e"];
    }

    if (isset($_COOKIE["p"])) {
        $p = $_COOKIE["p"];
    }

    ?>

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Login or Register</h4>
                    <div class="aa-login-form">
                        <label for="">Email address<span>*</span></label>
                        <input id="email3" value="<?php echo $e ?>" type="text" placeholder="email address">
                        <label for="">Password<span>*</span></label>
                        <input id="password3" value="<?php echo $p ?>" type="password" placeholder="Password">
                        <button class="aa-browse-btn" onclick="signInModel();">Login</button>

                        <label for="rememberme" class="rememberme"><input checked type="checkbox" value="1" id="remember3"> Remember me </label>
                        <p class="aa-lost-password"><a href="signinSignUp.php">Lost your password?</a></p>
                        <div class="aa-register-now">
                            Don't have an account?<a href="signinSignUp.php">Register now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</body>

</html>