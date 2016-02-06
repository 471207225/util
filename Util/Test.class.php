<?php

namespace Util;

class Test{

    public function latest()
    {
        $url = 'http://www.shunweige.cn/hmy_info.log';
        $file = file_get_contents($url);


        $logs = explode('|',trim($file,'|'));

        var_dump(unserialize($logs[count($logs)-1]));

    }

    public function _log($data)
    {
        $addon = array('time'=>date('Y-m-d H:m:s',time()));
        $data = array_merge($data,$addon);
        error_log(serialize($data),3,'hmy_info.log');
    }
}