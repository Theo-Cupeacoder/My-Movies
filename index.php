<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Movies</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style/main.css" />
  </head>

  <body>

    <?php
      require_once('./Entity/Movie.php');

      require_once('./Controller/MovieController.php');
      $movieController = new MovieController();
      $movies = $movieController->getAll();

      /*$movie = new Movie([
        "id" => 1,
        "title" => "Avatar",
        "description" => "Un film avec des gens bleus :)",
        "image_url" => "https://m.media-amazon.com/images/I/71kiTUly50L._AC_SY679_.jpg",
        "release_date" => "2009/12/16",
        "director" => "James Cameron",
        "category_id" => 3
      ]);*/
    ?>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand title-nav" href="#">
            <img
              src="./images/camera.png"
              alt="Logo My Movies"
              width="50px"
              height="auto"
            />
            My Movies
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Accueil</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/create.php">Publier</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <h1>My Movies</h1>
      <h3 class="slogan">Découvrez et partagez des films !</h3>
      <div>
        <img
          class="logo"
          src="./images/camera.png"
          alt="Logo My Movies"
          width="200px"
          height="auto"
        />
      </div>




      <section class="container d-flex justify-content-center">

      <?php
      foreach ($movies as $movie):?>
        
        <div class="card m-3" style="width: 18rem">
          <img
            src="<?php echo $movie->getImage_url(); ?>"
            class="card-img-top"
            alt="<?php echo $movie->getTitle(); ?>"
          />
          <div class="card-body">
            <h5 class="card-title"><?php echo $movie->getTitle(); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $movie->getDirector(); ?></h6>
            <p class="card-text"><?php echo $movie->getDescription(); ?></p>
            <a href="#" class="btn btn-warning"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-pencil-square text-white"
                viewBox="0 0 16 16"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="Modifier"
              >
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                />
                <path
                  fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                />
              </svg>
            </a>
            <a href="#" class="btn btn-danger">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-trash3-fill"
                viewBox="0 0 16 16"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="Supprimer"
              >
                <path
                  d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"
                />
              </svg>
            </a>
          </div>
        </div>

      <?php endforeach ?>
        
      </section>

    </main>

    <footer></footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="./scripts/script.js"></script>
  </body>
</html>
