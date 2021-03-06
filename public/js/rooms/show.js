const startInput = document.querySelector("#start__date");
const endInput = document.querySelector("#end__date");
let startDate = startInput.value;
let endDate = endInput.value;
let duration = 1;
let cost = 0;
let chevron = '';
const cost_input = document.querySelector("#total_cost");
const span_cost = document.querySelector("#cost");
const span_duration = document.querySelector("#duration");
const dur = document.querySelector("#dur");
const threedot = document.querySelectorAll(".bi-three-dots-vertical");
const dropdown = document.querySelectorAll(".dropdown");
const showall = document.querySelector("#show__all");
const review = document.querySelector(".review");
const rating = document.querySelector("#rating");
const review_box = document.querySelector("#review__form__container");
const review__detail = document.querySelector(".review__detail");
const review__form = document.querySelector("#review__form");
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);

span_duration.innerText = duration + " day";
dur.value = duration;
span_cost.innerText = cost;
cost_input.value = cost;
startInput.addEventListener("change", date_input);
endInput.addEventListener("change", () => {
    endDate = endInput.value;
    getDuration();
    duration > 1
        ? (span_duration.innerText = duration + " days")
        : (span_duration.innerText = duration + " day");
    cost = (duration * room).toFixed(2);
    span_cost.innerText = cost;
    cost_input.value = cost;
    dur.value = duration;
});

function date_input() {
    startDate = startInput.value;
    endInput.removeAttribute("disabled");
    date = new Date(startDate);
    endDate =
        date.getFullYear() +
        "-" +
        ("0" + (date.getMonth() + 2)).slice(-2) +
        "-" +
        ("0" + date.getDate()).slice(-2);
    endInput.value = "";
    endInput.setAttribute("min", endDate);
}

function getDuration() {
    date1 = new Date(startDate);
    date2 = new Date(endDate);
    diffInTime = date2.getTime() - date1.getTime();
    duration = diffInTime / (1000 * 3600 * 24);
    return duration;
}

threedot.forEach((dot) => {
    dot.addEventListener("click", () => {
        dot.classList.toggle("fill");
        dot.nextElementSibling.classList.toggle("shows");

        document.addEventListener("click", (e) => {
            let clickArea = dot.contains(e.target);
            if (!clickArea) {
                dissappear();
            }
        });

        let dissappear = () => {
            setTimeout(() => {
                dot.nextElementSibling.classList.remove("shows");
                dot.classList.remove("fill");
            }, 100);
        };
    });
});

let showallreview = () => {
    chevron = document.querySelector(".fa-chevron-down");
    if(click % 2 != 0){
        chevron.style.transform = 'rotate(180deg)';
    }else{
        chevron.style.transform = 'rotate(0)';
    }
    click++;
    setTimeout(() => {
        review.classList.toggle("show_review");
    }, 250);
};

if (showall) {
    click = 1;
    showall.addEventListener("click", showallreview);
}

let rating_val = 0;
function handler(e) {
    // remove this handler
    e.target.removeEventListener(e.type, arguments.callee);
    review_box.style.display = "block";
}

if (rating) {
    rating.addEventListener("change", new_select_element);
}

//auto height for review section if null
if (!review__detail) {
    review.style.height = "auto";
}

//create new select element
const select = document.createElement("SELECT");

function new_select_element(e) {
    handler(e);
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
if (toast) {
    init.show();
}