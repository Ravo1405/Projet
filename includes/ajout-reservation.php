<?php

require './controllers/ajout-reservationCtrl.php';

require_once './models/Reservation.php';

?>
<section class="container-fluid" id="reservation">
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
        <form class="form-reservation " method="POST">
            <fieldset class="row d-sm-flex flex-column mb-4">
                <h2 class=" text-center font-weight-bold mb-3">Enregistrer une réservation</h2>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="lastname-label" for="lastname">Nom:</label>
                    <input type="text" value="<?= $lastname; ?>" class="form-control bg-dark text-center" placeholder="Jeudi" aria-label="Nom de famille" aria-describedby="lastname-label" id="lastname" name="lastname" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="firstname-label" for="firstname">Prénom:</label>
                    <input type="text" value="<?= $firstname; ?>" class="form-control bg-dark text-center" placeholder="Alain" aria-label="Prénom" aria-describedby="firstname-label" id="firstname" name="firstname" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="phoneNumber-label" for="phoneNumber">Téléphone:</label>
                    <input type="text" value="<?= $phoneNumber; ?>" class="form-control bg-dark text-center" placeholder="06 22 33 44 00" aria-label="Numéro de téléphone" aria-describedby="phoneNumber-label" id="phoneNumber" name="phoneNumber" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="email-label" for="email">Adresse mail:</label>
                    <input type="email" value="<?= $email; ?>" class="form-control bg-dark text-center" placeholder="adresse@boitemail.com" aria-label="Adresse mail" aria-describedby="email-label" id="email" name="email" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="shelterName-label" for="shelterName">Nom du gîte:</label>
                    <input type="text" value="<?= $shelterName; ?>" class="form-control bg-dark text-center" placeholder="Fifaliana" aria-label="Nom du gîte" aria-describedby="shelterName-label" id="shelterName" name="shelterName" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="startDate-label" for="startDate">Du:</label>
                    <input type="date" value="<?= $startDate; ?>" class="form-control bg-dark text-center" aria-label="Date de naissance" aria-describedby="startDate-label" id="startDate" name="startDate" />
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="endDate-label" for="endDate">Au:</label>
                    <input type="date" value="<?= $endDate; ?>" class="form-control bg-dark text-center" aria-label="Date de naissance" aria-describedby="endDate-label" id="endDate" name="endDate" />
                </div>

                <button type="submit" class="btn btn-dark" name="validate">Envoyer</button>
            </fieldset>
        </form>
    </div>

</section>