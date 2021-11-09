<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbfrete
 * 
 * @property int $id
 * @property string $regiao
 * @property int $cepini
 * @property int $cepfim
 * @property float $pesoini
 * @property float $pesofim
 * @property float $valor
 * @property int $prazo
 *
 * @package App\Models
 */
class Tbfrete extends Model
{
	protected $table = 'tbfrete';
	public $timestamps = false;

	protected $casts = [
		'cepini' => 'int',
		'cepfim' => 'int',
		'pesoini' => 'float',
		'pesofim' => 'float',
		'valor' => 'float',
		'prazo' => 'int'
	];

	protected $fillable = [
		'regiao',
		'cepini',
		'cepfim',
		'pesoini',
		'pesofim',
		'valor',
		'prazo'
	];
}
