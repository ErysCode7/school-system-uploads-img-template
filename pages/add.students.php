<?php
session_start(); 
$page_title = "Add Students"; ?>
<?php require "includes/head.php"; ?>

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
                    if(isset($_SESSION["status-success"])) {
                ?>
                <div class="alert alert-success">
                    <h4><?= $_SESSION["status-success"]; ?></h4>
                </div>
                <?php unset($_SESSION["status-success"]); } ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h1>ADD USER</h1>
                    </div>
                    <div class="card-body">
                        <form action="includes/add.students.inc.php" method="post">
                        <?php if(isset($_GET["firstname"])) { $firstname = $_GET["firstname"]; ?>
                            <div class="form-group mb-3">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" placeholder="First name" value="<?= $firstname ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" placeholder="First name">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["lastname"])) { $lastname = $_GET["lastname"]; ?>
                            <div class="form-group mb-3">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name" value="<?= $lastname ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last name">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["email"])) { $email = $_GET["email"]; ?>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email">
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET["birth_date"])) { $birth_date = $_GET["birth_date"]; ?>
                            <div class="form-group mb-3">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="YEAR-MONTH-DAY" value="<?= $birth_date ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" placeholder="YEAR-MONTH-DAY">
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                        <select name="sex" id="sex">
                            <option value="SEX">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                

                        <!-- <?php if(isset($_GET["sex"])) { $sex = $_GET["sex"]; ?>
                            <div class="form-group mb-3">
                                <label for="sex">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Gender" value="<?= $sex ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="sex">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Gender">
                            </div>
                        <?php } ?> -->
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="submit">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "includes/footer.php";?>