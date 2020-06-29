const callback = {
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
            name: 'Open Popup Watcher',
            watch: function(){

                $('.cmb-pop-opener').on('click', function(e) {
                    $('.cmb-form').toggleClass('open')
                })


                $('body').on('click', function(e){
                    var isOnForm = $('.cmb-form').has(e.target).length >= 1 || $(e.target)[0] == $('.cmb-pop-opener')[0]

                    if (!isOnForm) {
                        if ($('.cmb-form').hasClass('open'))
                           $('.cmb-form').toggleClass('open')
                    }
                    
                    //console.log($(e.target),$('.cmb-pop-opener'))
                });
            }
        }

    ]
}

$(document).ready(function() {

    callback.init()
})
