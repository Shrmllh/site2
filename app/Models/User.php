<?php
 
// Model deals 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps = false; // <-- no need to updated at and created at column
protected $primaryKey = 'id';

//name of table

protected $table = 'customers';

// column table
protected $fillable = [
'first_name', 'last_name', 'id'
];
} 