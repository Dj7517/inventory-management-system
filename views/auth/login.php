<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<p>Default: admin / password</p>