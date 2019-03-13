<?php

// Hämta Head
require_once 'header.php';

session_unset();
?>

<form action="#" method="POST">
<div class="form-row">
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Gmail"
           name="email"> <!-- OBS! name skapar ett element i POST-Arrayen -->
  </div>
  <div class="col-md-4">
    <input type="password" required
           class="form-control mt-2"
           placeholder="Write your Password"
           name="pass" id="myInput">
           <input type="checkbox" class="text-center" onclick="myFunction()">Show Password
  </div>
  <div class="col-md-4">
    <input type="submit"
          class="form-control my-2 btn btn-outline-success btn-primary"
          value="Logga In">
  </div>
    <a href="register.php" class="form-control my-2 btn btn-outline-success btn-primary">Register</a>
</div> <!-- form-row -->
</form>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

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
													    No empty fields please!</div>';
    } else {
      // Logga in i databasen


      require_once 'db.php';
      $stmt = $conn->prepare("SELECT pass FROM contacts WHERE email = '$email'");
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      
      echo $result->pass;
      if (password_verify($pass, $result->pass)) {
        echo 'Password is valid!';
        $stmt = $conn->prepare("SELECT email, adress, name FROM contacts WHERE email = '$email' AND pass = '$result->pass'");
        $stmt->execute();
        /* Fetch all of the remaining rows in the result set */
        // print("Fetch all of the remaining rows in the result set:\n");
        $result1 = $stmt->fetch(PDO::FETCH_OBJ);
        
        echo '<hr>';
        print_r($result1);
        echo '<hr>';
        echo $email;
        
        if ($result1->email == $email) {
          $_SESSION["email"] = $email;
          $_SESSION["adress"] = $result1->adress;
          $_SESSION["name"] = $result1->name;
          //echo '<div class="alert alert-danger">Det Funkar!</div>';
          echo '<hr>';
          echo "Favorite gmail is " . $_SESSION["email"] . ".<br>";
          echo "Favorite adress is " . $_SESSION["adress"] . ".<br>";
          echo "Favorite name is " . $_SESSION["name"] . ".";
          //header('Location: storepage.php');
        } else {
          echo '<div class="alert alert-danger">
          That Email does not exist if it should check spelling or the password might be wrong please try again.
          </div>';
        }
      } 
      else {
        echo '<div class="alert alert-danger">
        That password is wrong if it should exist check spelling.
        </div>';
      }
        
      } // Avlusta if som validerar data
endif;

// Hämta sidfot
require_once 'footer.php';
