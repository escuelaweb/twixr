<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();

		if($user->save())
		{
			Auth::login($user);
			return Redirect::route('users.show', $user->id);	
		}
		else
		{
			return Redirect::back()->withErrors($user->errors())->withInput();	
		}		
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::with('twixes')->findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

	public function authenticate()
	{
		if(! Auth::check())
		{
			if(Auth::attempt(['email' => Input::get('login_email'), 'password' => Input::get('login_password')]))
			{
				return Redirect::route('users.show', Auth::user()->id);		
			}
			else
			{
				return Redirect::back();	
			}
		}
		else
		{
			return Redirect::route('users.show', Auth::user()->id);
		}
	}

	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::route('users.create');
		}
		else
		{
			return Redirect::back();
		}
	}

}
