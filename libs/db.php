<?php
/**
Library: db
Version: 1.0.0
Assembly: 19.07.2013
Mod: true
edit func db, db_to_array;
Support Version: 1.0
 */
//defined('_CEXES') or die('Ограниченный доступ');

$_db_queries_count = 0;
$_db_connects_count = 0;
$_db_queries = '';

// Создать соединение с базой
/**
 * @param $host
 * @param $name
 * @param $login
 * @param $pass
 * @return resource
 */
function db_connect($host, $name, $login, $pass) {
    if( !$id = mysql_connect($host, $login, $pass) )
    {
        exit('Ошибка подключения к базе: '.$name);
    }
    if( !mysql_select_db($name) )
    {
        exit('Ошибка выбора базы: '.$name);
    }

    global $_db_connects_count;
    $_db_connects_count++;

    mysql_query("SET NAMES 'utf8'");
    $_db_queries[] = "SET NAMES 'utf8'";
    return $id;
}

function db($query, $to = 0) {
    $to = intval($to);
    if(is_string($query))
    {
        if($r = mysql_query($query))
        {
            global $_db_queries_count, $_db_queries;
            $_db_queries_count++;
            //$_db_queries[] = debug_backtrace()[2]['file'] . ':'.debug_backtrace()[2]['line'] . ' => '.$query;
            if($to > 0)
                mysql_data_seek($r, $to);
            //print_r($r);
            return $r;
        }
    }
    else if(is_resource($query))
    {
        mysql_data_seek($query, $to);
        return $query;
    }
    return null;
}

function db_insert($table, $insert) {
    if(is_array($insert))
    {
        $key = '';
        $val = '';
        foreach($insert as $k => $v)
        {
            $key .= "`$k`,";
            $val .= "'$v',";
        }
        $key = substr($key, 0, strlen($key) - 1);
        $val = substr($val, 0, strlen($val) - 1);
        return db("INSERT INTO $table ($key) VALUES ($val)");
    }
    return null;
}

function db_row($query, $type = MYSQL_ASSOC) {
    if(is_string($query))
    {
        if(($r = db($query)) != null)
        {
            return mysql_fetch_array($r, $type);
        }
    }
    else if(is_resource($query))
    {
        return mysql_fetch_array($query, $type);
    }
    return null;
}

function db_to_array($query, $key = null, $type = MYSQL_ASSOC) {
    if(is_string($query))
    {
        $query = db($query);
    }
    if(is_resource($query))
    {
        $res = array();
        if( $key != null )
            while($r = db_row($query, $type))
            {
                $res[] = $r[$key];
            }
        else
            while($r = db_row($query, $type))
                $res[] = $r;
        return $res;
    }
    return null;
}

// Обновить значения в таблице
function db_update($table, $update, $where = '') {
    if(is_array($update))
    {
        $upd = '';
        foreach($update as $k => $v)
        {
            $upd .= "`$k` = '$v', ";
        }
        $upd = substr($upd, 0, strlen($upd) - 2);

        return db("UPDATE $table SET $upd ".(is_numeric($where) ? "WHERE `id` = '$where'" : $where));
    }
    return null;
}

db_connect('localhost','questions','root','');