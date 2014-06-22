<?php

use LaravelBook\Ardent\Ardent;

class Follower extends Ardent {

  /**
   * Ardent validation rules
   *
   * @var array
   */
	public static $rules = [
		'user_id' => 'required|integer|exists:users,id',
		'follower_id' => 'required|integer|exists:users,id'
	];

	/**
	 * Fillable attributes of the model
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'follower_id'];

  /**
   * Relationship, belongs-to User
   * @return  Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function follower()
  {
    return $this->belongsTo('User', 'follower_id');
  }

  /**
   * Relationship, belongs-to User
   * @return  Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function followed()
  {
    return $this->belongsTo('User', 'user_id');
  }

}