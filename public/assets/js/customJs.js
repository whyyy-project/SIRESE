var topButton = document.getElementById("topButton");
var scrolling = false;

window.addEventListener("scroll", function() {
    if (window.pageYOffset > 0 && !scrolling) {
        topButton.style.display = "block";
        topButton.style.animation = "showIn 0.8s ease-in";
    } else {
        topButton.style.animation = "showOut 0.8s ease-in";

        // Gunakan setTimeout daripada setInterval untuk menghindari multiple timers
        setTimeout(function() {
            topButton.style.display = "none";
        }, 800);
    }
});

function scrollToTop() {
    if (scrolling) return;
    scrolling = true;
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

    // Setelah selesai menggulir ke atas, jalankan showOut
    setTimeout(function() {
        topButton.style.animation = "showOut 0.8s ease-in";
        setTimeout(function() {
            topButton.style.display = "none";
            scrolling = false;
        }, 800);
    }, 800);
}

        /*Toggle dropdown list*/
function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }

        // Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (
                !event.target.matches(".drop-button") &&
                !event.target.matches(".drop-search")
            ) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains("invisible")) {
                        openDropdown.classList.add("invisible");
                    }
                }
            }
};

 // Fungsi untuk membuka modal
 function logoutModal() {
    var modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
}

// Fungsi untuk menutup modal
function closeModal() {
    var modal = document.getElementById('logoutModal');
    modal.classList.add('hidden');
}