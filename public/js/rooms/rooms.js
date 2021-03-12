const sticky = document.querySelector("#sticky-fluid");
const footer = document.querySelector("footer");
const navButton = document.querySelector(".navbar-toggler");
const navCollapse = document.querySelector(".navbar-collapse");
let slider = document.getElementById("guest");
let output = document.getElementById("slider__indicator");
let slider_sm = document.getElementById("guest_sm");
let output_sm = document.getElementById("slider__indicator_sm");

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

// close navbar when click outside
document.addEventListener("click", (e) => {
    let clickArea = navButton.contains(e.target);
    if (!clickArea) {
       dissappear();
    }
});

let dissappear = () => {
    setTimeout(() => {
        navCollapse.classList.remove("show");
    }, 250);
};

//slider indicator
output.innerHTML = slider.value;
slider.value = Number(output.innerHTML);

slider.oninput = function() {
  output.innerHTML = this.value;
  slider.value = this.value;
}

//slider indicator sm
output_sm.innerHTML = slider_sm.value;
slider_sm.value = Number(output_sm.innerHTML);

slider_sm.oninput = function() {
  output_sm.innerHTML = this.value;
  slider_sm.value = this.value;
}

