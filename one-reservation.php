<?php
include './includes/header.php';
require 'controllers/one-reservationCtrl.php';
?>

<main class="one-reservation">
    <?php if (!empty($errors)) {
        foreach ($errors as $error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php }
    } else { ?>
        <div class="card-one-reservation">
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

        <form class="form-reservation" method="POST" action="">
            <input type="hidden" name="hidden" value="<?= $oneReservation->id ?>">
            <fieldset class="row-fieldset d-flex flex-column mb-4">
                <legend class="text-center mb-5">MODIFIER OU SUPPRIMER UN CHAMP</legend>
                <div class="form-label row mb-3">
                    <label for="lastname" class="form-label col-sm-3">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="lastname" id="lastname" value="<?= $oneReservation->lastname ?>" placeholder="lastname">
                        <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="firstname" class="form-label col-sm-3">Prénom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="firstname" id="firstname" value="<?= $oneReservation->firstname ?>" placeholder="firstName">
                        <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="phone" class="form-label col-sm-3">Téléphone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="phoneNumber" id="phone" placeholder="Format: 06 12 34 56 78 ">
                        <span class="text-danger"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="mail" class="form-label col-sm-3">Mail</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control text-center" name="email" id="mail" value="<?= $oneReservation->email ?>" placeholder="name@example.com">
                        <span class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="shelter" class="form-label col-sm-3">Nom du bungalow</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" name="shelterName" id="shelter" value="<?= $oneReservation->shelterName ?>" placeholder="2015-09-02">
                        <span class="text-danger"><?= isset($errors['shelterName']) ? $errors['shelterName'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="start" class="form-label col-sm-3">Du</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control text-center" name="startDate" id="start" value="<?= $oneReservation->startDate ?>" placeholder="2015-09-02">
                        <span class="text-danger"><?= isset($errors['startDate']) ? $errors['startDate'] : '' ?></span>
                    </div>
                </div>
                <div class="form-label row mb-3">
                    <label for="end" class="form-label col-sm-3">Au</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control text-center" name="endDate" id="end" value="<?= $oneReservation->endDate ?>" placeholder="2015-09-02">
                        <span class="text-danger"><?= isset($errors['endDate']) ? $errors['endDate'] : '' ?></span>
                    </div>
                </div>

            </fieldset>
            <article class="row mb-5">
                <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                    <button class="btn btn-primary mx-auto mt-3" type="submit" name="update">MODIFIER</button>
                    <button class="btn btn-primary mx-auto mt-3" type="submit" name="delete" onclick="return confirm('Really Delete?');">SUPPRIMER</button>
                </div>
            </article>
        </form>
    <?php }  ?>
</main>

<?php include './includes/footer.php'; ?>