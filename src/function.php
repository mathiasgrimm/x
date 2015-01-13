<?php
/**
 * X (https://github.com/mathiasgrimm/x)
 *
 * @author Mathias Grimm <mathiasgrimm@gmail.com>
 */
use mathiasgrimm\x\X;

/**
 * @param mixed ...$args
 * 
 */
function x()
{
    if (!X::getDebug()) {
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
        var_dump($aArg);
        
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

/**
 * @param mixed ...$args
 *
 */
function xd()
{
    if (!X::getDebug()) {
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
        var_dump($aArg);
        
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

/**
 * debug data for json-handler chrome/firefox plugin 
 * Firefox https://addons.mozilla.org/en-US/firefox/addon/json-handle/reviews/
 * Chrome  
 * 
 * @param mixed ...$args
 */
function j()
{
    if (!X::getDebug()) {
        return;
    }
    
    echo ob_get_clean();
    
    $aDbt = debug_backtrace();
    
    $aData = array(
        'sFile' => $aDbt[0]['file'],
        'sLine' => $aDbt[0]['line'],
        'aArgs' => func_get_args()
    );
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($aData);
    die();
}