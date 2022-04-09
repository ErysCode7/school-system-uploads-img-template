<?php
    session_start();
    $page_title = "Log in";
    require "includes/head.php";
?>

<div class="home-link">
    <a class="active" href="index.php"><li><i class="fa fa-home"></i><span class="go-home">Go back to home page</span></li></a>
</div>


<div class="login-showcase">
    <p>Welcome you can login to your account</p>
</div>



<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                    if(isset($_SESSION["status"])) {
                ?>
                <div class="alert alert-warning">
                    <h4><?= $_SESSION["status"]; ?></h4>
                </div>
                <?php unset($_SESSION["status"]); } ?>
                <?php
                    if(isset($_SESSION["success-status"])) {
                ?>
                <div class="alert alert-success">
                    <h4><?= $_SESSION["success-status"]; ?></h4>
                </div>
                <?php unset($_SESSION["success-status"]); } ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="includes/login.inc.php" method="post">
                            <div class="form-group mb-3">
                                <label for="email_username">Email or Username</label>
                                <input type="text" name="username" id="username" placeholder="Email or username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Log in</button>
                            </div>
                            <div class="form-group">
                                <a href="forgotPassword.php">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "includes/footer.php"; ?>

