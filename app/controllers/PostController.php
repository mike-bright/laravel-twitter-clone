<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Input::has('text')){
			$post = new Post();
			$post->text = Input::get('text');
			$post->userId = User::getCurrent()->id;
			$post->imageId = Image::getBlankImage()->id;
			$post->save();
		}
		return Redirect::to('/');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($post)
	{
        $post->reposts()->delete();
        $post->source()->delete();

		$post->delete();
		return Redirect::to('/');
	}

	public function search($query)
	{
		Post::where('text', 'LIKE', $query);
	}

    public function latestUpdateTime()
    {
        $user = User::getCurrent();
        $latest = Post::fetchAllHomePosts($user)->first()->updated_at;
        return Response::json(array('updated_at' => $latest));
    }

    public static function postsSince($postId)
    {
        $return = array();
        $return['posts'] = "";
        $user = User::getCurrent();

        $newPosts = Post::fetchAllHomePosts($user)
            ->where('id', '>', $postId)
            ->get();
        $return['count'] = count($newPosts);

        if (!empty($newPosts)) {
            foreach ($newPosts as $post) {
                $return['posts'] .= View::make('post.post', array('post' => $post));
            }
        }

        return Response::json($return);
    }

}
