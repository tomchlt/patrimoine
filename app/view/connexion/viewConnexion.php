<?php
include ('../ModelBanque.php');
include ('../ModelCompte.php');
include ('../ModelPersonne.php');
?>

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
      <h1>       Connexion</h1>
        <form action="router1.php?action=processLogin" method="post">
          <div class="mb-3">
              <label for="login" class="form-label">Login</label>
              <input type="text" class="form-control" id="login" name="login" required>
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Se connecter</button>
      </form>

  </div>

  <!-- ----- fin viewConnexion -->
</body>
