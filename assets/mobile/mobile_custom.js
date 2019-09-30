$(function() {
    $("body").on("swiperight", swiperrightHandler);
    $("body").on("swipeleft", swiperleftHandler);

    function swiperrightHandler(event) {
        $('#sidebar').each(function() {
            $('.open-sidebar').click();
            $('#sidebarButton').removeClass('open-sidebar').each(function() {
                $('#sidebarButton').addClass('close-sidebar');
            });
        });
    }

    function swiperleftHandler(event) {
        $('#sidebar').each(function() {
            $('.close-sidebar').click();
            $('#sidebarButton').removeClass('close-sidebar').each(function() {
                $('#sidebarButton').addClass('open-sidebar');
            });
        });
    }


    $('.open-sidebar').click(function() {
        $('#sidebarButton').removeClass('open-sidebar').each(function() {
            $('#sidebarButton').addClass('close-sidebar');
        });
    });

    $('.close-sidebar').click(function() {
        $('#sidebarButton').removeClass('close-sidebar').each(function() {
            $('#sidebarButton').addClass('open-sidebar');
        });
    });

});