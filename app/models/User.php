<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
    'name' => 'required|between:2,120',
    'email' => 'required|between:7,255|unique:users,email',
    'username' => 'required|between:2,60|unique:users,username',
    'password' => 'required|min:5',
    'password_confirmation' => 'required_with:password|same:password'
  );

  public static $passwordAttributes = array('password');

  /**
   * Remove redundant form data
   *
   * @var boolean
   */
  public $autoPurgeRedundantAttributes = true;

  /**
   * Automatic hashing of passwords
   *
   * @var boolean
   */
  public $autoHashPasswordAttributes = true;

}
