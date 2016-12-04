<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model {

	protected $table = 'projects';
	protected $fillable = ['name', 'url', 'license_key', 'end_at','status'];




}
