<div class="panel panel-default post-container" data-id="{{$post->id}}">
    <div class="panel-heading post-heading">
        <div class="post-profile-image">
            <img src="http://fillmurray.com/50/50" alt="Profile Image" class="img-circle" height="50" width="50">
        </div>
        <div class="">
            <a href="{{action('UserController@showProfile', $post->user->userName)}}" class="post-username">
                {{urldecode('%40')}}{{$post->user->userName}}
            </a>
            @if ($post->userId === User::getCurrent()->id)
                <a href="{{action('PostController@destroy', $post->id)}}" class="pull-right delete-post">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            @endif
        </div>
    </div>
    <div class="panel-body">
        {{$post->text}}
        @if ($post->source)
            <div class="well repost-well">
                Reposted from
                <a class="repost-source" souce-id="{{$post->source->source->id}}">
                    {{urldecode('%40')}}{{$post->source->source->user->userName}}
                </a>
            </div>
        @endif
    </div>
    <div class="panel-footer post-footer">
        @if ($repost = $post->repostBy(User::getCurrent()))
            <span class="glyphicon glyphicon-retweet" title="Reposted at {{$repost->created_at->toDayDateTimeString()}}"></span>
        @elseif ($post->userId === User::getCurrent()->id)
        @else
            <a class="ajax" href="{{action('RepostController@create', $post->id)}}">
                <span class="glyphicon glyphicon-retweet"></span>
            </a>
        @endif
        <div class="pull-right">{{$post->updated_at->toDayDateTimeString()}}</div>
        <div class="clearfix"></div>
    </div>
</div>