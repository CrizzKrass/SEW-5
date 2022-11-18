<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * Class News
     * @property int $id
     * @property string $name
     * @property double $price_net
     * @property double $price_gross
     * @property double $vat
     * @property string $user_clearing
     * @property \DateTime $clearing_date
     * @property string $created_at
     * @property string $updated_at
     * @mixin \Eloquent
     * @package App
     */

    //protected $table = 'invoices';
}
