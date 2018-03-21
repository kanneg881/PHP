<?php
/**
 * Created by PhpStorm.
 * 商品 Eloquent ORM Model
 * User: Jackson
 * Date: 2018/3/6
 * Time: 下午5:44
 */

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Shop\Entity\Merchandise
 *
 * @property int $id
 * @property string $status
 * @property string|null $name
 * @property string|null $name_en
 * @property string $introduction
 * @property string $introduction_en
 * @property string|null $photo
 * @property int $price
 * @property int $remain_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereIntroductionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereRemainCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\Merchandise whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Merchandise extends Model
{
    /** @var string 資料表名稱 */
    protected $table = 'merchandise';
    /** @var string 主鍵名稱 */
    protected $primaryKey = 'id';
    /** @var array 可以大量指定異動的欄位（Mass Assignment） */
    protected $fillable = [
        "id",
        "status",
        "name",
        "name_en",
        "introduction",
        "introduction_en",
        "photo",
        "price",
        "remain_count",
    ];
}