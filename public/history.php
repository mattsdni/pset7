<?php

$rows = query('SELECT * FROM history WHERE id = ' . $_SESSION["id"]);

foreach (array_reverse($rows) as $row)
{
    $stock = lookup($row["symbol"]);
    if ($stock !== false)
    {
        $positions2[] = [
            "name" => $stock["name"],
            "price" => '$' . number_format((float)$row["price"], 2, '.', ''),
            "shares" => $row["shares"],
            "symbol" => strtoupper($row["symbol"]),
            "total" => '$' . number_format((float)($row["shares"] * $row["price"]), 2),
            "timestamp" => $row["time"],
            "action" => $row["action"]
        ];
    }
}

renderBody("history_form.php", [ "positions2" => $positions2, "title" => "Portfolio"]);
?>
