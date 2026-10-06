<?php

session_start();
include('DBConn.php');

if ($conn) {
    if (isset($_POST['submit'])) {
        // echo "Very Good" ; die;
        $useremail = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM users WHERE email='$useremail' and password='$password' ";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $email = $row['email'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $dp = $row['dp'];

            $_SESSION['person'] = array('id' => $id, 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email , 'phone' => $phone , 'dp' => $dp);
            echo '<script>alert("Welcome to Worldd...!")</script>';
            header('Location: dashboard.php');
        }
        else{
            echo '<script>alert("Invalid Username or Password!!! Please Try again. ")</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include('styles.php');
?>

<body>
    <section class="vh-100" style="background-color: #AAAAAA;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="IMG.jpg" alt="login form" class="img-fluid" style="height:600px" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="" method="POST" id="login_form" enctype="multipart/form-data" data-parsley-validate="True">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="cislogo.jpg" alt="Cyber Ifrastructure Indore" class="img-fluid" style="width: 70px; height: 50px;" />&nbsp;&nbsp;
                                            <span class="h5 fw-bold mb-0" style="padding-top: 15px;">CYBER INFRASTRUCTURE, INDORE <p class="small text-muted">[We make IT Posible]</p></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" data-parsley-required="true" data-parsley-required-message="Required" />
                                            <label class="form-label" for="email">Email address</label>
                                        </div>

                                        <div id="example" style="padding-left: 200px;">

                                        </div>
                                        <p id="text" style="display: none;">Scan QR for Password</p>

                                        <div class="form-outline mb-4" id="pass" style="display: none;">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" data-parsley-required="true" data-parsley-required-message="Required" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button" id="getQR" name="getQR">Get-QR</button>
                                            <button class="btn btn-dark btn-lg btn-block" style="display: none;" type="submit" id="submit" name="submit">Login</button>
                                        </div>

                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
include('scripts.php');
?>

<script>
    $(document).ready(function() {
        $('#getQR').click(function() {
            $('#email').parsley().validate();
            if ($('#email').parsley().isValid()) {
                var useremail = document.getElementById("email").value;

                // Ajax to check the entered User is already Registered or not.
                $.ajax({
                    url: "checkuser.php",
                    method: "POST",
                    data: {
                        user_email: useremail
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'true') {
                            // alert(response.password);
                            $('#pass').show();
                            $('#getQR').hide();
                            $('#submit').show();
                            // I Frame to load QR Code here.
                            $("#example").html('<iframe src="/SecureLogin/QR.php?email=' + useremail + '" ></iframe>');
                            $('#text').show();
                        }
                        if (response.status == 'false') {
                            $("#example").html('<p style="color:red">The user does not exist</p>');
                        }
                    }
                });
            }

        });
    });
</script>