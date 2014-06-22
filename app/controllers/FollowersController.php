<?php

class FollowersController extends \BaseController {

	/**
	 * Display a listing of followers
	 *
	 * @return Response
	 */
	public function index()
	{
		$followers = Follower::all();

		return View::make('followers.index', compact('followers'));
	}

	/**
	 * Show the form for creating a new follower
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('followers.create');
	}

	/**
	 * Store a newly created follower in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Follower::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Follower::create($data);

		return Redirect::route('followers.index');
	}

	/**
	 * Display the specified follower.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$follower = Follower::findOrFail($id);

		return View::make('followers.show', compact('follower'));
	}

	/**
	 * Show the form for editing the specified follower.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$follower = Follower::find($id);

		return View::make('followers.edit', compact('follower'));
	}

	/**
	 * Update the specified follower in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$follower = Follower::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Follower::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$follower->update($data);

		return Redirect::route('followers.index');
	}

	/**
	 * Remove the specified follower from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Follower::destroy($id);

		return Redirect::route('followers.index');
	}

}
