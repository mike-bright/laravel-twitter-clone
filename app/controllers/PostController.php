<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$return = array();
		$user = User::getCurrent();

		$count = Post::fetchAllHomePosts($user)->get()->count();
		$return['count'] = $count;

		$posts = Post::fetchAllHomePosts($user);
		if (Input::has('offset'))
			$posts->skip(Input::get('offset'));
		if (Input::has('limit'))
			$posts->take(Input::get('limit'));
		$posts = $posts->get();
		$return['posts'] = $posts;
		
		return $return;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//not used
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Post object
	 */
	public function store()
	{
		if(Input::has('text')){
			$post = new Post();
			$post->text = Input::get('text');
			$post->userId = User::getCurrent()->id;
			$post->imageId = Image::getBlankImage()->id;
			$post->save();
		}
		return $post;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Post Object
	 */
	public function show($id)
	{
		return Post::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//not used
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Post Object
	 */
	public function update($id)
	{
		$post = Post::find($id);
		if (Input::get('text'))
			$post->text = Input::get('text');
		$post->userId = User::getCurrent()->id;
		$post->imageId = Image::getBlankImage()->id;
		$post->save();

		return $post;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);

		if ($post->user->id !== User::getCurrent()->id)
			throw new Exception("Insufficient rights. Cannot Delete.", 1);
			
        $post->reposts()->delete();
        $post->source()->delete();

		$post->delete();

		return 1;
	}

	public function search($query)
	{
		return Post::where('text', 'LIKE', $query);
	}
}
