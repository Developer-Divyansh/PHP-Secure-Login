<?php
session_start();
$ar=$_SESSION['person'];                                                                              //session values (sid and name)
$sid=$ar['id'];
if (isset($ar['id'])) {                                                                 
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="cislogo.jpg" alt="Cyber Ifrastructure Indore" class="img-fluid" style="width: 70px; height: 60px;" />&nbsp;&nbsp;
  <div class="navbar-brand" style="padding-top: 30px;">
    <h5>CYBER INFRASTRUCTURE, INDORE <br> <p class="small text-muted">[We make IT Posible]</p></h5>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item" style="color: whitesmoke;">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item float-right">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<?php 
}
else{
    header('Location: index.php');
} 
?>