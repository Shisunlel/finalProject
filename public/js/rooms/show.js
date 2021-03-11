const startInput = document.querySelector("#start__date");
const endInput = document.querySelector("#end__date");
let startDate = startInput.value;
let endDate = endInput.value;
const threedot = document.querySelectorAll(".bi-three-dots-vertical");
const dropdown = document.querySelectorAll(".dropdown");
const showall = document.querySelector("#show__all");
const review = document.querySelector(".review");

startInput.addEventListener("change", date_input);

function date_input() {
    startDate = startInput.value;
    endInput.removeAttribute("disabled");
    date = new Date(startDate);
    endDate =
        date.getFullYear() +
        "-" +
        ("0" + (date.getMonth() + 1)).slice(-2) +
        "-" +
        ("0" + date.getDate()).slice(-2);
    endInput.value = "";
    endInput.setAttribute("min", endDate);
}

threedot.forEach((dot) => {
    dot.addEventListener("click", () => {
        dot.classList.toggle("fill");
        dot.nextElementSibling.classList.toggle("show");

        document.addEventListener("click", (e) => {
            let clickArea = dot.contains(e.target);
            if (!clickArea) {
                dissappear();
            }
        });

        let dissappear = () => {
            setTimeout(() => {
                dot.nextElementSibling.classList.remove("show");
                dot.classList.remove("fill");
            }, 100);
        };
    });
});

let showallreview = () => {
    setTimeout(() => {
        review.classList.add("show_review");
    }, 250);
};

showall.addEventListener("click", showallreview);
