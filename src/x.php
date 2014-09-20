<?php
namespace mathiasgrimm\x;

class X
{
    private static $isDebug = false;
    
    public static function setDebug($isDebug)
    {
        self::$isDebug = $isDebug;
    }
    
    public static function getDebug()
    {
        return self::$isDebug;
    }
    
    public static function x()
    {
        if (!self::$isDebug) {
            return;
        }
    
        echo ob_get_clean();
    
        $bCli = php_sapi_name() == 'cli' ? true : false;
        $sNl = $bCli ? "\n" : "<br />";
    
        $aDbt = debug_backtrace();
        $sFile = $aDbt[0]['file'];
        $sLine = $aDbt[0]['line'];
    
        $aArgs = func_get_args();
    
        if (!$bCli) {
            echo "<div style='text-align:left; border:2px solid;padding:10px;background:#096;'>";
        }
    
        echo "DEBUG X {$sNl}";
        echo "File: {$sFile} {$sNl}";
        echo "Line: {$sLine} {$sNl}";
    
        if (!$bCli) {
            echo "<pre>";
        }
    
        foreach ($aArgs as $iIdx => $aArg) {
            if ($bCli) {
                echo $sNl;
            } else {
                echo "<div style='border:1px dotted;padding:10px;'>";
            }
    
            echo "ARG [$iIdx] {$sNl}";
            print_r($aArg);
    
            if (!$bCli) {
                echo "</div>";
            }
    
            echo "{$sNl}";
        }
    
        if (!$bCli) {
            echo "</pre>";
            echo "</div>";
        }
    
        echo "{$sNl}{$sNl}";
    }
    
    public static function xd()
    {
        if (!self::$isDebug) {
            return;
        }
    
        echo ob_get_clean();
    
        $bCli = php_sapi_name() == 'cli' ? true : false;
        $sNl = $bCli ? "\n" : "<br />";
    
        $aDbt = debug_backtrace();
        $sFile = $aDbt[0]['file'];
        $sLine = $aDbt[0]['line'];
    
        $aArgs = func_get_args();
    
        if ($bCli) {
            echo $sNl;
        } else {
            echo "<div style='text-align:left; border:2px solid;padding:10px;background:#BBB;z-index:90000;'>";
        }
    
        echo "DEBUG XD {$sNl}";
        echo "File: {$sFile} {$sNl}";
        echo "Line: {$sLine} {$sNl}";
    
        if (!$bCli) {
            echo "<pre>";
        }
    
        foreach ($aArgs as $iIdx => $aArg) {
            if (!$bCli) {
                echo "<div style='border:1px dotted;padding:10px;'>";
            } else {
                echo $sNl;
            }
    
            echo "ARG [$iIdx] {$sNl}";
            print_r($aArg);
    
            if (!$bCli) {
                echo "</div>";
            }
    
            echo "{$sNl}";
        }
    
        if (!$bCli) {
            echo "</pre>";
            echo "</div>";
        }
    
        echo "{$sNl}{$sNl}";
        die();
    }
    
    public static function registerAliases()
    {
        if (function_exists('x')) {
            throw new \Exception('Function \'x\' already exists');
        } else {
            function x() 
            {
                call_user_func_array('X::x', func_get_args());
            }
        }

            
    }
}