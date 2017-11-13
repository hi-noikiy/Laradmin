<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait Helpers
{
    /**
     * 人性化显示添加时间戳。
     *
     * @param $date
     * @return string|static
     */
    public function getCreatedAtAttribute($date)
    {
        return $this->hommization($date);
    }

    /**
     * 人性化现实更新时间戳。
     *
     * @param $date
     * @return string|static
     */
    public function getUpdatedAtAttribute($date)
    {
        return $this->hommization($date);
    }

    /**
     * 人性化显示时间戳
     *
     * @param $date
     * @return string|static
     */
    public function hommization($date)
    {
        return hommization($date);
    }
}