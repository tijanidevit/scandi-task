<?php
namespace App\Core;

class Validation
{
    public static function string($key):bool
    {
        if(isset($_POST[$key])){
            return !strlen(trim($_POST[$key])) == 0;
        }
        return false;
    }

    public static function floatRequired($key):bool
    {
        if(isset($_POST[$key])){
            return filter_var($_POST[$key], FILTER_VALIDATE_FLOAT) && $_POST[$key] > 0;
        }
        else {
            return false;
        }
    }
    public static function float($key):bool
    {
        if(isset($_POST[$key])){
            return filter_var($_POST[$key], FILTER_VALIDATE_FLOAT) && $_POST[$key] > 0;
        }
        else {
            return true;
        }
    }

    public static function integer($key):bool
    {
        if(isset($_POST[$key])){
            return filter_var($_POST[$key], FILTER_VALIDATE_INT) && $_POST[$key] > 0;
        }
        else {
            return true;
        }
    }
    public static function exists($table, $column, $key):bool
    {
        if(isset($_POST[$key])){
            return !((new Database)->checkExistence($table,$column,$_POST[$key]));
        }
        return false;
    }
}

