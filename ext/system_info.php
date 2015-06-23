<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/26/14
 * Time: 2:18 AM
 */
class system_info
{
    public static function mem_usage()
    {
        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("n", $free);
        $mem = explode(" ", $free_arr[0]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = 100 * $mem[7] / $mem[6];
        echo '<h1>RAM: ' . round($memory_usage) . '%</h1>';
    }

    public static function  cpu_usage()
    {
        $load = sys_getloadavg();
        echo '<h1>CPU: ' . round($load[0], 3) . '</h1>';
    }

    public static function other()
    {
        echo memory_get_usage() . '<br />';
        echo memory_get_peak_usage() . '<br />';
        echo disk_free_space('/var/www') . '<br />';
        echo disk_total_space('/var/www') . '<br />';

    }
}