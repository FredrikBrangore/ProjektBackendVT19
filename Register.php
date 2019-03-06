<?php
// Hämta Head
require_once 'header.php';

?>
<form action="#" method="POST">

<div class="form-row">
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Name"
           name="name"> <!-- OBS! name skapar ett element i POST-Arrayen -->
  </div>
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Telefon/Mobil"
           name="tel">
  </div>
  <div class="col-md-4">
    <input type="password" required
           class="form-control mt-2"
           placeholder="Write your Password"
           name="pass">
  </div>
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Write your Gmail"
           name="email">
  </div>
  <div class="col-md-4">
    <input type="text" required
           class="form-control mt-2"
           placeholder="Write your Adress"
           name="adress">
  </div>

  <div class="col-md-4">
    <input type="submit"
          class="form-control my-2 btn btn-outline-primary"
          value="Lägg till">
  </div>

</div> <!-- form-row -->
</form>

<?php

// 2. Arbeta med data som skickas via formuläret
if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    // Hämta värden (values) från olika input-fält
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];

    // Rensa data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $tel = filter_var($tel, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $adress = filter_var($adress, FILTER_SANITIZE_STRING);

    // Validera data (Backend validering)
    if (empty($name) or empty($tel) or empty($email) or empty($adress) or empty($pass)) {
        echo '<div class="alert alert-danger">
	    Du får inte ha tomma fält!</div>';
    } elseif (strlen($name) < 3 or strlen($name) > 50) {
    echo '<div class="alert alert-danger">
    Namnet måste vara mer än 2 tecken eller max 50.
    </div>';
} elseif (strlen($tel) < 3 or strlen($tel) > 50) {
    echo '<div class="alert alert-danger">
    Telefon måste vara mer än 2 tecken eller max 50.
    </div>';
} elseif (strlen($pass) < 3 or strlen($pass) > 25) {
    echo '<div class="alert alert-danger">
    Password måste vara mer än 2 tecken eller max 50.
    </div>';
} elseif (strpos($email, '@gmail.com') == false or strlen($email) > 100) {
    echo '<div class="alert alert-danger">
    Du får bara ha gmail och max 100 tecken.
    </div>';
} elseif (strlen($adress) < 3 or strlen($adress) > 100) {
    echo '<div class="alert alert-danger">
    Adress måste vara mer än 2 tecken eller max 100.
    </div>';
} else {
    // Logga in i databasen
    require_once 'db.php';
    // Förbered en SQL-sats
    $stmt = $conn->prepare("INSERT INTO contacts (name,tel,pass,email,adress)
                                VALUES (:name, :tel, :pass, :email, :adress) ");
    // Binda variabler till params, som finns i VALUES()
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':adress', $adress);
    // Skicka SQL till databasen
    $stmt->execute();
    header('Location: index.php');
} // Avlusta if som validerar data
endif;

// Hämta sidfot
require_once 'footer.php';
/*
// REQUEST_METHOD
$stmt = $conn->prepare("SELECT * FROM contacts");
$stmt->execute();
$table = '<table class="table">';
$table .= '<tr><th>Namn</th><th>Telefon</th><th>Admin</th></tr>';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$table .= '<tr>';
$table .= '<td>' . $row['name'] . '</td>';
$table .= '<td>' . $row['tel'] . '</td>';
$table .= '<td><a href="update.php?id=' . $row['id'] . '">
Uppdatera</a>
|
<a href="delete.php?id=' . $row['id'] . '">
Ta bort
</a>
</td>';

$table .= '</tr>';
}
$table .= '</table>';
echo $table; */