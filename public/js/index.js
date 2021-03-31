const faders = document.querySelectorAll(".fade-in");
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);
const slider = document.getElementById("guest");
const output = document.getElementById("slider__indicator");

const appearOptions = {
    threshold: 0,
    rootMargin: "0px 0px -225px 0px",
};

const appearOnScroll = new IntersectionObserver(function (
    entries,
    appearOnScroll
) {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add("appear");
            appearOnScroll.unobserve(entry.target);
        }
    });
},
appearOptions);

faders.forEach((fader) => {
    appearOnScroll.observe(fader);
});

//slider indicator
if (output) {
    output.innerHTML = slider.value;
}

if (slider) {
    slider.oninput = function () {
        output.innerHTML = this.value;
    };
}

//toast appear
if (toast) {
    init.show();
}
