<div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Symbol</th>
        <th>Name</th>
        <th>Shares</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0;?>
    <?php foreach ($positions as $position): ?>

        <tr>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["name"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td><?= $position["price"] ?></td>
            <td><?= $position["total"] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</div>
<div>
    <h3>
        <p class="alignleft">Available Cash: <?= $cash ?></p>
        <p class="alignright">Portfolio Value: <?= $value ?></p>
    </h3>
    <br><br>
</div>
<p>
    <button type="button" class="btn btn-primary" onclick="showBuy()">Buy</button>
    <button type="button" class="btn btn-primary" onclick="showSell()">Sell</button>
    <button type="button" class="btn btn-primary" onclick="showQuote()">Quote</button>
    <button type="button" class="btn btn-primary" onclick="showHistory()">History</button>
</p>
<br>

<div id="buyDiv"  style="display:none;" class="answer_list" >
    <?php
    require("buy_form.php");
    ?>
</div>

<div id="sellDiv"  style="display:none;" class="answer_list" >
    <?php
    require("sell_form.php");
    ?>
</div>

<div id="quoteDiv"  style="display:none;" class="answer_list" >
    <?php
    require("quote_form.php");
    ?>
</div>

<div id="historyDiv"  style="display:none;" class="answer_list" >
    <?php
    require("../public/history.php");
    ?>
</div>

<div>
    <a href="logout.php">Log Out</a>
</div>

<script>
    function showBuy() {
        document.getElementById('buyDiv').style.display = "block";
        document.getElementById('sellDiv').style.display = "none";
        document.getElementById('quoteDiv').style.display = "none";
        document.getElementById('historyDiv').style.display = "none";
    }
    function showSell() {
        document.getElementById('buyDiv').style.display = "none";
        document.getElementById('sellDiv').style.display = "block";
        document.getElementById('quoteDiv').style.display = "none";
        document.getElementById('historyDiv').style.display = "none";

    }
    function showQuote() {
        document.getElementById('buyDiv').style.display = "none";
        document.getElementById('sellDiv').style.display = "none";
        document.getElementById('quoteDiv').style.display = "block";
        document.getElementById('historyDiv').style.display = "none";

    }
    function showHistory() {
        document.getElementById('buyDiv').style.display = "none";
        document.getElementById('sellDiv').style.display = "none";
        document.getElementById('quoteDiv').style.display = "none";
        document.getElementById('historyDiv').style.display = "block";

    }
    function showVal(val, numShares)
    {
        $.ajax({
            type: 'post',
            url:'ajaxQuote.php',
            data: {
                source1: val
            },
            complete: function (response)
            {
                if (response)
                {
                    var livequote = JSON.parse(response.responseText);

                    for (var key in livequote)
                    {
                        console.log(key);
                    }
                    //do stuff
                    if (livequote == null)
                    {
                        document.getElementById("totalCost").innerHTML = "Invalid Stock Symbol";
                    }
                    else
                    {
                        document.getElementById("totalCost").innerHTML = "Total Cost: " + "$" + (livequote["price"] * numShares).toFixed(2);
                    }
                }
            }

        });



    }

</script>
