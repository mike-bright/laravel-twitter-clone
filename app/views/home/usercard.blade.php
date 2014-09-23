<div class="panel panel-default">
	<div class="panel-heading">
		<a href="/user/{{$user->userName}}"><?php echo urldecode('%40') ?>{{$user->userName}}</a>
	</div>
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
	</div>
</div>