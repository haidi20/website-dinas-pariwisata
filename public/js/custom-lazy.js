$(function() {
    jQuery("img.lazy").lazy({
        asyncLoader: function(element, response) {
            setTimeout(function() {
                element.html('element handled by "asyncLoader"');
                response(true);
            }, 1000);
        }
    });
});