<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbimport
 *
 * @property int $id
 * @property string $pedido
 *
 * @package App\Models
 */
class Tbimport extends Model
{
	protected $table = 'tbimport';
	public $timestamps = false;

	protected $fillable = [
        'pedido',
        'total_amount',
        'paid_amount',
        'seller_sku',
        'title',
        'value_name',
        'quantity',
        'unit_price',
        'sale_fee',
        'shipping',
        'buyerid',
        'nickname',
        'email',
        'last_name',
        'first_name',
        'area_code',
        'numberfone',
        'area_code2',
        'numberfone2',
        'doc_type',
        'doc_number',
        'street_name',
        'street_number',
        'comment',
        'zip_code',
        'city',
        'state',
        'neighborhood',
        'receiver_name',
        'receiver_phone',
        'cost',
	];
}
