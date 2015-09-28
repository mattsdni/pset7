<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO register the user and log them in
        //validate fields
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("You must fill out all the fields.");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match.");
        }
        //everything looks good. add to database
        $didRegister = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        if ($didRegister === false)
        {
            apologize("Username already taken.");
        }
        //remember who just registered and log them in
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        redirect("index.php");
    }

?>
