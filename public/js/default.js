$(document).ready(function () {

    $('ul#top_menu a').on('click', function() {
        if($(this).text() != 'Home' && $(this).text() != 'Login' && $(this).text() != 'Logout') {
            $('ul#top_menu a').removeClass('active');
            $(this).addClass('active');
            href= $(this).attr('href');
            $('#MainContent').load(href);
            return false;
        }

    });

    features.items("#f_design", 500, 1000, 5000);
    features.items("#f_product", 500, 1000, 3000);
    features.items("#f_events", 500, 1000, 3000);

    features.loadPage("#gallery a", "div#content", "/web/gallery/view/");
    features.loadPage("#products a", "div#content", "/web/products/view/");

    $("#popUp img").live('click', function() {
        features.lightBox($(this).attr('src'));
    });

    $("#lightbox").live('click', function(){
        $(this).fadeOut(500);
    });
});

var features = {
    items: function (placeHolder, fadeIn, fadeOut, lifeSpan) {

        $(placeHolder + " > div:gt(0)").hide();

        setInterval(function() {
            $(placeHolder + ' > div:first')
                .fadeOut(fadeOut)
                .next()
                .fadeIn(fadeIn)
                .end()
                .appendTo(placeHolder);
        },  lifeSpan);
    },
    load: function(placeHolder, url) {
        $(placeHolder).load(url)
    },
    loadPage: function(clickable, placeHolder, url) {
        $(clickable).live('click', function() {
            $(clickable).removeClass('active');
            $(this).addClass('active');
            var id = $(this).attr('id');
            $(placeHolder).load(url + id)
        });
    },
    lightBox : function(src) {
        var box =
            '<div id="lightbox">' +

            '<div class="popUp">' + //insert clicked link's href into img src
            '<i class="fa fa-close fa-fw fa-2x"></i>'+
            '<img src="'+src+'" style="width:100%; height:100%;">'+

            '</div>' +
            '</div>';
        $('body').append(box);
    }
};
