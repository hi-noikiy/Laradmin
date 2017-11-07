<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait Helpers
{
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