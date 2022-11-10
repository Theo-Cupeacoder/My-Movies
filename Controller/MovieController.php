<?php

  require_once('./config/DotEnv.php');

  class MovieController {

    // Attributs
    private PDO $pdo;

    // Constructeur
    public function __construct() {
      try {
        (new DotEnv(__DIR__ . '/../.env'))->load();
        $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
      } catch (PDOException $error) {
        var_dump($error);
        echo "<p style='color: red'>$error</p>";
      }
      
    }

    // Méthodes

    public function setPdo(PDO $pdo) {
        $this->pdo = $pdo;
        return $this;
    }

    public function getAll(): array
    {
      $movies = [];
      $req = $this->pdo->query("SELECT * FROM `movie`");
      $data = $req->fetchAll();
      foreach ($data as $movie) {
        $movies[] = new Movie($movie);
      }
      return $movies;
    }

    public function get(int $id)//:Movie
    {
      # code...
    }

    public function create(Movie $newMovie): void
    {
      # code...
    }

    public function update(Movie $movie): void
    {
      # code...
    }

    public function delete(Movie $movie): void
    {
      # code...
    }
  }