<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memry</title>
    <link rel="stylesheet" href="./styling/memory.css">
</head>
<body>
    <div class="container">
        <h2 class="heading">Memory Game</h2>
        <div class="cards">
            <div class="card" question="1">
                <div class="img">vraag 1</div>
            </div>
            <div class="card" question="2">
                <div class="img">vraag 2</div>
            </div>
            <div class="card" question="3">
                <div class="img">vraag 3</div>
            </div>
            <div class="card" question="4">
                <div class="img">vraag 4</div>
            </div>
            <div class="card" question="4">
                <div class="img">antwoord 4</div>
            </div>
            <div class="card" question="1">
                <div class="img">antwoord 1</div>
            </div>
            <div class="card" question="2">
                <div class="img">antwoord 2</div>
            </div>
            <div class="card" question="3">
                <div class="img">antwoord 3</div>
            </div>
        </div>
    </div>

    <script>
        let counter = 0;
        let firstSelection = "";
        let secondSelection = "";

        const cards = document.querySelectorAll(".cards .card");
        cards.forEach((card) => {
            card.addEventListener("click", () => {
                card.classList.add("clicked");

                if(counter === 0) {
                    firstSelection = card.getAttribute("question");
                    counter++;
                } else {
                    secondSelection = card.getAttribute("question");
                    counter = 0;

                    if(firstSelection === secondSelection){
                        const correctCards = document.querySelectorAll(
                            ".card[question='" + firstSelection +"']"
                        );

                        correctCards[0].classList.add("checked");
                        correctCards[0].classList.remove("clicked");
                        correctCards[1].classList.add("checked");
                        correctCards[1].classList.remove("clicked");
                    } else {
                        const incorrectCards = document.querySelectorAll(".card.clicked");

                        incorrectCards[0].classList.add("shake");
                        incorrectCards[1].classList.add("shake");

                        setTimeout(() => {
                            incorrectCards[0].classList.remove("shake");
                            incorrectCards[0].classList.remove("clicked");
                            incorrectCards[1].classList.remove("shake");
                            incorrectCards[1].classList.remove("clicked");
                        }, 800);
                    }
                }
            })
        });
    </script>

</body>
</html>

