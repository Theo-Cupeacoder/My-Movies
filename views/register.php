<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Movies - Créer un compte</title>
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
                <li class="nav-item">
                  <a class="nav-link active"  aria-current="page"href="../views/register.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../views/login.php">Se connecter</a>
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

    if ($_POST) {
      if ($_POST["password"] === $_POST["confirmPassword"]) {
        unset($_POST["confirmPassword"]);
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newUser = new User($_POST);
        $userController->create($newUser);
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["email"] = $_POST["email"];
        echo "<script>window.location='../index.php'</script>";
      } else {
        echo "<p class='alert alert-danger'>Les mots de passe ne correspondent pas !</p>";
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

      <section class="container d-flex justify-content-center mt-3">
        <form action="" method="post">
          <legend class="my-3">Créer un compte utilisateur</legend>
          <label class="form-label" for="username">Nom d'utilisateur</label>
          <input class="form-control mb-3" type="text" name="username" id="username" placeholder="Nom d'utilisateur" required>
          <label class="form-label" for="email">E-mail</label>
          <input class="form-control mb-3" type="email" name="email" id="email" placeholder="Votre adresse e-mail" required>
          <label class="form-label" for="password">Mot de passe</label>
          <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Votre mot de passe" required>
          <label class="form-label" for="confirmPassword">Confirmez votre mot de passe</label>
          <input class="form-control mb-3" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmez votre mot de passe" required>
          <input type="submit" class="btn btn-primary mb-3" value="Créer un compte">
        </form>
      </section>

    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></scrip>
    <script src="./scripts/script.js"></script>
  </body>
</html>