<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Movies - Publier un film</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/main.css" />
  </head>

  <body>

  <?php
      session_start();
      function loadClass(string $class){
        if ($class === "DotEnv") {
          require_once("../config/$class.php"); 
        } else if (str_contains($class, "Controller")){
          require_once("../Controller/$class.php");
        } else {
          require_once("../Entity/$class.php");
        }
      }

      spl_autoload_register("loadClass");

    $categoryController = new CategoryController();
    $categories = $categoryController->getAll();

    if ($_POST){
      $movieController = new MovieController();
      $newMovie = new Movie($_POST);
      $movieController->create($newMovie);
      echo "<script>window.location='../index.php'</script>";
    }
  ?>

  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand title-nav" href="#">
            <img
              src="../images/camera.png"
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
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../views/create.php">Publier</a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <?php
                  if ($_SESSION && $_SESSION["username"]) {
                    echo "<li class='nav-item'>
                            <span class='nav-link active'> 
                              Bienvenue {$_SESSION["username"]} !
                            </span>
                          </li>
                          <li class='nav-item'>
                            <a class='nav-link' href='../views/logout.php'>
                              D??connexion
                            </a>
                          </li>";
                  } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='../views/register.php'>
                              S'inscrire
                            </a>
                          </li>
                          <li class='nav-item'>
                            <a class='nav-link' href='../views/login.php'>
                              Se connecter
                            </a>
                          </li>";
                  }
                ?>

              </ul>

          </div>
        </div>
      </nav>
    </header>

    <main>
      <h3>Publier un nouveau film</h3>
      <form class="container-fluid w-50" method="POST" action="">

        <label class="form-label" for="title">Titre</label>
        <input class="form-control" type="text" id="title" name="title" placeholder="Le titre du film">
      
        <label class="form-label" for="description">description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Le r??sum?? du film"></textarea>
      
        <label class="form-label" for="image_url">Image</label>
        <input class="form-control" type="url" name="image_url" id="image_url" placeholder="L'URL de l'image du film">

        <label class="form-label" for="release_date">Date de sortie</label>
        <input class="form-control" type="date" name="release_date" id="release_date">

        <label class="form-label" for="director">R??alisateur</label>
        <input type="text" name="director" id="director" placeholder="Le r??alisateur du film">

        <label class="form-label" for="category_id">Cat??gorie</label>
        <select class="form-select" name="category_id" id="category_id">
          <option value="" selected>--S??lectionnez une cat??gorie--</option>
          <?php
            foreach ($categories as $category) : ?>
              <option value="<?= $category->getId(); ?>"><?= $category->getName();?></option>
            }
          <?php endforeach ?>
        </select>

        <button class="btn btn-primary m-3" type="submit">Publier</button>

      </form>
    </main>

    <footer>

    </footer>

  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
  <script src="../scripts/script.js"></script>
</html>
