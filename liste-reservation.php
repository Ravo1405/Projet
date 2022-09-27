<?php
include './includes/header.php';

require 'controllers/liste-reservationCtrl.php';

?>

<main class="container-fluid mt-3">

    <h1 id="pagePatientsList" class="d-flex justify-content-center mt-5">LISTE DES RESERVATIONS</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">N° téléphone</th>
                <th scope="col">Email</th>
                <th scope="col">Nom du gîte</th>
                <th scope="col">Du</th>
                <th scope="col">Au</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservationList as $reservation) { ?>
                <tr>
                    <td><?= $reservation->id; ?></td>
                    <td><?= $reservation->lastname; ?></td>
                    <td><?= $reservation->firstname; ?></td>
                    <td><?= $reservation->phoneNumber; ?></td>
                    <td><?= $reservation->email; ?></td>
                    <td><?= $reservation->shelterName; ?></td>
                    <td><?= displayDate($reservation->startDate, "Y-m-d", "d/m/Y"); ?></td>
                    <td><?= displayDate($reservation->endDate, "Y-m-d", "d/m/Y"); ?></td>
                    <td>
                        <a href="one-reservation.php?id=<?= $reservation->id; ?>">
                            <button class="btn btn-sm btn-info">
                                Voir
                            </button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php#reservation">
        <button class="btn-success mt-3 mb-3">AJOUTER UNE RESERVATION</button>
    </a>
     
</main>

<?php include './includes/footer.php'; ?>