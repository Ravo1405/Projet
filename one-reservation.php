<?php

include './includes/header.php';

require 'controllers/one-reservationCtrl.php';

?>

<main class="container-fluid mt-3 mb-3">
    <?php if (!empty($errors)) {
        foreach ($errors as $error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php }
    } else { ?>

        <div class="card">

            <h1 class="card-header text-center">INFORMATIONS COMPLETES D'UNE RESERVATION</h1>

            <div class="card-body">

                <ul class="list-group list-group-flush border-0 w-100">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Nom de famille</li>
                        <li class="list-group-item col-sm-7">
                            <td><?= $oneReservation->lastname ?></td>
                        </li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Prénom</li>
                        <li class="list-group-item col-sm-7"><?= $oneReservation->firstname; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Téléphone</li>
                        <li class="list-group-item col-sm-7"><?= $oneReservation->phoneNumber; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Adresse mail</li>
                        <li class="list-group-item col-sm-7"><?= $oneReservation->email; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Nom du gîte</li>
                        <li class="list-group-item col-sm-7"><?= $oneReservation->shelterName; ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Du</li>
                        <li class="list-group-item col-sm-7"><?= displayDate($oneReservation->startDate, "Y-m-d", "d/m/Y"); ?></li>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item  font-weight-bold col-sm-5">Au</li>
                        <li class="list-group-item col-sm-7"><?= displayDate($oneReservation->endDate, "Y-m-d", "d/m/Y"); ?></li>
                    </ul>
                </ul>

            </div>
        </div>
       
        <form id="updateReservation" class="m-5" method="POST" action="">
        <input type="hidden" name="hidden" value="<?= $reservationProfil->id ?>">
        <fieldset class="row mb-4">
            <legend class="mb-5">MODIFIER UN CHAMP</legend>
            <div class="form-label row mb-3">
                <label for="lastname" class="form-label col-sm-3">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $reservationProfil->lastname ?>" placeholder="lastname">
                    <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="firstname" class="form-label col-sm-3">Prénom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $reservationProfil->firstname ?>" placeholder="firstName">
                    <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="phone" class="form-label col-sm-3">Numéro de téléphone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phoneNumber" id="phone" placeholder="Format: 06 12 34 56 78 OU 02 34 56 78 91">
                    <span class="text-danger"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="mail" class="form-label col-sm-3">Adresse courriel</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="mail" value="<?= $reservationProfil->email ?>" placeholder="name@example.com">
                    <span class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="shelter" class="form-label col-sm-3">Nom du bungalow</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="shelterName" id="shelter" value="<?= $reservationProfil->shelterName ?>" placeholder="2015-09-02">
                    <span class="text-danger"><?= isset($errors['shelterName']) ? $errors['shelterName'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="start" class="form-label col-sm-3">Du</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="startDate" id="start" value="<?= $reservationProfil->startDate ?>" placeholder="2015-09-02">
                    <span class="text-danger"><?= isset($errors['startDate']) ? $errors['startDate'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="end" class="form-label col-sm-3">Au</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="endDate" id="end" value="<?= $reservationProfil->endDate ?>" placeholder="2015-09-02">
                    <span class="text-danger"><?= isset($errors['endDate']) ? $errors['endDate'] : '' ?></span>
                </div>
            </div>
            
        </fieldset>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <button class="btn btn-primary mt-3" type="submit" name="update">MODIFIER</button>
                <button class="btn btn-primary mt-3" type="submit" name="delete">SUPPRIMER</button>
            </div>
        </article>
    </form>
<?php }  ?>
</main>

<?php include './includes/footer.php'; ?>