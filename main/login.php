<?php
session_start();
require_once 'function.php';

if (isset($_COOKIE['i']) && isset($_COOKIE['j'])) {
    $i = $_COOKIE['i']; //id users
    $j = $_COOKIE['j']; //email users

    // ambil email berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM users WHERE id_users=$i");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan email
    if ($j === hash('sha256', $row['email'])) {
        $inpEmail = $row['email'];
    }
} else {
    $inpEmail = "";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    //cek email
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('i', $row['id_users']);
                setcookie('j', hash('sha256', $row['email']));
            }

            //cek type users, apakah peserta atau admin
            if ($row['type'] == "peserta") {

                //set session
                $_SESSION['peserta'] = true;
                setcookie('i', $row['id_users']);
                header("Location: dashboard.php");
                exit;
            } elseif ($row['type'] == "admin") {

                //set session
                $_SESSION['admin'] = true;
                header("Location: dashboard.php");
                exit;
            }
        }
    }
    $error = true;
}



?>

<?php

// session_start();
// if (!isset($_SESSION['admin'])) {
//   header("Location: login.php");
//   exit;
// } 
// if (isset($_SESSION['admin'])) {

// } 
require_once '../template/header.php';

?>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="../index.php" class="logo d-flex align-items-center w-auto">
                                <img src="../assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Hi There</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your email & password to login</p>
                                </div>

                                <form action="" method="POST" class="row g-3 needs-validation" novalidate>


                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>


                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <?php if (isset($error)) { ?>
                                            <p style="color:red; font-style:italic;">maaf, email atau password salah!!!</p>
                                        <?php } ?>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Forgot password? <a href="forgotPassword.php">Reset Password</a></p>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

</body>

</html>