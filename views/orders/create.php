<h2>New Stock Transaction</h2>
<form method="POST">
    <select name="product_id" required>
        <option value="">Select Product</option>
        <?php foreach($products as $p): ?>
        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?> (Stock: <?php echo $p['stock']; ?>)</option>
        <?php endforeach; ?>
    </select><br>
    <input type="number" name="quantity" placeholder="Quantity" required><br>
    <select name="order_type">
        <option value="in">Stock In (Purchase)</option>
        <option value="out">Stock Out (Sale)</option>
    </select><br>
    <button type="submit">Save Transaction</button>
</form>