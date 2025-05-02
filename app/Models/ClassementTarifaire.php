<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassementTarifaire extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $table = 'classement_tarifaire';

    protected $fillable = [
        'file_nom',
        'code_tarifaire',
        'conclusion',
        'date_decision',
        'date_diffusion',
        'date_validite',
        'decision',
        'designation',
        'statut',
        'circulaire',
    ];

}
