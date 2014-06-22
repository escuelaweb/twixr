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
   * Fillable attributes of the model
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'username', 'password', 'password_confirmation'];  

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

  /**
   * Ardent hashable attributes
   *
   */
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

  /**
   * Relationship, one-to-many with Follower
   * List of followers
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function followers()
  {
    return $this->hasMany('Follower');
  }

  /**
   * Relationship, one-to-many with Follower
   * List of followed users
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function follows()
  {
    return $this->hasMany('Follower', 'follower_id');
  }

  /**
   * Relationship, one-to-many with Twix
   * List of twixes by an user
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function twixes()
  {
    return $this->hasMany('Twix');
  }

  /**
   * Relationship, many-to-many with Twix
   * List of an user's favorite twixes
   * @return  Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function favs()
  {
    return $this->belongsToMany('Twix');
  }
}
