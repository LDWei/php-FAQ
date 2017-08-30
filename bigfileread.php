<?php
defined('READ_FILE')  or define('READ_FILE', './error.log');
defined('WRITE_FILE_C') or define('WRITE_FILE_C', './temp1');

// 方法 fgets
function writeLogC()
{
    $st = microtime( true );
    $sm = memory_get_usage();

    $fileres  = fopen(READ_FILE, 'r');
    $writeres = fopen(WRITE_FILE_C, 'a+');

    // 锁定 WRITE_FILE
    flock($writeres, LOCK_EX);

    while( $row = fgets($fileres) )
    {
	if( strpos($row, "[error]") !== false )
	{
    	    fwrite($writeres, $row);
	}
    }

    $em = memory_get_usage();
    flock($writeres, LOCK_UN);
    fclose($writeres);
    fclose($fileres);

    $et = microtime( true );
    echo "使用 fgets: 用时间：" . ($et - $st) . "\n";
    echo "使用 fgets: 用内存：" . ($em - $sm) . "\n";
}
writeLogC();