$(document).ready(function() {
    checkForNewPosts();
});

function checkForNewPosts()
{
    var newPostCount = 0;
    var newPosts;

    var updateNewPostStatus = function()
    {
        var s = (newPostCount>1)?'s':'';
        $('#new-posts').remove();

        jQuery('<div/>', {
            id: 'new-posts',
            class: 'alert alert-info text-center',
            text: newPostCount + ' new post' + s
        })
            .prependTo('.post-list')
            .on('click', function() {
                $(this).remove();
                $('.post-list').prepend(newPosts);
                registerDeleteHandler();
            });
    }

    var getNewPosts = function()
    {
        var latestId = $('.post-list').children('.post-container:first').data('id');
        $.ajax({
            url: '/post/since/' + latestId,
            success: function(data) {
                newPostCount = data.count;
                newPosts = data.posts;

                if(newPostCount)
                    updateNewPostStatus();
            }
        });
    }

    var poll = function()
    {
        $.ajax({
            url: '/post/latest',
            success: function(data) {
                var latest = new Date(data.updated_at.date);
                if (latest > latestPostTime) {
                    latestPostTime = latest;
                    getNewPosts();
                }
            }
        });
    }

    setInterval(poll, 1000);
}