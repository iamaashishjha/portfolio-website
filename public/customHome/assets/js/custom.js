
function openNav() {
    document.getElementById("mySidebar").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}

function openSearchBox() {
    document.getElementById("main-search-box").style.display = "block";
}

function closeSearchBox() {
    document.getElementById("main-search-box").style.display = "none";
}


var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
