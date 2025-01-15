<style>
.loader_section {
  margin: 0;
  padding: 0;
  display: none;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100%;
  /* background: var(--primary-color); */
  background-color:aliceblue;
  position: fixed;
  top:0px;
  left:0px;
  z-index: 2000 !important;
  opacity: 1;
  transition: opacity 0.5s ease; /* Smooth fade-out transition */
}

.loader_section.hide {
    opacity: 0; /* Fully transparent */
    pointer-events: none; /* Disable interaction */
}


.loader {
  margin:auto;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background: linear-gradient(rgb(225, 33, 68), #C1FF72);
  animation: animate 0.5s linear infinite;
}

@keyframes animate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.loader span {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: linear-gradient( #C1FF72, rgb(225, 33, 68), #C1FF72, #c21ac2);
}
/* 
.loader span:nth-child(1){
  filter: blur(5px);
}

.loader span:nth-child(2){
  filter: blur(10px);
}

.loader span:nth-child(3){
  filter: blur(25px);
}

.loader span:nth-child(4){
  filter: blur(50px);
} */

.loader:after {
  content: '';
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: #240229;
  border-radius: 50%;
}
.loader_section img{
    position: absolute;
    height:180px;
    width:180px;
    border-radius:50%;
}
</style>

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