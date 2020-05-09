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

                    var isMenuButton = $('.menu-reveal').has(e.target).length == 1 || e.target == $('.menu-reveal').get(0)

                    if (isMenuButton)
                        return


                    var menuOpen = $('.mobile-menu').hasClass('open')
                    
                    if (menuOpen) {
                        $('.mobile-menu').toggleClass('open')
                    }

                });
            }
        },
        
    ]
}

$(document).ready(function() {

    nav.init()
})
