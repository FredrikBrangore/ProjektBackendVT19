<?php
/**********************************************
 *       order-page.php
 *       Skriptet hanterar en GET-request
 *       och visar ett beställningsformulär
 **********************************************/

// Infoga sidhuvud (header.php)
include_once 'header.php';
echo'
<div class="form-row">
  <div class="col-md-4">
    <a href="order-page.php" class="form-control my-2 btn btn-outline-success btn-primary">Shopping Cart</a>
  </div>
  <div class="col-md-4">
  <!-- Bara för mellan rum! -->
  </div>
  <div class="col-md-4">
    <a href="index.php" class="form-control my-2 btn btn-outline-success btn-primary">Logout</a>
  </div>
</div>';
if (isset($_GET['reset'])) {
    unset($_SESSION["qty"]); //The quantity for each product
    unset($_SESSION["total"]); //The total cost
    unset($_SESSION["cart"]); //Which item has been chosen
}
require_once 'db.php';
$str = '';
foreach ($_SESSION["cart"] as $x => $x_value) {
  $stmt = $conn->prepare("SELECT name FROM comicbooks WHERE cbook_id = '$x'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_OBJ);
  $str .= "<br> " . $result->name . ", Amount=" . $x_value;
  //echo $result->name . ", Amount=" . $x_value;
}
echo $str;
if (isset($_GET['buynow'])) {
        $sql = "INSERT INTO orders (email, prizeTotal, date)
               VALUES (:email, :prize, CURRENT_TIMESTAMP)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_SESSION["email"]);
        $stmt->bindParam(':prize', $_SESSION["total"]);
        $stmt->execute();
}
echo '<br>';
print_r($_SESSION["total"]);
echo '<hr>';

print_r($_SESSION["cart"]);

echo '<hr>';

// Kör SQL

echo '<hr>';
print_r($result);
echo '<hr>';
echo "Favorite gmail is " . $_SESSION["email"] . ".<hr>";
echo "Favorite adress is " . $_SESSION["adress"] . ".<hr>";
echo "Favorite name is " . $_SESSION["name"] . ".";

// Visa ett beställningsformulär
?>

  <div class="col-md-4">
    <a href="storepage.php" class="form-control my-2 btn btn-outline-success btn-primary">More Shopping</a>
  </div>

<div class="col-md-6">
    <h2>Your Shopping Cart</h2>
    <h3><?php foreach ($_SESSION["cart"] as $x => $x_value) {
    echo "<br>";
    $stmt = $conn->prepare("SELECT name FROM comicbooks WHERE cbook_id = '$x'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    echo $result->name . ", Amount=" . $x_value;
}?></h3>
    <h3>Pris: <?php print_r($_SESSION["total"])?>kr</h3>
    <form action="?buynow" method="post">
        <input type="hidden" name="filmid" value="<?=$filmid?>">
        <input type="hidden" name="pris" value="<?=print_r($_SESSION["total"])?>">



<?php
if (isset($_SESSION["cart"])) {
    # code...
    echo '<a href="?buynow" class="form-control my-2 btn btn-outline-success btn-primary">Buynow</a>
    </form>';
    echo '<div class="col-md-4">
    <a href="?reset" class="form-control my-2 btn btn-outline-success btn-primary">Reset</a>
  </div>';
}
echo '</div> <!-- col -->';
echo '</div> <!-- row -->';
require_once 'footer.php';
//Reset

/* Förbered en SQL-sats
"INSERT INTO orders (film, kund, datum, pris)
VALUES (:filmid, :kundnummer, CURRENT_TIMESTAMP, :pris)";
$stmt = $conn->prepare("INSERT INTO orders (name,tel,pass,email,adress)
VALUES (:name, :tel, :pass, :email, :adress) ");
// Binda variabler till params, som finns i VALUES()
$stmt->bindParam(':name', $name);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':adress', $adress);
// Skicka SQL till databasen
$stmt->execute();
header('Location: index.php'); */