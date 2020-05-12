$('.toggle-title').click(function(e){
    var target = $(e.target).parent().parent().children()[1];
    var ui = $(e.target).parent().parent().children()[0];
    ui = $(ui).children()
    ui = $(ui).children()

    if ($(target).hasClass('toggled')) {


        $(target).css({
            'overflow': 'hidden',
            'max-height': 0,
            'transition': 'max-height 0.5s ease-out'
        })

    } else {
        $(target).css({
            'max-height': '500px',
            'transition': 'max-height 0.5s ease-in'
        })
    }

    $(ui).toggleClass('fa-minus')
    $(ui).toggleClass('fa-plus')


    $(target).toggleClass('toggled')
    $(e.currentTarget).parent().toggleClass('current');

})