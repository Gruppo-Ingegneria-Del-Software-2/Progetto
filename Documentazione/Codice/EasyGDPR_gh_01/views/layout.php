<DOCTYPE html>
<html>
  <head>
  <link type="text/css" href="src/index.css" rel="stylesheet">
  <script type="text/javascript" src="src/index.js"></script>

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="?controller=pages&action=home">
              <img src="src/cropped-logo-png.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <ul class="collapse navbar-collapse justify-content-end navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href='?controller=pages&action=home'>Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href='?controller=events&action=index'>Calendario</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href='?controller=pages&action=search_events'>Eventi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href='?controller=users&action=index'>Interessati</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href='?controller=pages&action=manual'>Manuale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href='?controller=pages&action=contatto'>Contatto</a>
                </li>
              </ul>
            </div>

          </nav>
    </header>
    <div class="main">
      <div class="container first-container">
      <?php require_once('routes.php'); ?>
      </div>
    </div>

    <footer>
    </footer>
  <body>
<html>