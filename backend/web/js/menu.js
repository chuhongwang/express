$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var domain = window.location.protocol + "//" + window.location.host;

    var pos = url.lastIndexOf('/');
    var pre = url.substring(0, pos);
    if (domain == pre) {
        if (window.location.pathname == '/') {
            url = url + "dashboards"
        }

        url = url + "/index"
    }

    pos = url.lastIndexOf('/');
    pre = url.substring(0, pos);
    console.log(url);

    var element = $('#side-menu a').filter(function() {
        var rs = this.href == url;
        if (0 && rs) {
            console.log($(this).html());
            console.log("1" + this.href);
        }

        return rs;
    });

    if (element.html() == undefined) {
        element = $('#side-menu a').filter(function() {
            var rs = this.href == url || this.href.indexOf(pre) == 0;
            if (0 && rs) {
                console.log($(this).html());
                console.log("2" + this.href);
                console.log(this.href);
                console.log(pre + "|" + url)
            }
            return rs;
        });
    }

    element = element.parent().addClass('active').parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
    if (element.parent().parent().is('li')) {
        element.parent().parent().addClass('active');
    }
});
