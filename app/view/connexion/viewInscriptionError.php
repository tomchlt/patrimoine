<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
        <h3>Inscription</h3>
        <br>
        <form role="form" method="get" action="router1.php">
            <div class="form-group">
                <input type="hidden" name="action" value="inscriptionLogge">
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="nom" class="col-form-label" style="font-weight: bold; width:250px">Nom :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nom" name="nom" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="prenom" class="col-form-label" style="font-weight: bold; width:250px">Prénom :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="login" class="col-form-label" style="font-weight: bold; width:200px">Login :</label>
                    </div>
                    <div class="col-2">
                        <input type="text" id="login" name="login" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="password" class="col-form-label" style="font-weight: bold; width:200px">Password :</label>
                    </div>
                    <div class="col-2">
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>
                <p />
                <!-- <label for="statut" style="font-weight: bold;">Votre statut :</label> -->
                <input type="hidden" name="statut" value="1">
            </div>
            <p />
            <p style="color: #EB57A4; font-weight: bold">Login déjà existant : veuillez en choisir un autre </p>
            <br>
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
        <br>

      </tbody>
    </table>
  </div>

  <!-- ----- fin viewInscription -->
</body>
