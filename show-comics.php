<?php
/**********************************************
 *       show-movies.php
 *       Skriptet visar alla filmer
 *       i en Bootstrap-grid
 **********************************************/
//session_unset();

require_once 'header.php';
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
// Logga in i databasen
require_once 'db.php';

// Skapa en SQL-sats
// Hämta alla filmer från tabellen film
$stmt = $conn->prepare("SELECT * FROM comicbooks");

// Kör SQL
$stmt->execute();
$i = 0;
// Starta en Bootstrap rad
echo "<div class='row'>";

// Iterera över resultatet med en while
// Lagra varje rad i $row
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
	
	// Hämta data från varje rad i tabellen
	
	$id = $row['cbook_id'];
	$titel = $row['name'];
	$description = $row['description'];
	$prize = $row['prize'];
	//ECHO $total;
	// Hämta src till en bild från mappen images
	$image = "img/$id.png";
	if (!file_exists($image)) {
		$image = "img/no-poster.png";
	}
	
	if (!isset($_SESSION["total"])) {
		$_SESSION["total"] = 0;
		$_SESSION["tog"] = 0;
		$i = 1;
	}
	try {
		if ($i > 0 AND $i <= 12) {
			
			$_SESSION["prize"][$i] = $prize;
			$_SESSION["qty"][$i] = 0;
			$i++;
		}
	} 
						catch (\Throwable $th) {
							break;
						}
	
    ?>
													<!-- Lånade denna kod från Mahmud. -->
													<!-- Starta en Bootstrap kolumn och ange olika brytpunkter -->
													<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
													<!-- Skapa ett kort för att presentera en tidning
													      https://getbootstrap.com/docs/4.2/components/card/   -->
													<div class="card m-1">
													  <img class="card-img-top" src="<?php echo $image ?>"
													        alt="<?php echo $titel; ?>">
													  <div class="card-body border border-dark">
										        <h4 class="card-title"><?php echo $titel; ?></h4>
										          <p class="card-text">
													     <?php echo $description; ?>
													    </p>
													    <!-- Skapa en GET-Länk till en beställningssida (skicka filmid)
													         t.ex. order-form.php?id=1 -->
													    <a href="?add=<?php echo $id ?>"
													       class="btn btn-outline-info">
													      <?php echo $prize; ?>kr :-
													    </a>
													  </div>
													</div>
													<!-- Avsluta kolumnen -->
													</div>
													<?php

// Avsluta while
endwhile;

echo '</div>';

require_once 'footer.php';
// Avsluta Bootstrap raden
//---------------------------
//Add
//session_unset();
if (isset($_GET["add"])) {
    $x = $_GET["add"];
    $qty = $_SESSION["qty"][$x] + 1;
    $_SESSION["cart"][$x] = $qty;
    $_SESSION["qty"][$x] = $qty;
		$total = $_SESSION["prize"][$x];
		
		

		echo '<hr>';
			$_SESSION["total"] += $total ;
			print_r($_SESSION["total"]);
			echo '<hr>';
				
	}

print_r($_SESSION["cart"]);
echo '<br>';
print_r($_SESSION["qty"]);
echo '<br>';
print_r($_SESSION["prize"]);
echo '<br>';
print_r($_SESSION["total"]);
//---------------------------
/*/Reset
if ( isset($_GET['reset']) )
{
if ($_GET["reset"] == 'true')
{
unset($_SESSION["qty"]); //The quantity for each product
unset($_SESSION["amounts"]); //The amount from each product
unset($_SESSION["total"]); //The total cost
unset($_SESSION["cart"]); //Which item has been chosen
}
}

//---------------------------
//Delete
if ( isset($_GET["delete"]) )
{
$i = $_GET["delete"];
$qty = $_SESSION["qty"][$i];
$qty--;
$_SESSION["qty"][$i] = $qty;
//remove item if quantity is zero
if ($qty == 0) {
$_SESSION["amounts"][$i] = 0;
unset($_SESSION["cart"][$i]);
}
else
{
$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
}
}
 */
