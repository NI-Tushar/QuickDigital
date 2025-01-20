
<link rel="stylesheet" href="{{ url ('front/styles/loader.css') }}">

<div id="loader_section" class="loader_section">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <img src="{{ asset('front/assets/images/favicon.png') }}" alt="">
</div>

<script>
function showLoader() {
    let loader = document.getElementById("loader_section");
    loader.style.display = "flex"; // Show the loader

    // Hide the loader smoothly after 2 seconds
    setTimeout(function () {
        loader.classList.add("hide"); // Apply the "hide" class for smooth fade-out
        setTimeout(() => {
            loader.style.display = "none"; // Fully hide the loader after fade-out
        }, 500); // Match the transition duration in CSS
    },1000);
}

// Call the function
showLoader();
</script>