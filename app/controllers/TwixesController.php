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
   * Store a newly created twix in storage.
   *
   * @return Response
   */
  public function store()
  {
    if(Auth::check())
    {
      $twix = new Twix();
      $twix->text = Input::get('text');

      if(Auth::user()->twixes()->save($twix))
      {
        return Redirect::back();  
      }
      else
      {
        return Redirect::back()->withErrors($twix->errors())->withInput();  
      }      
    }
    else
    {
      return Redirect::route('login');
    }    
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
