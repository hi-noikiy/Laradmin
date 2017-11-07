<?php

/**
 * 自定义 Ajax 返回格式
 *
 * @param $status
 * @param $respond
 * @return \Illuminate\Http\JsonResponse
 */
function respond($status, $respond)
{
    return response()->json(['status' => $status, is_string($respond) ? 'message' : 'data' => $respond]);
}

/**
 * 自定义 Ajax 成功返回
 *
 * @param $respond
 * @return \Illuminate\Http\JsonResponse
 */
function succeed($respond = 'Request success!')
{
    return respond(true, $respond);
}

/**
 * 自定义 Ajax 失败返回
 *
 * @param $respond
 * @return \Illuminate\Http\JsonResponse
 */
function failed($respond = 'Request failed!')
{
    return respond(false, $respond);
}

/**
 * 人性化显示时间戳
 *
 * @param $date
 * @return string|static
 */
function hommization($date)
{
    return \Carbon\Carbon::now() > \Carbon\Carbon::parse($date)->addDays(10)
        ? \Carbon\Carbon::parse($date)
        : \Carbon\Carbon::parse($date)->diffForHumans();
}

function poem()
{
    return array_random(config('poems'));
}

function linker($slug)
{
    return \Route::has($slug) ? route($slug) : $slug;
}