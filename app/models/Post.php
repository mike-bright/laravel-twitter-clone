<?php

class Post extends Eloquent {

	protected $table = 'post';

    protected $guarded = array('id');

    public static function fetchAllHomePosts(User $user)
    {
    	$userIds = array($user->id);
    	$userIds = array_merge($userIds, $user->getFollowingIds());
    	return Post::whereIn('userId', $userIds)
            ->join('user', function($join) {
                $join->on('user.id', '=', 'post.userId');
            })
            ->leftJoin('repost', function($join) {
                $join->on('repost.sourcePostId', '=', 'post.id');
            })
            ->groupBy('post.id')
            ->orderBy('post.created_at', 'desc')
            ->select(array(
                'post.*',
                'user.userName',
                DB::raw('count(repost.id) as reposts')
                ));
    }

    public function user()
    {
    	return $this->belongsTo('User', 'userId');
    }

    public function reposts()
    {
        return $this->hasMany('Repost', 'sourcePostId');
    }

    public function source()
    {
        return $this->hasOne('Repost', 'postId');
    }

    public function repostBy(User $user)
    {
        $repost = Repost::where('sourcePostId', '=', $this->id)
            ->join('post', function($join)
            {
                $join->on('post.id', '=', 'repost.postId');
            })
            ->join('user', function($join)
            {
                $join->on('user.id', '=', 'post.userId');
            })->get();

        if($repost->isEmpty())
            return false;
        return $repost->first();
    }
}
