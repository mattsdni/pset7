<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value="">Select a Stock</option>
                <?php foreach ($positions as $position): ?>
                    <option value=<?= $position["symbol"] ?> > <?= $position["name"] ?> </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" name="shares" placeholder="Shares" type="text">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>