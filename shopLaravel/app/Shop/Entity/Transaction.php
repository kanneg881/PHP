<?php
/**
 * Created by PhpStorm.
 * 交易 Eloquent ORM Model
 * User: Jackson
 * Date: 2018/3/6
 * Time: 下午5:55
 */

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Shop\Entity\Transaction
 *
 * @property int $id
 * @property int $user_id
 * @property int $merchandise_id
 * @property int $price
 * @property int $buy_count
 * @property int $total_price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereBuyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereMerchandiseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Transaction whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Shop\Entity\Merchandise $merchandise
 */
class Transaction extends Model
{
    /** @var string 資料表名稱 */
    protected $table = 'transaction';
    /** @var string 主鍵名稱 */
    protected $primaryKey = 'id';
    /** @var array 可以大量指定異動的欄位（Mass Assignment） */
    protected $fillable = [
        "id",
        "user_id",
        "merchandise_id",
        "price",
        "buy_count",
        "total_price",
    ];

    public function merchandise()
    {
        return $this->hasOne('App\Shop\Entity\Merchandise','id',
            'merchandise_id');
    }
}