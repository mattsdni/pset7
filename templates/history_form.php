<div>
    <table class="table table-condensed table-hover">
        <thead>
        <tr>
            <th>Action</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price Per Share</th>
            <th>Total</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;?>
        <?php foreach ($positions2 as $position2): ?>

            <tr>
                <td><?= $position2["action"] ?></td>
                <td><?= $position2["symbol"] ?></td>
                <td><?= $position2["name"] ?></td>
                <td><?= $position2["shares"] ?></td>
                <td><?= $position2["price"] ?></td>
                <td><?= $position2["total"] ?></td>
                <td><?= $position2["timestamp"] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
