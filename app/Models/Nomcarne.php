<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomcarne extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nomcarnes';

    protected $fillable = ['nombre'];
	
}
