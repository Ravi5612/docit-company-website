document.querySelectorAll(".dropdown-toggle").forEach(function (menu) {
    menu.addEventListener("click", function (e) {
        e.preventDefault();

        let parent = this.parentElement;

        parent.classList.toggle("active");
    });
});
