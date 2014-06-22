<?php

use LaravelBook\Ardent\Ardent;

class Twix extends Ardent {

  /**
   * Ardent validation rules
   *
   * @var array
   */
	public static $rules = [
		'text' => 'required|between:1,140',
		'user_id' => 'required|integer|exists:users,id'
	];

	/**
	 * Fillable attributes of the model
	 *
	 * @var array
	 */
	protected $fillable = ['text'];

  /**
   * Relationship, belongs-to User
   * user who created the Twix
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo('User');
  }

  /**
   * Relationship, many-to-many with User
   * List of users who faved a Twix
   * @return  Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function fav_by()
  {
    return $this->belongsToMany('User');
  }
}