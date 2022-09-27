<?php

require './controllers/ajout-reservationCtrl.php';

require_once './models/Reservation.php';

?>
<section id="reservation">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle text-center">RERSERVATION</h1>
        <?php if (!empty($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php }
            var_dump($_POST);
        } else if ($success) { ?>
            <div class="alert alert-success">La réservation a bien été enregistré.</div>
        <?php }
        ?>

        <!--Création d'un formulaire de réservation-->
        <form action="" method="POST">
            <h1 class=" text-center mb-3">Enregistrer une réservation</h1>

            <div class="input-group mb-3">
                <label class="input-group-text" id="lastname-label" for="lastname">Nom de famille</label>
                <input type="text" value="<?= $lastname; ?>" class="form-control" placeholder="Jeudi" aria-label="Nom de famille" aria-describedby="lastname-label" id="lastname" name="lastname" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="firstname-label" for="firstname">Prénom</label>
                <input type="text" value="<?= $firstname; ?>" class="form-control" placeholder="Alain" aria-label="Prénom" aria-describedby="firstname-label" id="firstname" name="firstname" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="phoneNumber-label" for="phoneNumber">Numéro de téléphone</label>
                <input type="text" value="<?= $phoneNumber; ?>" class="form-control" placeholder="06 22 33 44 00" aria-label="Numéro de téléphone" aria-describedby="phoneNumber-label" id="phoneNumber" name="phoneNumber" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="email-label" for="email">Adresse mail</label>
                <input type="email" value="<?= $email; ?>" class="form-control" placeholder="adresse@boitemail.com" aria-label="Adresse mail" aria-describedby="email-label" id="email" name="email" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="shelterName-label" for="shelterName">Nom du gîte</label>
                <input type="text" value="<?= $shelterName; ?>" class="form-control" placeholder="Fifaliana" aria-label="Nom du gîte" aria-describedby="shelterName-label" id="shelterName" name="shelterName" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="startDate-label" for="startDate">Date d'arrivée</label>
                <input type="date" value="<?= $startDate; ?>" class="form-control" aria-label="Date de naissance" aria-describedby="startDate-label" id="startDate" name="startDate" />
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" id="endDate-label" for="endDate">Date de départ</label>
                <input type="date" value="<?= $endDate; ?>" class="form-control" aria-label="Date de naissance" aria-describedby="endDate-label" id="endDate" name="endDate" />
            </div>

            <button type="submit" class="btn btn-success" name="validate">Envoyer</button>

        </form>

</section>

