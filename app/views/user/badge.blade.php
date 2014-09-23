<div class="panel panel-default">
	<div class="panel-heading">
		<img src="http://fillmurray.com/100/100" alt="Profile Image" class="img-circle" height="100" width="100">
		{{urldecode('%40').$user->userName}}
	</div>
    @if (!$isCurrent && !$isFollowing)
        <a href="{{action('UserController@followUser', $user->id)}}" class="follow-button">
            Follow
        </a>
    @elseif (!$isCurrent && $isFollowing)
        <a href="{{action('UserController@unfollowUser', $user->id)}}" class="follow-button following">
            Following
        </a>
    @endif
	<div class="panel-body">
	    <div class="row">
		    <div class="col-md-4 center-text">
		        Posts
		        <br>
		        <span class="badge center-block">{{$user->posts->count()}}</span>
            </div>
		    <div class="col-md-4 center-text">
                Followers
                <br>
                <span class="badge center-block">{{$user->followers->count()}}</span>
            </div>
		    <div class="col-md-4 center-text">
                Following
                <br>
                <span class="badge center-block">{{$user->following->count()}}</span>
            </div>
        </div>
        <br>
		<div class="well user-info-container">
			{{$user->settings->bio}}
			<br>
			<hr/>
			{{$user->settings->location}}
			<br>
			<a href="{{$user->settings->url}}">{{$user->settings->url}}</a>
		</div>
	</div>
</div>