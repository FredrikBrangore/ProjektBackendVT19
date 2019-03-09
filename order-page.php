<?php
/**********************************************
 *       order-page.php
 *       Skriptet hanterar en GET-request
 *       och visar ett beställningsformulär
 **********************************************/

// Infoga sidhuvud (header.php)
include_once 'header.php';


// Visa ett beställningsformulär
?>

<div class="col-md-6">
    <h2>Du har valt följande film</h2>
    <h3><?php echo $titel; ?></h3>
    <h3>Pris: <?php echo $pris; ?>kr</h3>
    <form action="order-process.php" method="post">
        <input type="number" name="kundnummer" required
               class="form-control my-2" 
               placeholder="Ange ditt kundnummer">
        <input type="hidden" name="filmid" value="<?=$filmid?>">
        <input type="hidden" name="pris" value="<?=$pris?>">
        <input type="submit" 
               class="form-control my-2 btn btn-outline-success" 
               value="Skicka beställningen">
    </form>

    <?php
    // Om det finns ett meddelande i sessionen så visa här
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        // Rensa sessionen
        unset($_SESSION['message']);
    }
    ?>
</div> <!-- col -->
</div> <!-- row -->

<?php
require_once 'footer.php';