# ThinkPHP3.1.3_redis_Storage_session
ThinkPHP3.1.3使用redis存储session步骤：

1.配置文件修改

    'SESSION_TYPE' => 'Redis', //session保存类型
    'SESSION_PREFIX' => 'Sess_', //session前缀
    'REDIS_HOST' =>  '127.0.0.1',  // 缓存服务器地址，此处应为实际缓存服务器地址
    'REDIS_PORT' => '6379', //REDIS默认连接端口号
    'SESSION_EXPIRE' => 3600, //SESSION过期时间
    
  详情见config.php文件
  
2.添加session的redis驱动

  将文件 SessionRedis.class.php拷贝到 ThinkPHP/Extend/Driver/Session 路径下
  
3.修改php配置文件

  修改 php.ini 文件
  
    a.修改session的存储类型
    
      改 session.save_handler = files 为 session.save_handler = redis
      
    b.修改session的存储路径
    
      改 session.save_path = "../tmp" 为 session.save_path = "tcp://127.0.0.1:6379"
      
    注：根据情况填写自己的缓存服务器地址及端口号
    
  测试缓存是否已修改为redis存储：
  
    $_SESSION['name'] = 'zhangsan';//session赋值
    
    echo "name:".$_SESSION['name'];
    
    $redis = new Redis();
    
    $redis->connect('127.0.0.1',6379);
        
    //打印redis中存放的session
    echo "session:".$redis->get(C('SESSION_PREFIX').session_id());
    
  注：若php.ini文件未做修改，可在存储session的文件中加入
  
    ini_set('session.save_handler','redis');//设置session存储方式
    
    ini_set('session.save_path','tcp://127.0.0.1:6379');//设置session存储路径
    
    
