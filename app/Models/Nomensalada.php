<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomensalada extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nomensaladas';

    protected $fillable = ['nombre'];
	
}
