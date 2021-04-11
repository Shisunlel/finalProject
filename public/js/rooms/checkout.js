const edit = document.querySelectorAll(".action__link");
const add = document.querySelectorAll(".add");
const dob = document.querySelector('input[name="dob"]');
const check = document.querySelector('button[type="submit"]');
const toast = document.querySelector(".toast");
const guest = document.querySelector('#guest');
const init = new bootstrap.Toast(toast);
const card = document.querySelector('#💳');

$(edit).click(function () {
    text = $(this).children().text();
    $(this)
        .children()
        .text(text == "Edit" ? "Cancel" : "Edit");
    $(this).prevAll().toggleClass("hidden");
});

$(add).click(function () {
    text = $(this).text();
    $(this).text(text == "Add" ? "Cancel" : "Add");
    $(this).prevAll().toggleClass("hidden");
});

let preventUnderage = () => {
    let today = new Date();
    let year = new Date(dob.value);
    let age = today.getFullYear() - year.getFullYear();
    let month = today.getMonth() + 1 - (year.getMonth() + 1);
    if (age < 18 || month < 0 || isNaN(year)) {
        card.textContent = 'you are not old enough to perform this action!';
        return false;
    }
};

if(guest){
    error_msg = document.querySelector('#guest_error');
    guest.addEventListener('focusout', ()=>{
        if(guest.value > parseInt(guest.max)){
            error_msg.textContent = guest.validationMessage;
        }else{
            error_msg.textContent = '';
        }
    });
}

//toast appear
if (toast) {
    init.show();
}
