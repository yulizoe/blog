<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Bloglist extends Model{
	protected $fillable = array('author', 'btitle', 'bclass', 'bcontent');

}