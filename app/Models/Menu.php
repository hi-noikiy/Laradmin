<?php

namespace App\Models;

use App\Models\Traits\Helpers;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Helpers;

    protected $guarded = [];

    /**
     * 查询所有顶级菜单栏目或者某个顶级菜单的子栏目。
     *
     * @param $query
     * @param int $parent
     * @return mixed
     */
    public function scopeTops($query, $parent = 0)
    {
        return $query->where('top_id', $parent);
    }

    /**
     * 子菜单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childers()
    {
        return $this->hasMany(self::class, 'top_id');
    }

    /**
     * 顶级菜单
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function top()
    {
        return $this->belongsTo(self::class);
    }
}
