<div class="notific_section" id="notific_section">
    <p>New Order placed</p>
</div>

<style>
    .notific_section {
        transform: translateX(120%); 
        opacity: 0;

        background-color: rgb(218, 255, 7);
        height: auto;
        width: auto;
        position: fixed;
        top: 70px;
        right: 25px;
        z-index: 1500;
        padding: 10px;
        border-radius: 7px;
        border: 2px solid green;
        transition: transform 0.5s ease, opacity 0.5s ease; /* Smooth transition */
    }

    .notific_section p {
        font-weight: 700;
        padding: 0;
        margin: 0;
        color: green;
    }

    /* When the section is visible */
    .notific_section.show {
        transform: translateX(0);
        opacity: 1;
    }
</style>

<script>
    // Function to show the notification
    function showNotification() {
        const notification = document.getElementById('notific_section');
        notification.classList.add('show'); // Add the 'show' class
        setTimeout(() => {
            hideNotification(); // Hide notification after 3 seconds
        }, 6000);
    }

    // Function to hide the notification
    function hideNotification() {
        const notification = document.getElementById('notific_section');
        notification.classList.remove('show'); // Remove the 'show' class
    }

    // Example: Show the notification on page load
    window.onload = function () {
        showNotification();
    };
</script>
