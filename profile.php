<?php
session_start();
$ar = $_SESSION['person'];
$useremail = $ar['email'];
$sid = $ar['id'];                                                                              //session values (sid and name)
if (isset($ar['id'])) {
    // include 'DBconn.php';
    $servername = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "secure_login";

    //create connection 
    $conn = mysqli_connect($servername, $user, $password, $dbname);

    $data = "SELECT * FROM users WHERE id='$sid' AND email='$useremail' ";
    $result = mysqli_query($conn, $data);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $phone = $row['phone'];
        // $email = $row['email'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $dp = $row['dp'];
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['submit'])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            $files = $_FILES['file'];                                         //Profile Pic part
            $filename = $files['name'];
            if($filename){
                $fileerror = $files['error'];
                $filetmp = $files['tmp_name'];
                $fileext = explode('.', $filename);
                $filecheck = strtolower(end($fileext));

                $filearr = array('png', 'jpg', 'jpeg');
                if (in_array($filecheck, $filearr)) {                             //store DP in directory
                    $destinationfile = 'images/' . $filename;
                    move_uploaded_file($filetmp, $destinationfile);
                }
            }
            else {
                $destinationfile = $dp;
            }

            $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone', `dp`='$destinationfile' WHERE `id`=$sid";

            $res = mysqli_query($conn, $sql);

            echo '<script> alert("Profile Updated Successfully")</script>';
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <?php
    include 'styles.php';
    ?>

    <body>
        <?php
        include 'navbar.php';
        ?>
        <section class="vh-100" style="background-color: #AAAAAA;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center">
                    <!-- <div class="col col-xl-10"> -->
                    <div class="card" style="border-radius: 1rem;">
                        <!-- <div class="row g-0"> -->
                        <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="IMG.jpg" alt="login form" class="img-fluid" style="height:705px" />
                                </div> -->
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body  text-black">

                                <form action="" method="POST" id="update_profile" enctype="multipart/form-data" data-parsley-validate="True">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="cislogo.jpg" alt="Cyber Ifrastructure Indore" class="img-fluid" style="width: 70px; height: 50px;" />&nbsp;&nbsp;
                                        <span class="h5 fw-bold mb-0" style="padding-top: 15px;">CYBER INFRASTRUCTURE, INDORE <p class="small text-muted">[We make IT Posible]</p></span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Update your account</h5>

                                    <?php 
                                    if ($dp) {
                                    ?>
                                        <p><img src=" <?php echo 'http://localhost/SecureLogin/' . $dp; ?> " height="110px" width="100px"></p>
                                    <?php
                                    }
                                    else {
                                    ?>
                                        <p><img src=" <?php echo 'http://localhost/SecureLogin/user.jpg' ?> " height="110px" width="100px"></p>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-outline mb-4">
                                        <label class="form-control" for="file">Profile Picture</label>
                                        <input type="file" id="file" name="file" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" value="<?php echo $firstname ?>" data-parsley-required="true" data-parsley-required-message="Required" />
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="<?php echo $lastname ?>" data-parsley-required="true" data-parsley-required-message="Required" />
                                        <label class="form-label" for="last_name">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?php echo $ar['email'] ?>" data-parsley-required="true" data-parsley-required-message="Required" data-parsley-type="email" data-parsley-type-message="Invalid Email" readonly />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="digit" id="phone" name="phone" class="form-control form-control-lg" value="<?php echo $phone ?>" data-parsley-required="true" data-parsley-required-message="Required" data-parsley-type="digits" data-parsley-type-message="Invalid Contact" />
                                        <label class="form-label" for="phone">Contant</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Update</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </section>
    </body>

    </html>


<?php
    include 'scripts.php';
} else {
    header('Location: index.php');
}
?>