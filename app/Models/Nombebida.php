<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nombebida extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nombebidas';

    protected $fillable = ['nombre'];
	
}
