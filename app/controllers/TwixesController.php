<?php

class TwixesController extends \BaseController {

	/**
	 * Display a listing of twixes
	 *
	 * @return Response
	 */
	public function index()
	{
		$twixes = Twix::all();

		return View::make('twixes.index', compact('twixes'));
	}

	/**
	 * Show the form for creating a new twix
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('twixes.create');
	}

	/**
	 * Store a newly created twix in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Twix::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Twix::create($data);

		return Redirect::route('twixes.index');
	}

	/**
	 * Display the specified twix.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$twix = Twix::findOrFail($id);

		return View::make('twixes.show', compact('twix'));
	}

	/**
	 * Show the form for editing the specified twix.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$twix = Twix::find($id);

		return View::make('twixes.edit', compact('twix'));
	}

	/**
	 * Update the specified twix in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$twix = Twix::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Twix::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$twix->update($data);

		return Redirect::route('twixes.index');
	}

	/**
	 * Remove the specified twix from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Twix::destroy($id);

		return Redirect::route('twixes.index');
	}

}
