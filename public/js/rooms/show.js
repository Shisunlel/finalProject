const startInput = document.querySelector('#start__date');
const endInput = document.querySelector('#end__date');
let startDate = startInput.value;
let endDate = endInput.value;

startInput.addEventListener('change', date_input);

function date_input(){
    startDate = startInput.value;
    endInput.removeAttribute('disabled');
    date = new Date(startDate);
    endDate = date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + date.getDate()).slice(-2);
    endInput.value = '';
    endInput.setAttribute('min', endDate);
}