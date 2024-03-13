document.addEventListener("DOMContentLoaded", function () {
    var linksToAnimate = document.querySelectorAll(".load-animation-link");

    linksToAnimate.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent the default link behavior
            document.body.classList.add("page-loading");

            // Remove the loading class when the content has loaded
            window.addEventListener("DOMContentLoaded", function () {
                document.body.classList.remove("page-loading");
            });
        });
    });

    // Use this if you still want the loading animation on beforeunload
    window.addEventListener("beforeunload", function () {
        document.body.classList.add("page-loading");
    });
});
