<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nompostre extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nompostres';

    protected $fillable = ['nombre'];
	
}
