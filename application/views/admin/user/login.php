<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Admin login</h2>
    <p><?php echo validation_errors(); ?></p>
    <form class="" action="<?php echo site_url('admin/login');?>" method="post">
      <input type="text" name="email" value="">
      <input type="password" name="password" value="">
      <input type="submit" name="" value="login">
    </form>
  </body>
</html>
