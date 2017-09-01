<?php
/**
 * 冒泡排序算法示例
 */

// 这里以一维数组做演示
$demo_array = array(23,15,43,25,54,2,6,82,11,5,21,32,65);

// 第一层for循环可以理解为从数组中键为0开始循环到最后一个
for ($i=0;$i<count($demo_array);$i++) {
    // 第二层将从键为$i的地方循环到数组最后
    for ($j=$i+1;$j<count($demo_array);$j++) {
        // 比较数组中相邻两个值的大小
        if ($demo_array[$i] > $demo_array[$j]) {
            $tmp            = $demo_array[$i]; // 这里的tmp是临时变量
            $demo_array[$i] = $demo_array[$j]; // 第一次更换位置
            $demo_array[$j] = $tmp;            // 完成位置互换
        }
    }
}

// 打印结果集
echo '<pre>';
var_dump($demo_array);
echo '</pre>';