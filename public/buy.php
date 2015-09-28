<?php
//this page handles to logic of the buy request

// configuration
require("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    echo 'y u come here?';
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //display the results
    //render("quote.php", lookup($_POST["symbol"]));

    //make sure a whole number of shares was entered
    if (preg_match("/^\d+$/", $_POST["shares"]) != true)
    {
        apologize("Amount must be a whole number.");
    }

    //get available funds
    $availableCash = query('SELECT cash FROM users WHERE id = ' . $_SESSION["id"])[0]["cash"];

    //get stock info
    $stock = lookup($_POST["symbol"]);

    if ($stock === false)
    {
        apologize("That stock could not be found.");
    }

    //order cost
    $orderCost = $stock["price"] * $_POST["shares"];

    //make sure user has enough money
    if ($orderCost > $availableCash)
    {
        apologize("You only have $" . number_format($availableCash,2) . "......" .
            number_format($_POST["shares"]) . " shares of " . $stock["name"] . " is $" .
            number_format($orderCost, 2));
    }

    //add new stock to user's portfolio
    query("INSERT INTO portfolio (id, symbol, shares) VALUES(".$_SESSION["id"].", '".$_POST["symbol"]."', ".$_POST["shares"].") ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)");

    //update user's cash
    query("UPDATE users SET cash = cash - " . $orderCost . " WHERE id = " . $_SESSION["id"]);

    //log the transaction
    query("INSERT INTO history (id, symbol, shares, price, time, action) VALUES (".$_SESSION["id"].", '".$_POST["symbol"]."', " . $_POST["shares"] . ", " . $stock["price"] . ", " . " NOW()" . ", " . "'BUY'" . ")");

    redirect("/");

}
?>
