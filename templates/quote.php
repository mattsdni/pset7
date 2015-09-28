<?php

//get stock data
$stock = lookup($_POST["symbol"]);

//make sure stock is valid
if ($stock == false) {
    apologize("That stock doesn't exist");
}
else{

//display stock price
    print("Price: " . number_format((float)$stock["price"], 2, '.', ''));
}
?>
