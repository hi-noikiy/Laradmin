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

/**
 * 随机返回设定的诗句
 *
 * @return mixed
 */
function poem()
{
    return array_random(config('poems'));
}

/**
 * 检查路由是否存在，依检查结果返回 link 或 slug
 *
 * @param $slug
 * @return string
 */
function linker($slug = null)
{
    return \Route::has($slug) ? route($slug) : $slug;
}

/**
 * 获取自定义配置
 *
 * @param $config_name
 * @return \Illuminate\Config\Repository|mixed
 */
function laradmin($config_name = null)
{
    return config("laradmin.{$config_name}");
}