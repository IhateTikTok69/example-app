<?php

if (!function_exists('timeAgo')) {
    function timeAgo($dateTime)
    {
        $carbonDate = \Carbon\Carbon::parse($dateTime);
        $now = \Carbon\Carbon::now();

        $diff = $carbonDate->diffForHumans($now, true, false, 1);

        // Remove the detailed representation
        $diff = preg_replace('/(?<!\w)0(?:mo|y)\s/', '', $diff);

        // Replace 'before' with ''
        $diff = str_replace('before', '', $diff);

        // Replace full words with abbreviations
        $diff = str_replace(['seconds', 'minutes', 'hours', 'days', 'months', 'years'], ['sec', 'min', 'hrs', 'day', 'mo', 'yr'], $diff);

        return $diff;
    }
}
