<?php declare(strict_types=1);

$my_array = array_merge(['aa'=>'bb','cc'=>'dd'],['ee'=>'ff','gg'=>'hh']);
//$my_array = array_merge($my_array,['ee1'=>'ff1','gg1'=>'hh1']);
$my_array[] = ['ee1'=>'ff1','gg1'=>'hh1'];
var_dump($my_array);
