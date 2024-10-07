document.addEventListener("DOMContentLoaded", function () {
  // Check if we are on the login page or the dashboard page
  if (window.location.pathname.includes("dashboard.php")) {
    loadDashboard();
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
              sessionStorage.setItem("userPassword", data.data.userPassword);

              // Redirect to dashboard
              window.location.href = "./dashboard.php";
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
          action: "getQuestions",
        }),
      });
  
      const response = await call.json();
      if (response.status === 200) {
        const questionsTable = document.getElementById("questions");
        questionsTable.innerHTML = ""; // Clear any existing content
  
        response.data.forEach((question) => {
          // Create a new row for each question
          const newRow = document.createElement("tr");
  
          // Create table cells for question, answer (placeholder), edit and delete actions
          const questionCell = document.createElement("td");
          questionCell.textContent = question.questionText;
  
          const answerCell = document.createElement("td");
          answerCell.textContent = "Answer Placeholder"; // You can populate this with actual answer data
  
          const editCell = document.createElement("td");
          const editLink = document.createElement("a");
          editLink.href = "#"; // Add a link to your edit page if needed
          editLink.textContent = "Edit";
          editCell.appendChild(editLink);
  
          const deleteCell = document.createElement("td");
          const deleteLink = document.createElement("a");
          deleteLink.href = "#"; // Add a link to delete function
          deleteLink.textContent = "Delete";
          deleteCell.appendChild(deleteLink);
  
          // Append all cells to the row
          newRow.appendChild(questionCell);
          newRow.appendChild(answerCell);
          newRow.appendChild(editCell);
          newRow.appendChild(deleteCell);
  
          // Append the new row to the table
          questionsTable.appendChild(newRow);
        });
      }
    } catch (error) {
      console.error("Fetch error:", error);
    }
  }
  

function logOut() {
  // Clear session data
  sessionStorage.removeItem("userEmail");
  sessionStorage.removeItem("userName");
    sessionStorage.removeItem("userPassword");

  // Redirect to login page
  window.location.href = "./index.php";
}

// Function to load dashboard information
function loadDashboard() {
  const userName = sessionStorage.getItem("userName");

  if (userName) {
    // Display user name on the dashboard
    document.querySelector(".profile").innerHTML = `${userName}`;
    document.querySelector(
      ".welcome"
    ).innerHTML = `<h3>Welcome, ${userName}!</h3>`;
  } else {
    // Redirect to login page if no user is logged in
    alert("You are not logged in. Please log in to access this page.");
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
