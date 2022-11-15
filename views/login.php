<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Movies - Se connecter</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/main.css" />
  </head>

  <body>

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
                  <a class="nav-link" href="../views/create.php">Publier</a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class='nav-item'>
                  <a class='nav-link' href='../views/register.php'>
                    S'inscrire
                  </a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link active' aria-current="page" href='../views/login.php'>
                    Se connecter
                  </a>
                </li>

              </ul>

          </div>
        </div>
      </nav>
    </header>

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

    $userController = new UserController();
    $users = $userController->getAll();
    

    

    if ($_POST) {
      foreach ($users as $user) {
        if ($user->getUsername() ===  $_POST["username"] && password_verify($_POST["password"], $user->getPassword())) {
          $_SESSION["username"] = $user->getUsername();
          echo "<script>window.location='../index.php'</script>";
        } else {
          echo "<p class='alert alert-danger'>L'utilisateur ou le mot de passe est incorrect</p>";
        }
      }
    }
    ?>

    <main>
      <h1>My Movies</h1>
      <h3 class="slogan">Découvrez et partagez des films !</h3>
      <div class=" w-100 h-100 mb-3 logo text-center">
        <img
          src="../images/camera.png"
          alt="Logo My Movies"
        />
      </div>

      <section class="container d-flex justify-content-center">

        <form action="" method="post">
          <label for="username" class="form-label">Nom d'utilisateur</label>
          <input class="form-control mb-3" type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required>
          <label for="password" class="form-label">Mot de passe</label>
          <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Votre mot de passe" required>

          <input class="btn btn-primary" type="submit" value="Connexion">
        </form>

      </section>

    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>