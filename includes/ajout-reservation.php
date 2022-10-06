<?php
require './controllers/ajout-reservationCtrl.php';
require_once './models/Reservation.php';
?>
<section class="container-fluid" id="reservation">
    <div class="shadow p-3 mb-5 bg-body rounded">
        <h1 class="tittle text-center">RESERVATION</h1>
        <?php if (!empty($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php }
        } else if ($success) { ?>
            <div class="alert alert-success">La réservation a bien été enregistré.</div>
        <?php }
        ?>
        <!--Création d'un formulaire de réservation-->
        <!-- <form class="form-reservation " method="POST">
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
        </form> -->
    </div>
</section>

<form class="form-reservation" method="POST" action="">
            <fieldset class="row-fieldset mb-5">
                <legend class="text mb-3">Enregistrer une réservation</legend>
                <div class="form-label row mb-3">
                    <label for="lastname" class="coordonées">Nom:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="lastname" id="lastname" value="<?= $lastname; ?>" placeholder="lastname">
                        <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="firstname" class="coordonées">Prénom:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="firstname" id="firstname" value="<?= $firstname; ?>" placeholder="firstName">
                        <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="phone" class="coordonées">Téléphone:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="phoneNumber" id="phone" value="<?= $phoneNumber; ?>" placeholder="Format: 06 12 34 56 78 ">
                        <span class="text-danger"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="mail" class="coordonées">Mail:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control text-center" name="email" id="mail" value="<?= $email; ?>" placeholder="name@example.com">
                        <span class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="shelter" class="coordonées">Bungalow:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="shelterName" id="shelter" value="<?= $shelterName; ?>" placeholder="Nom du bungalow">
                        <span class="text-danger"><?= isset($errors['shelterName']) ? $errors['shelterName'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="start" class="coordonées">Du:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control text-center" name="startDate" id="start" value="<?= $startDate; ?>" placeholder="2015-09-02">
                        <span class="text-danger"><?= isset($errors['startDate']) ? $errors['startDate'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="end" class="coordonées">Au:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control text-center" name="endDate" id="end" value="<?= $endDate ?>" placeholder="2015-09-02">
                        <span class="text-danger"><?= isset($errors['endDate']) ? $errors['endDate'] : '' ?></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark" name="validate">Envoyer</button>

            </fieldset>
            
        </form>