<h2>Suppliers</h2>
<a href="index.php?controller=supplier&action=create">Add New Supplier</a>
<table>
    <tr><th>ID</th><th>Name</th><th>Contact</th><th>Email</th></tr>
    <?php foreach($suppliers as $s): ?>
    <tr>
        <td><?php echo $s['id']; ?></td>
        <td><?php echo $s['name']; ?></td>
        <td><?php echo $s['contact']; ?></td>
        <td><?php echo $s['email']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>