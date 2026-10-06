<?php
session_start();
$ar = $_SESSION['person'];                                                                              //session values (sid and name)
$sid = $ar['id'];
if (isset($ar['id'])) {

    include 'dbcon.php';                                                                                          //include db file
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
        </section>
    </body>

    </html>

<?php
    include 'scripts.php';
} else {
    header('Location: index.php');
}
?>