<?php

class session {
    
    /**
     * Start a session, if one is not already started
     */
    public static function start(){
        if(session_id() == ''){
            session_start();
        }
    }
    
    /**
     * Sets a $named session to $value. Returns true if successful.
     * @param string $name
     * @param string $value
     * @return boolean
     */
    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }
	
	
	public static function putArray($name, $value){
        return $_SESSION[$name][] = $value;
    }
    
    /**
     * Returns the $named session variable
     * @param string $name
     * @return string
     */
    public static function get($name){
        return (self::exists($name)) ? $_SESSION[$name] : null;
    }
    
    /**
     * Returns true if $named session exists
     * @param string $name
     * @return boolean
     */
    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
    }
    
    /**
     * Deletes the $named session, if it exists
     * @param string $name
     */
    public static function delete($name){
        if(self::exists($name)){
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }
	
	public static function deleteAll(){
        session_unset();
    	session_destroy();
    }
    
   
    
}