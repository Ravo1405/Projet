<?php

include 'includes/header.php';

?>

<main>
  <!-- section ACCUEIL -->
  <section id="accueil">
    <div class="shadow p-3 mb-5 bg-body rounded"></div>
    <div>
      <h1>Bienvenue<br> Chez Kanto Location</h1>
    </div>
    <!-- <button type="button" class="btn btn-orange btn-lg bottom-0 start-0" data-toggle="button" aria-pressed="false" autocomplete="off"">
      <a href=" #bungalows" class="text-light">Réserver</a>
    </button> -->
  </section>

  <!-- section BUNGALOWS -->
  <section id="bungalows">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle">Nos bungalows</h1>
      <p>Les bungalows de kantolocation sont des logements très agréables et confortables.
        Semblables à de véritables maisonnettes, les bungalows sont généralement situés au cœur de la forêt.
        Ces bungalows peuvent accueillir entre 2 et 6 personnes. Tous disposent d’un coin séjour, d’un coin cuisine,
        d’une terrasse et d’une salle d’eau. Le coin cuisine est tout équipé.
        On peut y trouver un réfrigérateur et une plaque de cuisson avec deux ou quatre feux.
        Dans le salon des bungalows 4/6 personnes, il y a une banquette-lit, une salle d’eau (où se trouvent une
        douche et un lavabo) et un WC indépendant. Tout est prévu pour faciliter vos vacances. Il y a de nombreux
        rangements et tiroirs pour ranger vos affaires et vous sentir comme chez vous.
      </p>
    </div>
    <div class="card-deck">
      <div class="card">
        <img class="card-img" src="./asset/img/bungalow.jpg" alt="photo bungalow N°1">
        <div class="card-body">
          <h2 class="card-title"><a href="fitiavana.php">FITIAVANA</a></h2>
          <p>2/3 personnes</p>

        </div>
        <div class="card-footer">
          <a href="fitiavana.php" onclick="return false;" class="btn-discover tk-KohinoorTelugu-Regular">
            En savoir plus
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img" src="./asset/img/bungalow1.jpg" alt="photo bungalow N°2">
        <div class="card-body">
          <h2 class="card-title"><a href="fihobiana.php">FIHOBIANA</a></h2>
          <p>4/6 personnes</p>

        </div>
        <div class="card-footer">
          <a href="fihobiana.php" onclick="return false;" class="btn-discover tk-KohinoorTelugu-Regular">
            En savoir plus
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img" src="./asset/img/bungalow4.jpg" alt="photo bungalow N°3">
        <div class="card-body">
          <h2 class="card-title"><a href="firavoana.php">FIRAVOANA</a></h2>
          <p>6 personnes</p>

        </div>
        <div class="card-footer">
          <a href="firavoana.php" onclick="return false;" class="btn-discover tk-KohinoorTelugu-Regular">
            En savoir plus
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- section SERVICES -->
  <section id="services">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle">Nos services</h1>
      <p>Tous nos services sont inclus dans les tarifs de location affichés sauf le restaurant. Votre satisfation est notre priorité.</p>
    </div>

    <div class="container">
      <p>Resto</p>
      <img src="./asset/img/mangue-crevettes.jpg" alt="image d'une assiette et des couverts" class="images">
      <div class="overlay">
        <div class="text">Nos plats sont cuisinés avec des produits frais. Le goût est au RVD!!</div>
      </div>
    </div>

    <div class="container">
      <p>Wifi gratuit</p>
      <img src="./asset/img_chevrons/wifi-gratuit.png" alt="image de wifi gratuit" class="images">
      <div class="overlay">
        <div class="text">Vous profiterez d'une connexion internet gratuite!!</div>
      </div>
    </div>

    <div class="container">
      <p>Piscine</p>
      <img src="./asset/img/petit-dej.jpg" alt="image d'une piscinne" class="images">
      <div class="overlay">
        <div class="text">Une piscine pour vous rafraîchir et vous détendre!!</div>
      </div>
    </div>

    <div class="container">
      <p>Voiture</p>
      <img src="./asset/img_chevrons/voiture.jpg" alt="image d'une voiture" class="images">
      <div class="overlay">
        <div class="text">Vous aurez une voiture avec chauffeur pour vos promenades!!</div>
      </div>
    </div>

    <div class="container">
      <p>Vélos</p>
      <img src="./asset/img_chevrons/velos.jpg" alt="image des vélos" class="images">
      <div class="overlay">
        <div class="text">Des vélos à votre dispositon pour une balade en couple ou en famille!!</div>
      </div>
    </div>

    <button type="button" class="btn btn-orange btn-lg position-absolute bottom-0 start-0" data-toggle="button" aria-pressed="false" autocomplete="off">
      <a href="#bungalows" class="text-light">Réserver</a>
    </button>
  </section>

  <!-- section ACTIVITE -->
  <section id="activity">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle"><a href="isaloParc.php" id="isalo-parc-tittle">Activités Parc d'Isalo</a></h1>
    </div>
    <div id="carousel-image" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-image" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-image" data-slide-to="1"></li>
        <li data-target="#carousel-image" data-slide-to="2"></li>
        <li data-target="#carousel-image" data-slide-to="3"></li>
        <li data-target="#carousel-image" data-slide-to="4"></li>
        <li data-target="#carousel-image" data-slide-to="5"></li>
        <li data-target="#carousel-image" data-slide-to="6"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block" src="./asset/img/pisine-naturelle.jpg" alt="photo de la piscine naturelle de l'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la piscine naturelle de l'Isalo</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/maki4.jpg" alt="photo de maki d'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la faune de l'Isalo</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/flore.jpg" alt="photo plante d'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la flore de l'Isalo</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/fenetre-de-l-Isalo.jpg" alt="photo de la fenêtre del'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la fenêtre de l’Isalo</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/reine-de-l-Isalo.jpg" alt="photo de la reine de l'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la reine de l'Isalo</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/paysage4.jpg" alt="photo de la grotte des Portugais d'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>la grotte des Portugais</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block" src="./asset/img/tombeau-de-bara.jpg" alt="image du tombeau de bara d'Isalo">
          <div class="carousel-caption d-none d-md-block">
            <h2>Les tombeaux Bara</h2>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-image" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-image" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- section RESERVATIONS -->
  <?php include './includes/ajout-reservation.php'; ?>

  <!-- Section CONTACT -->
  <section id="contact">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle">Contact</h1>
    </div>
    <div class="contact-section">
      <div class="coordinates">
        <p>
          KANTO LOCATION<br>Quartier Nord De Ranohira-Isalo, <br> Ranohira 313,<br> Madagascar
        </p>
        <p>Mobile: +261 32 05 210 50</p>
        <p>Téléphone: +261 34 07 205 53</p>
        <p>Fax: +261 34 07 205 00</p>
        <p id="email-adress">
          <a href="mailto:info@kantolocation.com">info@kantolocation.com</a>
          <br>
          <a href="mailto:commerciale@kantolocation.com">commerciale@kantolocation.com</a>
          <br>
        </p>
      </div>
      <div class="card-mdg">
        <img class="bg_image" src="./asset/img/carte_madagascar_isalo.jpg" alt="carte de Madagascar">
      </div>
    </div>
  </section>

  <!-- section COMMENTAIRES -->
  <section id='commentaires'>
    <div class="shadow p-3 mb-5 bg-body rounded">
      <h1 class="tittle">Commentaires</h1>
      <form class="bg-white col-6">
        <!-- Name input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example1">Name</label>
          <input type="text" id="form4Example1" class="form-control" />

        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example2">Email address</label>
          <input type="email" id="form4Example2" class="form-control" />
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example3">Message</label>
          <textarea class="form-control" id="form4Example3" rows="4"></textarea>
        </div>

        <!-- Div pour les notes -->
        <div class="py-2">
          <a href="#"><i class="bi bi-star text-info" title="Bad"></i></a>
          <a href="#"><i class="bi bi-star text-info" title="Poor"></i></a>
          <a href="#"><i class="bi bi-star text-info" title="Ok"></i></a>
          <a href="#"><i class="bi bi-star text-info" title="Goog"></i></a>
          <a href="#"><i class="bi bi-star text-info" title="Excellent"></i></a>
        </div>
        <!-- Submit button -->
        <button type="submit" name="send" class="btn bg-info btn-block text-white font-weight-bold  mb-4">
          Send
        </button>
      </form>
    </div>
  </section>
</main>
<?php include './includes/footer.php'; ?>