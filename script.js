document.addEventListener("DOMContentLoaded", function () {

  if (window.location.pathname.includes("dashboard.php")) {
    loadDashboard();
    loadNavbar();  
    amountOfUsers();
    amountOfMemory();
  } else if (window.location.pathname.includes("profile.php")) {
    loadProfile();
    loadNavbar();  
  } else if (window.location.pathname.includes("profile-edit.php")) {
    loadNavbar();  
    loadProfile();
  } else if (window.location.pathname.includes("index.php")) {
    loadNavbar();  
  } else if (window.location.pathname.includes("login.php")) {
    setupLogin();  
  }
});

// Function to set up the login form behavior
function setupLogin() {
  document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      // Check if email and password are provided
      if (email && password) {
        fetch("./ajax.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            scope: "auth",
            action: "login",
            email: email,
            password: password,
          }),
        })
          .then((response) => {
            console.log("Response:", response); // Log the response object
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
          })
          .then((data) => {
            if (data.status === 200) {
              // Store session data in sessionStorage
              sessionStorage.setItem("userEmail", data.data.userEmail);
              sessionStorage.setItem("userName", data.data.userName);
              sessionStorage.setItem("userLastname", data.data.userLastname);
              sessionStorage.setItem("userPassword", data.data.userPassword);


              // Redirect to dashboard
              window.location.href = "./admin_memory/dashboard.php";
            } else {
              // Show error message
              showMessage(data.message, "error");
            }
          })
          .catch((error) => {
            console.error("Error:", error); // Log the error
            showMessage("An error occurred. Please try again later.", "error");
          });
      } else {
        showMessage("Please fill in all fields", "error");
      }
    });
}



async function getQuestions() {
    try {
        const call = await fetch("../ajax.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                scope: "memory",
                action: "getMemory",
            }),
        });

        const response = await call.json();
        if (response.status === 200) {

          
          let questions = response.data.questions;
          let answers = response.data.answers;

          const getQuestions = questions.map(question => question.questionText);
          const getAnswers = answers.map(answer => answer.answerText);

          let container = document.querySelector(".test");

          let htmlContent = '';

          getQuestions.forEach((question, index) => {
            
          let correspondingAnswer = getAnswers[index];

            htmlContent += `
              <div class="row body">
                <div class="col4"><div class="content">${question}</div></div>
                <div class="col4"><div class="content">${correspondingAnswer}</div></div> <!-- Antwoord in tweede col4 -->
                <div class="col2"><div class="content"><a class="edit"><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="#161a2d"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></a></div></div>
                <div class="col2"><div class="content"><a class="delete"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#161a2d"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg></a></div></div>
              </div>
            `;
          });

          container.innerHTML = htmlContent;
          
        }
        
    } catch (error) {
        console.error("Fetch error:", error);
    }
}


function logOut() {
  // Clear session data
  sessionStorage.removeItem("userEmail");
  sessionStorage.removeItem("userName");
  sessionStorage.removeItem("userLastname");
  sessionStorage.removeItem("userPassword");

  // Redirect to login page
  window.location.href = "../index.php";
}

async function amountOfUsers() {
  try {
      const call = await fetch("../ajax.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              scope: "auth",
              action: "amountOfUsers",
          }),
      });

      const response = await call.json();
      if (response.status === 200) {
        document.querySelector(".amountOfUsers").innerHTML = response.data.amountOfUsers;
      }
      
  } catch (error) {
      console.error("Fetch error:", error);
  }
}


async function amountOfMemory() {
  try {
      const call = await fetch("../ajax.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              scope: "auth",
              action: "amountOfMemory",
          }),
      });

      const response = await call.json();
      if (response.status === 200) {
        document.querySelector(".amountOfMemory").innerHTML = response.data.amountOfMemory * 2;
      }
      
  } catch (error) {
      console.error("Fetch error:", error);
  }
}



// Functie om dashboardinformatie te laden
function loadDashboard() {  
  const userName = sessionStorage.getItem("userName");

  if (userName) {
      document.querySelector(".welcome").innerHTML = `<h3>Welkom, ${userName}!</h3>`;
  } else {
      alert("Je bent niet ingelogd. Log in om deze pagina te openen.");
      window.location.href = "./index.php";
  }
}

function loadNavbar() {
  const userName = sessionStorage.getItem("userName");
  const userLastname = sessionStorage.getItem("userLastname");

  if (userName) {
    document.querySelector(".navbar-profile-name").innerHTML = `${userName} ${userLastname}`;
    } else {
    alert("Je bent niet ingelogd. Log in om deze pagina te openen.");
    window.location.href = "./index.php";
}
}

// Functie om profiel informatie te laden
function loadProfile() {  
  const userName = sessionStorage.getItem("userName");
  const userLastname = sessionStorage.getItem("userLastname");
  const userEmail = sessionStorage.getItem("userEmail");
  const userPassword = sessionStorage.getItem("userPassword");

  if (userName) {
    document.querySelector(".loadprofile").innerHTML = `
                        <div class="row">
                          <div class="col6">
                              <div class="title p-b-10">
                                  Voornaam:
                              </div>
                              <div class="content">
                                ${userName}
                              </div>
                          </div>
                          <div class="col6">
                              <div class="title p-b-10">
                                  Achternaam:
                              </div>
                              <div class="content">
                                ${userLastname}
                              </div>
                          </div>
                          <div class="col12 p-t-20">
                              <div class="title p-b-10">
                                  Emailadres:
                              </div>
                              <div class="content">
                                ${userEmail}
                              </div>
                          </div>
                          <div class="col12 p-t-20">
                              <div class="title p-b-10">
                                  Wachtwoord:
                              </div>
                              <div class="content">
                                ${userPassword}
                              </div>
                          </div>
                      </div>
    `;
  } else {
    alert("Je bent niet ingelogd. Log in om deze pagina te openen.");
    window.location.href = "./index.php";
  }

  
}


// Function to show toast messages
function showMessage(message, type) {
  Toastify({
    text: message,
    duration: 3000,
    close: true,
    gravity: "top",
    position: "center",
    backgroundColor: type === "error" ? "red" : "green",
  }).showToast();
}
getQuestions();

async function getQuestionsMemory() {
  try {
      const call = await fetch("./ajax.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              scope: "memory",
              action: "getMemory",
          }),
      });

      const response = await call.json();
      if (response.status === 200) {
        
        let questions = response.data.questions;
        let answers = response.data.answers;

        const amountOfMemory = questions.length + answers.length;
        
    
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]]; 
            }
        }
  
        let combinedCards = [];
        for (let i = 0; i < questions.length; i++) {
            combinedCards.push({ type: 'question', id: i + 1, text: questions[i].questionText });
            combinedCards.push({ type: 'answer', id: i + 1, text: answers[i].answerText });
        }
    
        shuffleArray(combinedCards);
    
        let cardsHtml = '';
        combinedCards.forEach(card => {
            cardsHtml += `
                <div class="card" question="${card.id}">
                    <div class="img">${card.text}</div>
                </div>
            `;
        });
    
        document.querySelector(".cards").innerHTML = cardsHtml;
    
        addCardEventListeners();
      }
  } catch (error) {
      console.error("Fetch error:", error);
  }
}
let confettiTimeout; // Variable to store the timeout ID

async function addCardEventListeners() {
  const call = await fetch("./ajax.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
        scope: "memory",
        action: "getMemory",
    }),
});

const response = await call.json();
if (response.status === 200) {
  
  let questions = response.data.questions;
  let answers = response.data.answers;

  const amountOfMemory = questions.length + answers.length;

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
      if (document.querySelectorAll(".checked").length === amountOfMemory) {
        confettiTimeout = setTimeout(confetti, 100); // Start confetti after 100 ms
      
        // Stop the confetti after 10 seconds
        setTimeout(() => {
          clearTimeout(confettiTimeout); // Clear the timeout if the confetti hasn't started yet
          // Optionally, you can add logic to stop the confetti if it's currently running
        }, 5000); // 10 seconds
      }
  });
  });
}
}

function confetti(){
  let W = window.innerWidth;
let H = window.innerHeight;
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const maxConfettis = 150;
const particles = [];

const possibleColors = [
  "DodgerBlue",
  "OliveDrab",
  "Gold",
  "Pink",
  "SlateBlue",
  "LightBlue",
  "Gold",
  "Violet",
  "PaleGreen",
  "SteelBlue",
  "SandyBrown",
  "Chocolate",
  "Crimson"
];

function randomFromTo(from, to) {
  return Math.floor(Math.random() * (to - from + 1) + from);
}

function confettiParticle() {
  this.x = Math.random() * W; // x
  this.y = Math.random() * H - H; // y
  this.r = randomFromTo(11, 33); // radius
  this.d = Math.random() * maxConfettis + 11;
  this.color =
    possibleColors[Math.floor(Math.random() * possibleColors.length)];
  this.tilt = Math.floor(Math.random() * 33) - 11;
  this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
  this.tiltAngle = 0;

  this.draw = function() {
    context.beginPath();
    context.lineWidth = this.r / 2;
    context.strokeStyle = this.color;
    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
    context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 5);
    return context.stroke();
  };
}

function Draw() {
  const results = [];

  // Magical recursive functional love
  requestAnimationFrame(Draw);

  context.clearRect(0, 0, W, window.innerHeight);

  for (var i = 0; i < maxConfettis; i++) {
    results.push(particles[i].draw());
  }

  let particle = {};
  let remainingFlakes = 0;
  for (var i = 0; i < maxConfettis; i++) {
    particle = particles[i];

    particle.tiltAngle += particle.tiltAngleIncremental;
    particle.y += (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
    particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

    if (particle.y <= H) remainingFlakes++;

    // If a confetti has fluttered out of view,
    // bring it back to above the viewport and let if re-fall.
    if (particle.x > W + 30 || particle.x < -30 || particle.y > H) {
      particle.x = Math.random() * W;
      particle.y = -30;
      particle.tilt = Math.floor(Math.random() * 10) - 20;
    }
  }

  return results;
}

window.addEventListener(
  "resize",
  function() {
    W = window.innerWidth;
    H = window.innerHeight;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  },
  false
);

// Push new confetti objects to `particles[]`
for (var i = 0; i < maxConfettis; i++) {
  particles.push(new confettiParticle());
}

// Initialize
canvas.width = W;
canvas.height = H;
Draw();

}
getQuestionsMemory();
