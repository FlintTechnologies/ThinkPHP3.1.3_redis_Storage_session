<?php
return array(
    //'配置项'=>'配置值'
    'SESSION_AUTO_START' => true, // 是否自动开启Session
    'SESSION_TYPE' => 'Redis', //session保存类型
    'SESSION_PREFIX' => 'Sess_', //session前缀
    'REDIS_HOST' =>  '127.0.0.1',  // 缓存服务器地址
    'REDIS_PORT' => '6379', //REDIS连接端口号
    'SESSION_EXPIRE' => 3600, //SESSION过期时间
);
?>