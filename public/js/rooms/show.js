const startInput = document.querySelector("#start__date");
const endInput = document.querySelector("#end__date");
let startDate = startInput.value;
let endDate = endInput.value;
const threedot = document.querySelectorAll(".bi-three-dots-vertical");
const dropdown = document.querySelectorAll(".dropdown");
const showall = document.querySelector("#show__all");
const review = document.querySelector(".review");
const rating = document.querySelector("#rating");
const review_box = document.querySelector("#review__form__container");
const review__detail = document.querySelector(".review__detail");
const review__form = document.querySelector("#review__form");
const toast = document.querySelector('.toast');
const init = new bootstrap.Toast(toast);

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
        review.classList.toggle("show_review");
    }, 250);
};

if (showall) {
    showall.addEventListener("click", showallreview);
}

let rating_val = 0;
function handler(e) {
    // remove this handler
    e.target.removeEventListener(e.type, arguments.callee);
    review_box.style.display = "block";
}

if (rating) {
    rating.addEventListener("change", handler);
    rating.addEventListener("change", new_select_element);
}

//auto height for review section if null
if (!review__detail) {
    review.style.height = "auto";
}

//create new select element
const select = document.createElement("SELECT");

function new_select_element(e) {
    rating_val = e.target.value;
    if (select.childElementCount > 0) {
        select.children[0].value = rating_val;
    } else {
        select.name = "rating";
        select.id = "new_rating";
        select.hidden = true;
        const option = document.createElement("OPTION");
        option.value = rating_val;
        select.append(option);
        review__form.append(select);
    }
}

//append to form

//toast appear
if(toast){
    init.show();
    }
