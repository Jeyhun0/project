function windowUp() {
    window.scrollTo({
        top: 0, left: 0, behavior: "smooth",
    });
}
$('.categories_btns button').on('click', function(){
    $('.categories_btns button').removeClass('selected_category');
    $(this).addClass('selected_category');
})
