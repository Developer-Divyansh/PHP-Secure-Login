<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('DBConn.php');

if ($conn) {
    if (isset($_POST['submit'])) {
        // echo("Very Good");
        if (isset($_POST['submit'])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            $sql = "INSERT INTO users(first_name,last_name,email,phone) VALUES ('$first_name','$last_name','$email','$phone')";
            $res = mysqli_query($conn, $sql);

            // echo '<script>
            // Swal.fire(
            //     "Congratulations!",
            //     "You Have Successfully Regstered!",
            //     "success"
            //   )

            // </script>';
            echo '<script> alert("Registered Successfully")</script>';

            // <script>
            //     Swal.fire(
            //      "Congratulations!",
            //      "You Have Successfully Regstered!",
            //      "success"
            //    )
            // </script>

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
                                <img src="IMG.jpg" alt="login form" class="img-fluid" style="height:705px" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="" method="POST" id="registration_form" data-parsley-validate="True">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="cislogo.jpg" alt="Cyber Ifrastructure Indore" class="img-fluid" style="width: 70px; height: 50px;" />&nbsp;&nbsp;
                                            <span class="h5 fw-bold mb-0" style="padding-top: 15px;">CYBER INFRASTRUCTURE, INDORE <p class="small text-muted">[We make IT Posible]</p></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register your account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" data-parsley-required="true"	data-parsley-required-message ="Required" />
                                            <label class="form-label" for="first_name">First Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" data-parsley-required="true"	data-parsley-required-message ="Required" />
                                            <label class="form-label" for="last_name">Last Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" data-parsley-required="true"	data-parsley-required-message ="Required" data-parsley-type="email"	data-parsley-type-message ="Invalid Email" />
                                            <label class="form-label" for="email">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="digit" id="phone" name="phone" class="form-control form-control-lg" data-parsley-required="true"	data-parsley-required-message ="Required" data-parsley-type="digits" data-parsley-type-message ="Invalid Contact" />
                                            <label class="form-label" for="phone">Contant</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Register</button>
                                        </div>

                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="index.php" style="color: #393f81;">Login here</a></p>
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
    $('#registration_form').parsley();
</script>