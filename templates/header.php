<?php
session_start();
?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <title>Startseite | Lego Shop</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/default/index">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
            echo '<li class="nav-item">
                <a class="nav-link" href="/shop/index">Shop</a>
              </li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="/user">User</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
                echo '<a class="dropdown-item" href="/user/registration">Bearbeitung</a>';
              } else {
                echo '<a class="dropdown-item" href="/user/registration">Registration</a>';
              }
              ?>
              <div class="dropdown-divider"></div>
              <?php
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
                echo '<a class="dropdown-item" href="/user/doLogout">Abmelden</a>';
              } else {
                echo '<a class="dropdown-item" href="/user/login">Anmelden</a>';
              }
              ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="container">