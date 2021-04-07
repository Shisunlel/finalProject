const edit = document.querySelectorAll('.action__link');
const add = document.querySelectorAll('.add');

$(edit).click(function(){
    text = $(this).children().text();
    $(this).children().text(text == 'Edit' ? 'Cancel' : 'Edit');
    $(this).prevAll().toggleClass('hidden');
})

$(add).click(function(){
    text = $(this).text();
    $(this).text(text == 'Add' ? 'Cancel' : 'Add');
    $(this).prevAll().toggleClass('hidden');
})