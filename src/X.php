<?php
/**
 * X (https://github.com/mathiasgrimm/x)
 *
 * @author Mathias Grimm <mathiasgrimm@gmail.com>
 */
namespace MathiasGrimm\X;

class X
{
    private static $bIsDebug = false;
    
    public function __construct($bIsDebug = true, $bRegisterFunctions = true)
    {
        self::$bIsDebug = $bIsDebug;
        
        if ($bRegisterFunctions) {
            self::registerFunctions();
        }
    }
    
    public static function setDebug($isDebug)
    {
        self::$bIsDebug = $isDebug;
    }
    
    public static function getDebug()
    {
        return self::$bIsDebug;
    }
    
    public static function registerFunctions()
    {
        require_once 'function.php';
    }
}
