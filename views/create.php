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
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Publier</a>
              </li>
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
      
        <label class="form-label" for="synopsis">Synopsis</label>
        <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="10" placeholder="Le résumé du film"></textarea>
      
        <label class="form-label" for="imageUrl">Image</label>
        <input class="form-control" type="url" name="imageUrl" id="imageUrl" placeholder="L'URL de l'image du film">

        <label class="form-label" for="releaseDate">Date de sortie</label>
        <input class="form-control" type="date" name="releaseDate" id="releaseDate">

        <label class="form-label" for="director">Réalisateur</label>
        <input type="text" name="director" id="director" placeholder="Le réalisateur du film">

        <label class="form-label" for="category">Catégorie</label>
        <select class="form-select" name="category" id="category">
          <option value="" selected>--Sélectionnez une catégorie--</option>
          <option value="1">Horreur</option>
          <option value="2">Drame</option>
          <option value="3">Comédie</option>
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
</html>
