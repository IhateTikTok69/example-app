<?php
if (!function_exists('timeAgo')) {
    function timeAgo($dateTime)
    {
        $carbonDate = \Carbon\Carbon::parse($dateTime);
        $now = \Carbon\Carbon::now();

        $diff = $carbonDate->diffForHumans($now);

        return $diff;
    }
}
