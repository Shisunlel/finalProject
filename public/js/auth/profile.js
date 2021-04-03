const edit = document.querySelectorAll('.action__link');
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);
const dob = document.querySelector('#dob');

$(edit).click(function(){
    text = $(this).children().text();
    $(this).children().text(text == 'Edit' ? 'Cancel' : 'Edit');
    $(this).prevAll().toggleClass('hidden');
})

//toast appear
if (toast) {
    init.show();
    setTimeout(() => {
        toast.addEventListener('hidden.bs.toast', toast.remove());
    }, 2500);   
}

dob.max = new Date().toISOString().split("T")[0];