<?php

class RepostController extends \BaseController {

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
	public function create($sourcePostId)
	{
        $sourcePost = Post::findOrFail($sourcePostId);

        $post = new Post();
        $post->text = $sourcePost->text;
        $post->userId = User::getCurrent()->id;
        $post->imageId = Image::getBlankImage()->id;
        $post->save();

		$repost = new Repost();
        $repost->sourcePostId = $sourcePostId;
        $repost->postId = $post->id;
        $repost->save();

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
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Repost::find($id)->delete();
	}


}
