/* global blueimp */

function registerPhotoItems(linksId) {
    var $links = $('#' + linksId);

    $links.on('click', function(event) {
        var event = event || window.event;
        var target = event.target || event.srcElement;
        var link = target.src ? target.parentNode : target;
        var options = {
			index: link, 
			event: event, 
			hidePageScrollbars: false
		};
        var links = $links.children('a');

        blueimp.Gallery(links, options);
    });
}
