$(document).ready(function() {
    registerClickHandlers();
});

function slideOutDestroy($object, distance)
{
    if(typeof distance === "undefined")
        var distance = $object.width();
    $object.css('overflow', 'hidden');
    $object.css('height', $object.height());
    $object.animate({'margin-left': distance},300);
    setTimeout(function(){$object.remove()}, 299);
}

function registerClickHandlers()
{
    registerDeleteHandler();
}

function registerDeleteHandler()
{
    $('.delete-post').on('click', function(event) {
        event.preventDefault();

        var $postObject = $(this).closest('.post-container');

        $.ajax({
            url: $(this).attr('href'),
            success: function (response) {
                slideOutDestroy($postObject);
            },
            error: function (response) {
                console.log('failure');
                console.log(response);
            }
        });
    });
}
