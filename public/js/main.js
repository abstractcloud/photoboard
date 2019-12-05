$('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 300
});

$(window).on('load', (function() {
    $('.grid').masonry({})
}));
