<h2>Add Product</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required><br>
    <input type="text" name="sku" placeholder="SKU" required><br>
    <input type="text" name="category" placeholder="Category"><br>
    <input type="number" name="price" placeholder="Price" step="0.01" required><br>
    <input type="number" name="stock" placeholder="Initial Stock" required><br>
    <select name="supplier_id">
        <option value="">Select Supplier</option>
        <?php foreach($suppliers as $s): ?>
        <option value="<?php echo $s['id']; ?>"><?php echo $s['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Save Product</button>
</form>