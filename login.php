<?php

// Hämta Head
require_once 'header.php';

?>

<form action="#" method="POST">
<div class="form-row">
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Email"
           name="Email"> <!-- OBS! name skapar ett element i POST-Arrayen -->
  </div>
  <div class="col-md-4">
    <input type="password" required
           class="form-control mt-2"
           placeholder="Write your Password"
           name="pass">
  </div>
  <div class="col-md-4">
    <input type="submit"
          class="form-control my-2 btn btn-outline-success btn-primary"
          value="Logga In">
  </div>
    <a href="register.php" class="form-control my-2 btn btn-outline-success btn-primary">Register</a>
</div> <!-- form-row -->
</form>

<?php

// 2. Arbeta med data som skickas via formuläret
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    // Hämta värden (values) från olika input-fält
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Rensa data
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    // Validera data (Backend validering)
    if (empty($email) or empty($pass)) {
        echo '<div class="alert alert-danger">
				    Du får inte ha tomma fält!</div>';
    } elseif (strpos($email, '@gmail.com') == false or strlen($email) > 100) {
    echo '<div class="alert alert-danger">
    That Email does not exist if it should check spelling.
    </div>';
} elseif (strlen($pass) < 3 or strlen($pass) > 25) {
    echo '<div class="alert alert-danger">
    That password is wrong please try again.
    </div>';
} else {
    // Logga in i databasen
    require_once 'db.php';

} // Avlusta if som validerar data
endif;

// Hämta sidfot
require_once 'footer.php';
