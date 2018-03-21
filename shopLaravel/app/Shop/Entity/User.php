<?php
/**
 * Created by PhpStorm.
 * 使用者 Eloquent ORM Model
 * User: Jackson
 * Date: 2018/3/6
 * Time: 上午9:11
 */

namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Shop\Entity\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string $nickname
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $facebook_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop\Entity\User whereFacebookId($value)
 */
class User extends Model
{
    /** @var string 資料表名稱 */
    protected $table = 'users';
    /** @var string 主鍵名稱 */
    protected $primaryKey = 'id';
    /** @var array 可以大量指定異動的欄位（Mass Assignment） */
    protected $fillable = ["email", "password", "type", "nickname",];
}