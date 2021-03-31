const edit = document.querySelectorAll('.action__link');

$(edit).click(function(){
    text = $(this).children().text();
    $(this).children().text(text == 'Edit' ? 'Cancel' : 'Edit');
    $(this).prevAll().toggleClass('hidden');
})