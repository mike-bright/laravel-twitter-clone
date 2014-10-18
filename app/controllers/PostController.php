<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::getCurrent();
		$posts = Post::fetchAllHomePosts($user);
		return $posts->get();
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
