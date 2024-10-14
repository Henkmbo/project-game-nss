<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
<link rel="stylesheet" href="./styling/younes.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./uitleg.php">Instructies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="memory.php">Memory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">log in</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
<section class="hero">
        <h1>Welkom bij onze Memory Game!</h1>
        <p>Test je kennis met het klassieke memory spel.</p>
    </section>

   
    <section class="boxes">
        <div class="box">
        <img  src="./afbeeldingen/memory.jpg">
            <h2>Speel nu</h2>
            <p>Test je kennis over Backend Development door een uitdagend Memory spel te spelen. 
            Match de kaarten met termen zoals databases, API's, server-side programming, en meer.
            Ontdek hoe goed je de kernconcepten begrijpt en verbeter je vaardigheden tijdens het spel</p>
    
            <a href="./memory.php" class="play-btn">Speel nu</a>
        </div>

    
        <div class="box">
        <img src="./afbeeldingen/instructies.png" class="image2" >
            <h2>Instructies</h2>
            <p>Het doel van dit Memory spel is om alle paren van backend-technologieën te matchen. 
            Klik op een kaart om deze te onthullen en zoek naar de bijbehorende term. Wil je meer 
            leren over deze technologieën? Klik hieronder voor een uitgebreide uitleg!</p>
            <a href="./uitleg.php" class="learn-btn">Lees meer</a>
        </div>
    </section>
    <a href="./login.php">Login</a>
    <a href="./uitleg.php">Uitleg</a>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>