<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (!empty($_REQUEST[$key])){
            return true; 
        } else {
            return false; 
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (!empty($_REQUEST[$key])){
            return trim(static::escape($_REQUEST[$key])); 
        } else {
            return $default;  
        }
    }

    public static function escape($input){
        return htmlspecialchars(strip_tags($input));
    }

    public static function getString($key)
    {
        $strCheck = static::get($key);
        if (!is_string($strCheck)){
            throw new exception("{$key} is not a string");
        }
        if (is_numeric($strCheck)){
            throw new exception("{$key} cannot be a number");
        }
        return $strCheck;
    }

    public static function getNumber($key)
    {
        $nbrCheck = static::get($key);
        if (!is_numeric($nbrCheck)){
            throw new exception("{$key} is not a number");
        }
        return $nbrCheck;
    }

    public static function getDate($key)
    {
        $dateCheck = static::get($key);
        $format = 'Y-m-d';
        $date = DateTime::createFromFormat($format, $dateCheck);
        if (!$date){
            throw new exception("{$key} is not a valid format");
        }

    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
