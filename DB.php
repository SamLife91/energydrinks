<?php

class Database
{

    /*
     * Edit the following variables
     */
    private $db_host = 'localhost';     // Database Host
    private $db_user = 'root';          // Username
    private $db_pass = '';          // Password
    private $db_name = 'energydb';          // Database
    /*
     * End edit
     */

    private $con = false;               // Checks to see if the connection is active
    private $result = array();          // Results that are returned from the query
    public function __constructor() {
        // include_once "configDB.php";
        // $this->db_host = $host;
        // $this->db_user = $db_user;
        // $this->db_pass = $db_pass;
        // $this->db_name = $db_name;
    }
    /*
     * Connects to the database, only one connection
     * allowed
     */
    public function connect()
    {
        if(!$this->con)
        {
            $this->con = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            if($this->con)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

    /*
    * Checks to see if the table exists when performing
    * queries
    */
    private function tableExists($table)
    { 
        $tablesInDb = mysqli_query($this->con, 'SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        // $tablesInDb = mysqli_fetch_array($tablesInDb, MYSQLI_ASSOC);
        if($tablesInDb)
        {
            if(mysqli_num_rows($tablesInDb)==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    /*
    * Selects information from the database.
    * Required: table (the name of the table)
    * Optional: rows (the columns requested, separated by commas)
    *           where (column = value as a string)
    *           order (column DIRECTION as a string)
    */
    public function select($table, $cols = '*', $where = null, $order = null,$limit = null)
    {
        $q = 'SELECT '.$cols.' FROM '.$table;
        if($where != null and is_array($where)){
            $wherestr = array();
            foreach ($where as $key => $value) {
                $wherestr[]= $key.'="'.$value.'"';
            }
            $wherestr = implode(' and ' , $wherestr);
            $q .= ' WHERE '.$wherestr;
        }
        if($order != null){
            $q .= ' ORDER BY '.$order;
        }
        if($limit !=null){
            $q .= ' LIMIT '.$limit;
        }
        // echo 'tableExist'. $this->tableExists($table);
        if(!$this->tableExists($table)){return false;}

        $query = mysqli_query($this->con,$q);
        if($query)
        {
            $this->numResults = mysqli_num_rows($query);
            $this->result = null;
            for($i = 0; $i < $this->numResults; $i++)
            {
                $r = mysqli_fetch_array($query,MYSQLI_ASSOC);
                $key = array_keys($r);
                for($x = 0; $x < count($key); $x++)
                {
                    // Sanitizes keys so only alphavalues are allowed
                    if(!is_int($key[$x]))
                    {
                        // if(mysqli_num_rows($query) > 1)
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        // else if(mysqli_num_rows($query) < 1)
                            // $this->result = null;
                        // else
                            // $this->result[$key[$x]] = $r[$key[$x]];
                    }
                }
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    /*
    * Insert values into the table
    * Required: table (the name of the table)
    *           values (the values to be inserted)
    * Optional: rows (if values don't match the number of rows)
    */
    public function insert($table,$data)
    {
        if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            $cols = implode(',',array_keys($data));
            $insert .= ' ('.$cols.')';
            foreach($data as $key => $value)
            {
                if(is_string($value)){
                    $data[$key] = '"'.$value.'"';
                }
            }
            $data = implode(',',$data);
            $insert .= ' VALUES ('.$data.')';
            $ins = mysqli_query($this->con, $insert);
            if($ins)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    /*
    * Deletes table or records where condition is true
    * Required: table (the name of the table)
    * Optional: where (condition [column =  value])
    */
    public function delete($table,$where = null)
    {
        if($this->tableExists($table))
        {
            if($where == null)
            {
                return false;
            }else{
                $criteria = array();
                foreach ($where as $key => $value) {
                    $criteria[] = $key .'= "'.$value.'"';
                }
                $where = implode(' AND ',$criteria);
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }
            $del = mysqli_query($this->con, $delete);
            if($del){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*
     * Updates the database with the values sent
     * Required: table (the name of the table to be updated
     *           rows (the rows/values in a key/value array
     *           where (the row/condition in an array (row,condition) )
     */
    public function update($table,$cols,$where)
    {
        if($this->tableExists($table))
        {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            $criteria = array();
            foreach ($where as $key => $value) {
                $criteria[] = $key .'= "'.$value.'"';
            }
            $where = implode(' AND ',$criteria);

            $update = 'UPDATE '.$table.' SET ';
            
            $data = array();
            foreach ($cols as $key => $value) {
                if(is_string($value)){
                    $data[] = $key.' = "'.$value.'"';
                }else {
                    $data[] = $key.' = '.$value;
                }
            }
            $update .= implode(',',$data);
            $update .= ' WHERE '.$where;

            $query = mysqli_query($this->con, $update);
            if($query){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*
    * Returns the result set
    */
    public function getResult()
    {
        return $this->result;
    }
    public  function  closeDB()
    {
        mysqli_close($this->con);
    }
    public function isAdmin($user_id)
    {
     $is_admin = false;
        $where = 'is_admin ='.(int)$user_id;
         $res = $this->select('users', '*', $where);
         var_dump($res);
         if($res){
            if($this->result['is_admin']==1){
                return true;
            }else {
                return false;
            }
         } 
    }
    public function checkLogin($user, $pass){
        $user=filter_var($user, FILTER_SANITIZE_STRING);
        $pass=filter_var($pass, FILTER_SANITIZE_STRING);
        $pass=sha1($pass);
        $criteria= array('name'=>$user,'pass'=>$pass);
        $res = $this->select('users', 'user_id,name,is_admin',$criteria);
        if($res){
            $result=$this->getResult();
            if(count($result)){
                $_SESSION['name']=$result[0]['name'];
                $_SESSION['admin']=$result[0]['is_admin'];
                $_SESSION['id']=$result[0]['user_id'];
                return true;
            }else{
                return false;
            }
        }
    }
    public function existUser($user){
        $user=filter_var($user, FILTER_SANITIZE_STRING);
        $criteria = array('name' => $user );
        $res=$this->select('users','name',$criteria);
        if($res){
            $result=$this->getResult();
            if(count($result)){
                return true;
            }
            else {
                return false;
            }
        }
    }
}
?>