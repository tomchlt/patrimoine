<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
      <h1>       Connexion</h1>
      <form role="form" method="get" action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='connexionLogge'>
        <label class="w-25" for="login">Login:</label>
        <input class="form-control" type="text" name='login' style="width: 250px;" value=''>
      </div>
      <div class="form-group">
        <label class="w-25" for="password">Password:</label>
        <input class="form-control" type="password" name='password' style="width: 250px;" value=''>
      </div>
      <p />
      <br />
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewConnexion -->
</body>
