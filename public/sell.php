<?php

    // configuration
    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stock = lookup($_POST["symbol"]);
        $value = $stock["price"] * $_POST["shares"];
        $shares = query("SELECT shares FROM portfolio WHERE id =  " . $_SESSION["id"] . " AND symbol = " . "'" . $_POST["symbol"] . "'");

    //make sure user has enough shares to sell
    if ($shares[0]["shares"] < $_POST["shares"]) {
        apologize("You do not have that many shares to sell.");
    }

    //remove stocks
    if (query("SELECT shares FROM portfolio WHERE id = " . $_SESSION["id"] . " AND symbol = " . "'" . $_POST["symbol"] . "'")[0]["shares"] - $_POST["shares"] == 0)
    {
        query("DELETE FROM portfolio WHERE id = " . $_SESSION["id"] . " AND symbol = " . "'" . $_POST["symbol"] . "'");
    }
    else
    {
        query("UPDATE portfolio SET shares = shares - " . $_POST["shares"] . " WHERE id = " . $_SESSION["id"] . " AND symbol = " . "'" . $_POST["symbol"] . "'");
    }


    //update account balance
    query('UPDATE users SET cash = cash + ' . $value . ' WHERE id = ' . $_SESSION["id"]);

    //log the transaction
    query("INSERT INTO history (id, symbol, shares, price, time, action) VALUES (".$_SESSION["id"].", '".$_POST["symbol"]."', " . $_POST["shares"] . ", " . $stock["price"] . ", " . " NOW()" . ", " . "'SELL'" . ")");

    redirect("/");

}
?>
