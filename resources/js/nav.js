const nav = {
    init: function(){
        this.addWatchers()
    },
    addWatchers() {

        this.watchers.forEach(watcher => {
            watcher.watch()
        });
    },
    watchers: [
        {
            name: 'Menu Button Watcher',
            watch: function(){

                $('.menu-reveal').on('click', function(e) {
                    $('.mobile-menu').toggleClass('open')
                })


                $('body').on('click', function(e){

                    var isMenuButton = $('.menu-reveal').has(e.target).length == 1 || e.target == $('.menu-reveal').get(0) || $('.menu-expand').hasClass('menu-expand')

                    if (isMenuButton)
                        return


                    var menuOpen = $('.mobile-menu').hasClass('open')
                    
                    if (menuOpen) {
                        $('.mobile-menu').toggleClass('open')
                    }

                });
            }
        },
        {
            name: 'Collapse Button Watcher',
            watch: function() {

                const handler = function(e) {

                    var me = this
                    var target = $(e.target).parent().children()[2]

                    if ($(target).hasClass('collapsed')) {
                        $(target).css("max-height", `${100 + $(target).children().length * 100}px` )
                        $(me).html("-")
                    } else {
                        $(target).css("max-height", "0px")
                        $(me).html("+")
                    }

                    $(target).toggleClass('collapsed')
                }

                $('.menu-expand').click(handler)
            }
        }
        
    ]
}

$(document).ready(function() {

    nav.init()
})
