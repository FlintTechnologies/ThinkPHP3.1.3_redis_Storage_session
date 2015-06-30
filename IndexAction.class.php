<?php 
class IndexAction extends Action {
    public function index(){
        ini_set('session.save_handler','redis');//设置session存储方式
        ini_set('session.save_path','tcp://127.0.0.1:6379');//设置session存储路径
        
        $_SESSION['name'] = 'zhangsan';//session赋值
        echo "name:".$_SESSION['name'];
        echo "<br/>";
        
        $redis = new Redis();
        $redis->connect('127.0.0.1',6379);
        
        //打印redis中存放的session
        echo "session:".$redis->get(C('SESSION_PREFIX').session_id());
        echo '<br/>';
    }
}
?>