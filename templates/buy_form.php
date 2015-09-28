<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" id="symbolID" name="symbol" placeholder="Symbol" type="text" onchange="showVal(this.value, document.getElementById('numSharesID').value)">
        </div>
        <div class="form-group">
            <input class="form-control" id="numSharesID" name="shares" placeholder="Shares" type="text" onchange="showVal(document.getElementById('symbolID').value, this.value)">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>
<p id="totalCost">Total Cost: </p>