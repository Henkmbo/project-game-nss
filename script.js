document.addEventListener("DOMContentLoaded", () => {
    async function Login(event) {
        event.preventDefault(); // Prevent form from submitting and reloading the page
        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        try {
            const call = await fetch("ajax.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    scope: "auth",
                    action: "login",
                    email: email, // Send the email and password with the request
                    password: password
                }),
            });
            const response = await call.json();

            if (response.status === 200 && response.data) {
                // Assuming the data contains user information from the database
                if (response.data.userEmail === email && response.data.userPassword === password) {
                    // Redirect to the dashboard page
                    window.location.href = "dashboard.php";
                }
            } else {
                console.error("Error login:", response.message);
                Toastify({
                    text: "Wrong email or password",
                    duration: 3000,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "red",
                    },
                    onClick: function(){} // Callback after click
                  }).showToast();
            }
        } catch (error) {
            console.error("Fetch error:", error);
        }
    }

    // Attach the Login function to the form submission event
    const loginForm = document.querySelector("#loginForm");
    loginForm.addEventListener("submit", Login);
});
