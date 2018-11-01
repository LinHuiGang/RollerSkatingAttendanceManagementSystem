<?php
/**
* Created by PhpStorm.
* User: yuange
* Date: 2018/10/9
* Time: 8:46
* description: 数据库操作类(仅对接MySQL数据库,主要利用MySQLi函数)
*/
class db_class {
    //私有的属性
    private $host;
    private $port;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $link;
    //私有的构造方法
    public function __construct($config){
        $this->host = $config['host'] ? $config['host'] : 'localhost';
        $this->port = $config['port'] ? $config['port'] : '3306';
        $this->user = $config['user'] ? $config['user'] : 'root';
        $this->pass = $config['pwd'] ? $config['pwd'] : 'root';
        $this->db = $config['dbname'] ? $config['dbname'] : 'small2';
        $this->charset=isset($arr['charset']) ? $arr['charset'] : 'utf8';
        //连接数据库
        $this->db_connect();
        //选择数据库
        $this->db_usedb();
        //设置字符集
        $this->db_charset();
    }
    //连接数据库
    private function db_connect(){
        $this->link=mysqli_connect($this->host.':'.$this->port,$this->user,$this->pass);
        if(!$this->link){
            echo "数据库连接失败<br>";
            echo "错误编码".mysqli_errno($this->link)."<br>";
            echo "错误信息".mysqli_error($this->link)."<br>";
            exit;
        }
    }
    //设置字符集
    private function db_charset(){
        mysqli_query($this->link,"set names {$this->charset}");
    }
    //选择数据库
    private function db_usedb(){
        mysqli_query($this->link,"use {$this->db}");
    }
    //私有的克隆
    private function __clone(){
        die('clone is not allowed');
    }
    //关闭数据库链接 释放资源
    public function close(){
        mysqli_close($this->link);
    }
    //执行sql语句的方法,返回受影响的行
    public function queryrows($sql){
        $res=mysqli_query($this->link,$sql);
        if(!$res){
            echo "sql语句执行失败<br>";
            echo $sql.'<br />';
            echo "错误编码是".mysqli_errno($this->link)."<br>";
            echo "错误信息是".mysqli_error($this->link)."<br>";
        }
        return mysqli_affected_rows($this->link);
    }
    //执行sql语句的方法,返回结果集
    public function query($sql){
        $res=mysqli_query($this->link,$sql);
        if(!$res){
            echo "sql语句执行失败<br>";
            echo $sql.'<br />';
            echo "错误编码是".mysqli_errno($this->link)."<br>";
            echo "错误信息是".mysqli_error($this->link)."<br>";
        }
        return $res;
    }
    //获得最后一条记录id
    public function getInsertid(){
        return mysqli_insert_id($this->link);
    }
    /**
     * 查询某个字段
     * @param string $sql
     * @return string or int
     */
    public function getOne($sql){
        $query=$this->query($sql);
        return mysqli_free_result($query);
    }
    //获取一行记录,return array 一维数组
    public function getRow($sql,$type="assoc"){
        $query=$this->query($sql);
        if(!in_array($type,array("assoc",'array',"row"))){
            die("mysqli_fetch_ type error");
        }
        $funcname="mysqli_fetch_".$type;
        return $funcname($query);
    }
    //获取一条记录,前置条件通过资源获取一条记录
    public function getFormSource($query,$type="assoc"){
        if(!in_array($type,array("assoc","array","row")))
        {
            die("mysqli_query error");
        }
        $funcname="mysqli_fetch_".$type;
        return $funcname($query);
    }
    //获取多条数据，二维数组
    public function getAll($sql,$type="assoc"){
        $query=$this->query($sql);
        $list=array();
        while ($r=$this->getFormSource($query,$type)) {
            $list[]=$r;
        }
        return $list;
    }
    /**
     * 插入多行数据的方法
     * @param string $table 表名
     * @param string $field 插入表中的字段
     * @param array $data [数据] 列如array(2) { [0]=> string(49) "'1277','张夫特','2018-10-11 20:30:19','王渊'" [1]=> string(49) "'1276','张伟特','2018-10-11 20:30:19','王渊'" }
     * @return int 影响的行数
     */
    public function inserts($table,$field,$data){
        $values='';
        foreach($data as $value){
            $values.='('.$value.'),';
        }
        $values=trim($values,',');
        $sql="insert into $table ($field) values $values";
        $this->query($sql);
        return mysqli_affected_rows($this->link);
    }
    /**
     * 插入一行数据的方法
     * @param string $table 表名
     * @param  array $data [数据]
     * @return int 最新添加的id
     */
    public function insert($table,$data){
        //遍历数组，得到每一个字段和字段的值
        $key_str='';
        $v_str='';
        foreach($data as $key=>$v){
            //if(empty($v)){
            //    die("error");
            //}
            //$key的值是每一个字段s一个字段所对应的值
            $key_str.=$key.',';
            $v_str.="'$v',";
        }
        $key_str=trim($key_str,',');
        $v_str=trim($v_str,',');
        //判断数据是否为空
        $sql="insert into $table ($key_str) values ($v_str)";
        $this->query($sql);
        //返回影响的行数
        return mysqli_affected_rows($this->link);
    }
    /*
     * 删除一条数据方法
     * @param1 $table, $where=array('id'=>'1') 表名 条件
     * @return 受影响的行数
     */
    public function deleteOne($table, $where){
        if(is_array($where)){
            foreach ($where as $key => $val) {
                $condition = $key.'='.$val;
            }
        } else {
            $condition = $where;
        }
        $sql = "delete from $table where $condition";
        $this->query($sql);
        //返回受影响的行数
        return mysqli_affected_rows($this->link);
    }
    /*
    * 删除多条数据方法
    * @param1 $table 表名
    * @param2 $where 条件
    * @return 受影响的行数
    */
    public function deleteAll($table, $where){
        if(is_array($where)){
            foreach ($where as $key => $val) {
                if(is_array($val)){
                    $condition = $key.' in ('.implode(',', $val) .')';
                } else {
                    $condition = $key. '=' .$val;
                }
            }
        } else {
            $condition = $where;
        }
        $sql = "delete from $table where $condition";
        $this->query($sql);
        //返回受影响的行数
        return mysqli_affected_rows($this->link);
    }
    /**
     * [修改操作description]
     * @param [string] $table [表名]
     * @param [array] $data [数据]
     * @param [string] $where [条件]
     * @return [int] 受影响的行数
     */
    public function update($table,$data,$where){
        //遍历数组，得到每一个字段和字段的值
        $str='';
        foreach($data as $key=>$v){
            $str.="$key='$v',";
        }
        $str=rtrim($str,',');
        //修改SQL语句
        $sql="update $table set $str where $where";
        $this->query($sql);
        //返回受影响的行数
        return mysqli_affected_rows($this->link);
    }
    /**
     * [统计个数操作]
     * @param [string] $table [表名]
     * @param [string] $where [条件]
     * @return [int] 统计个数
     */
    public function count($table,$where){
        $sql="SELECT count(*) from `$table` where $where";
        return intval($this->getRow($sql,'row')[0]);
    }

    public static function json($data){
        $count=0;
        foreach ( $data as $arr ) {
            foreach ($arr as $key => $value) {
                $arr[$key] = urlencode($value);
            }
            $count++;
        }
        $json=array(
            "code"=>0,
            "message"=>"ok",
            "count"=>$count,
            "data"=>$data
        );
        return urldecode(json_encode($json));
    }
}