<?php

if (!function_exists('timeElapsedString')) {
    function timeElapsedString($datetime)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => ['год', 'года', 'лет'],
            'm' => ['месяц', 'месяца', 'месяцев'],
            'w' => ['неделя', 'недели', 'недель'],
            'd' => ['день', 'дня', 'дней'],
            'h' => ['час', 'часа', 'часов'],
            'i' => ['минута', 'минуты', 'минут'],
            's' => ['секунда', 'секунды', 'секунд']
        ];
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $diffK = $diff->$k % 10;
                if ($diffK == 1) {
                    $v = $diff->$k.' '.$v[0];
                } else if ($diffK >1 && $diffK < 5) {
                    $v = $diff->$k.' '.$v[1];
                } else {
                    $v = $diff->$k.' '.$v[2];
                }
            } else {
                unset($string[$k]);
            }
        }
        $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' назад' : 'только что';
    }
}

if (!function_exists('getRealClientIp')) {
    function getRealClientIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
}

// Handle the parsing of the _ga cookie or setting it to a unique identifier
if (!function_exists('gaParseCookie')) {
    function gaParseCookie()
    {
        if (isset($_COOKIE['_ga'])) {
            list($version, $domainDepth, $cid1, $cid2) = split('[\.]', $_COOKIE["_ga"], 4);
            $contents = array('version' => $version, 'domainDepth' => $domainDepth, 'cid' => $cid1 . '.' . $cid2);
            $cid = $contents['cid'];
        } else $cid = gaGenUUID();
        return $cid;
    }
}
