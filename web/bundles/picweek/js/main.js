$(document).ready(function(){
    initHeadNav();
});

/**
 * Action on li
 */
function initHeadNav() {
    $("header #main nav li").click(function(){
        var childs = $(this).children("a");
        if (childs.size()) {
            $(location).attr('href', childs.first().attr('href'));
        }
    });
}
