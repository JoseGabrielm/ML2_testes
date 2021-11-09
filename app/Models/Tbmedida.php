<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbmedida
 * 
 * @property string $item_id
 * @property string $descricao
 * @property float $largura
 * @property float $altura
 * @property float $profundidade
 * @property float $peso
 * @property string $entrega
 * @property string $classe
 * @property string $sku
 * 
 * @property Collection|Tbperguntum[] $tbpergunta
 *
 * @package App\Models
 */
class Tbmedida extends Model
{
	protected $table = 'tbmedida';
	protected $primaryKey = 'item_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'largura' => 'float',
		'altura' => 'float',
		'profundidade' => 'float',
		'peso' => 'float'
	];

	protected $fillable = [
		'descricao',
		'largura',
		'altura',
		'profundidade',
		'peso',
		'entrega',
		'classe',
		'sku'
	];

	public function tbpergunta()
	{
		return $this->hasMany(Tbperguntum::class, 'item_id');
	}
}
