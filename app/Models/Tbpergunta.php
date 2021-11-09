<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbpergunta
 * 
 * @property string $id
 * @property string $item_id
 * @property string $text
 * @property string $status
 * @property string $cep
 * @property int $quant
 * @property string|null $cidade
 * @property string $resposta
 * @property string|null $forma1
 * @property float|null $valor1
 * @property int|null $prazo1
 * @property string|null $domicilio1
 * @property string|null $forma2
 * @property float|null $valor2
 * @property int|null $prazo2
 * @property string|null $domicilio2
 * @property float|null $valor3
 * @property int|null $prazo3
 * 
 * @property Tbmedida $tbmedida
 *
 * @package App\Models
 */
class Tbpergunta extends Model
{
	protected $table = 'tbpergunta';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'quant' => 'int',
		'valor1' => 'float',
		'prazo1' => 'int',
		'valor2' => 'float',
		'prazo2' => 'int',
		'valor3' => 'float',
		'prazo3' => 'int'
	];

	protected $fillable = [
		'item_id',
		'text',
		'status',
		'cep',
		'quant',
		'cidade',
		'resposta',
		'forma1',
		'valor1',
		'prazo1',
		'domicilio1',
		'forma2',
		'valor2',
		'prazo2',
		'domicilio2',
		'valor3',
		'prazo3'
	];

	public function tbmedida()
	{
		return $this->belongsTo(Tbmedida::class, 'item_id');
	}
}
