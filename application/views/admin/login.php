<!DOCTYPE html>
<html>
<head>
  <title>Apotek Berkah</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main.css">
  <script type="text/javascript" src="<?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h2>LOGIN ADMINISTRATOR</h2>
</div>

<div class="container">
  <div class="col-md-offset-4 col-md-4">
    <?= $message; ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required autofocus>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success" name="login" value="Login">
      </div>
    </form>
  </div>
</div>

</body>
</html>