const sticky = document.querySelector("#sticky-fluid");
const footer = document.querySelector("footer");

if (sticky) {
    window.addEventListener("scroll", function (e) {
        let pageHeight = window.screen.height;
        let scrollY = window.scrollY;
        let minimumHeight = pageHeight - pageHeight * 0.8;
        let footerPos = footer.offsetTop;
        let fadeAgain = footerPos - scrollY;
        if (scrollY > minimumHeight) {
            sticky.classList.remove("sticky-hide");
            sticky.classList.add("sticky-show");
        } else {
            sticky.classList.add("sticky-hide");
            sticky.classList.remove("sticky-show");
        }
        if (fadeAgain <= 800) {
            sticky.classList.remove("sticky-show");
            sticky.classList.add("sticky-hide");
        }
    });
}