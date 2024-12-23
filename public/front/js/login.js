// ____________________________ toggle password show for login acc
document.getElementById("passwordInput").addEventListener("click", function () {
    const passwordInput = document.getElementById("passInput");
    const isPasswordVisible = passwordInput.getAttribute("type") === "text";

    // Toggle the input type
    passwordInput.setAttribute("type", isPasswordVisible ? "password" : "text");

    // Optional: Change the icon (e.g., open eye vs closed eye)
    this.innerHTML = isPasswordVisible
        ? `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
            <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
          </svg>`
        : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
            <path d="M17.94 11.08c-2.25-3.19-5.69-5.08-9.94-5.08C4.59 6 2.33 7.47 1 9.76c1.74 2.96 4.53 5.13 7.94 5.92-.26-.45-.4-.95-.4-1.47 0-2.21 1.79-4 4-4 .51 0 1 .14 1.47.4 2.59-1.07 4.47-3.53 5.93-6.61zm-6.94 5.92c-2.21 0-4 1.79-4 4 0 .51.14 1 .4 1.47C7.13 19.54 4.26 17.33 2 14c1.24-1.84 3.27-3.36 5.94-4.32.67.28 1.34.5 2.06.63-.42.66-.68 1.44-.68 2.25 0 2.21 1.79 4 4 4z"/>
          </svg>`;
});


// ____________________________ toggle password show for create acc
document.getElementById("create_passwordInput").addEventListener("click", function () {
    const passwordInput = document.getElementById("create_passInput");
    const isPasswordVisible = passwordInput.getAttribute("type") === "text";

    // Toggle the input type
    passwordInput.setAttribute("type", isPasswordVisible ? "password" : "text");

    // Optional: Change the icon (e.g., open eye vs closed eye)
    this.innerHTML = isPasswordVisible
        ? `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
            <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
          </svg>`
        : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
            <path d="M17.94 11.08c-2.25-3.19-5.69-5.08-9.94-5.08C4.59 6 2.33 7.47 1 9.76c1.74 2.96 4.53 5.13 7.94 5.92-.26-.45-.4-.95-.4-1.47 0-2.21 1.79-4 4-4 .51 0 1 .14 1.47.4 2.59-1.07 4.47-3.53 5.93-6.61zm-6.94 5.92c-2.21 0-4 1.79-4 4 0 .51.14 1 .4 1.47C7.13 19.54 4.26 17.33 2 14c1.24-1.84 3.27-3.36 5.94-4.32.67.28 1.34.5 2.06.63-.42.66-.68 1.44-.68 2.25 0 2.21 1.79 4 4 4z"/>
          </svg>`;
});
