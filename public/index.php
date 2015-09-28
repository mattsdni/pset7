<?php

    // configuration
    require("../includes/config.php");

    $value = 0;
    //get owned stocks
    $rows = query('SELECT * FROM portfolio WHERE id = ' . $_SESSION["id"]);
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => '$' . number_format((float)$stock["price"], 2, '.', ''),
                "shares" => $row["shares"],
                "symbol" => strtoupper($row["symbol"]),
                "total" => '$' . number_format((float)($row["shares"] * $stock["price"]), 2)
            ];
        }
        $value = $value + $stock["price"] * $row["shares"];
    }

    $value = '$' . number_format($value, 2);
    //get cash balance
    $cash = '$' . number_format(query('SELECT cash FROM users WHERE id = ' . $_SESSION["id"])[0]["cash"]);

    // render portfolio
    render("portfolio.php", ["cash" => $cash, "value" => $value, "positions" => $positions, "title" => "Portfolio"]);

?>
