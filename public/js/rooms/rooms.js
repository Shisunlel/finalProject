const navButton = document.querySelector(".navbar-toggler");
const navCollapse = document.querySelector(".navbar-collapse");
let slider = document.getElementById("guest");
let output = document.getElementById("slider__indicator");
let slider_sm = document.getElementById("guest_sm");
let output_sm = document.getElementById("slider__indicator_sm");

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
if (typeof(guest_val) != 'undefined') {
    output.innerHTML = guest_val;
    output_sm.innerHTML = guest_val;
} else {
    output.innerHTML = slider.value;
    output_sm.innerHTML = slider_sm.value;
}
slider.value = Number(output.innerHTML);

slider.oninput = function () {
    output.innerHTML = this.value;
    slider.value = this.value;
};

//slider indicator sm
slider_sm.value = Number(output_sm.innerHTML);

slider_sm.oninput = function () {
    output_sm.innerHTML = this.value;
    slider_sm.value = this.value;
};
