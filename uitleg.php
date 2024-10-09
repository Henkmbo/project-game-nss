<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speluitleg</title>
    <link rel="stylesheet" href="./styling/uitleg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./uitleg.php">Instructies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="memory.php">Memomry</a>
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
</header>
<body>
    <div class="boven">
        <h1><b>Memory Speluitleg</b></h1>
    </div>
    <section class="boxes">
    <div class="basis">
        <h1><b>Memory! Het spel waar je geheugen getest wordt. Simpel maar effectief.</b></h1>
        <h2>Durf jij je kennis te testen?
        <h2> Aantal spelers: 1 <br><br>

<b>Doel van het spel:</b><br><br>
Het doel van Memory is om zoveel mogelijk paren van dezelfde kaarten te vinden en op te slaan in je verzameling.
<br><br>
<b>Spelverloop:</b><br>
Het spelbord verschijnt online met een aantal kaarten die met de achterkant naar boven liggen. Het aantal kaarten varieert per spel, afhankelijk van het niveau of de instellingen.
<br><br></h2>
<img  src="./afbeeldingen/memory.jpg" id="afb">
</div>
<div class="basis">
<h2>De eerste speler klikt op twee kaarten om deze om te draaien en de afbeeldingen zichtbaar te maken:
Als de kaarten een paar vormen (dezelfde afbeelding of tekst), blijven de kaarten omgedraaid en worden aan de verzameling van de speler toegevoegd. De speler mag daarna opnieuw twee kaarten omdraaien.
<br>Als de kaarten niet overeenkomen, draaien ze automatisch terug naar hun oorspronkelijke positie (met de achterkant naar boven).
Onthouden is de sleutel: Probeer te onthouden welke kaarten je hebt omgedraaid, zodat je bij je volgende beurt gemakkelijker een paar kunt vinden.
<br>
Het spel gaat door totdat alle paren zijn gevonden.
<br><br>
<b>Einde van het spel:</b><br>
Wanneer alle paren zijn gevonden, wordt het spel automatisch beëindigd en krijgt elke speler het aantal behaalde paren te zien. De speler met de meeste paren wint.
<br>
<h2><b>Veel plezier met het online Memory spel!</b></h2></h2>
<button class="home-btn" onclick="window.location.href = 'index.php';">HOME</button>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>