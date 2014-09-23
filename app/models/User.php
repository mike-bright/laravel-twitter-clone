<?php
// TO DO: look into these:
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;
	protected $table = 'user';

	protected $hidden = array('password');
    protected $guarded = array('id');

    public function setPassword($password)
    {
    	$this->password = Hash::make($password);
    	$this->save();
    }

    public function login($email, $password, $remember = false)
    {
    	if (Auth::attempt(array('email' => $email, 'password' => $password), $remember))
		{
		    return Redirect::to('/');
		}
    }

    public function logout()
    {
    	Auth::logout();
    }

    public static function getCurrent()
    {
    	if (Auth::check())
    		return User::find(Auth::id());
    	return false;
    }

    public static function loginAs(User $user)
    {
    	Auth::login($user);
    }

    public function following()
    {
        return $this->hasMany('Following', 'userId');
    }

    public function followers()
    {
        return $this->hasMany('Following', 'followingUserId');
    }

    public function posts()
    {
        return $this->hasMany('Post', 'userId');
    }

    public function settings()
    {
        return $this->hasOne('Settings', 'userId');
    }

    public function getFollowingIds()
    {
        $userIds = array();

        foreach ($this->following as $followObject) {
            $userIds[] = $followObject->followingUserId;
        }

        return $userIds;
    }

    public function getFollowersIds()
    {
        $userIds = array();

        foreach ($this->followers as $followObject) {
            $userIds[] = $followObject->userId;
        }

        return $userIds;
    }

    public function getFollowingCount()
    {
        return $this->following->count();
    }

    public function getFollowersCount()
    {
        return $this->followers->count();
    }

    public function isFollowing(User $user)
    {
        $query = Following::following($user->id)
                            ->follower($this->id);

        return $query->count() > 0;
    }
}
