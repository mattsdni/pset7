<?php
//form for looking up a stock price
echo '<form action="quote.php" method="post">
 <fieldset>
        <div class="form-group">
            <input class="form-control" id="symbolID" name="symbol" placeholder="Symbol" type="text" onchange="showVal(this.value)">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </fieldset>
</form>';
?>