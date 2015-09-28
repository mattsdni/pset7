<?php

    // configuration
    require("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    //render quote form
    render("quote_form.php", []);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //display the results
    render("quote.php", lookup($_POST["symbol"]));
}

?>
