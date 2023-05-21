<?php
    // Capture data from main page
    $cost = filter_input(INPUT_POST, 'cost', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);
    $member = isset($_POST['member']);
    $waterproof = isset($_POST['waterproof']);

    // Validation
    if ($cost === FALSE) {
        $error_message = 'Cost must be a valid number';
    } else if ($cost <= 0) {
        $error_message = 'Cost must be greater than zero';
    } else {
        $error_message = '';
    }

    if ($quantity === FALSE) {
        $error_message = 'Quantity must be a valid number';
    } else if ($quantity <= 0) {
        $error_message = 'Quantity must be greater than zero';
    } else {
        $error_message = '';
    }

    // If error message
    if ($error_message != '') {
        include('notfound.php');
        exit();
    } 

    // Calculate total cost
    $total_cost = $cost * $quantity;
    // Member Discount
    if ($member) {
        $discount = $total_cost * 0.1; // Assuming 10% discount
        $total_cost -= $discount;
    }  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Order Total</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
        <body>
            <a class="back-button" href="index.php">Go Back</a>
            <main>
                <h1>Order Summary</h1>
                <p>Cost of Shoes: $<?php echo $cost; ?></p>
                <p>Quantity: <?php echo $quantity; ?></p>
                    <?php if ($waterproof) { ?>
                        <p>Waterproof: Yes</p>
                     <?php } else { 
                        ?><p>Waterproof: No</p>
                    <?php } ?>
                    <?php if ($member) { ?>
                        <p>Member Discount: $<?php echo $discount; ?></p>
                    <?php } ?>
                <p>Total Cost: $<?php echo $total_cost; ?></p>
            </main>
        </div>
    </div>
</body>
</html>