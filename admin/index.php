<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/login.css">
<title>Tang Komik</title>
</head>
<body>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="login.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <p><input type="username" name="uname" placeholder="Username"></p>
    <p><input type="password" name="upass" placeholder="Password"></p>
    <p><input type="submit" name="login" value="Log in"></p>
  </form>
</div>
</body>
</html>
