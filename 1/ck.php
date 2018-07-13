<?php

set_time_limit(0);

//include_once "lib/Db.php";//dfms数据库操作类

exec('mode COM3: baud=9600 data=8 stop=1 parity=n xon=on');

//打开COM3口 O_RDWR读写模式 O_RDONLY只读

$fd = dio_open('COM3:', O_RDWR);

//打开失败报错

if(!$fd)

{

die("Error when open COM3");

}

//开始

$ff = dio_stat($fd);

//写信息

dio_write($fd,chr(0).chr(1));

//读取长度

$len = 80;

while(1){

//读取信息

$data = dio_read($fd, $len);

if($data){

echo $data;

echo "\r\n";   

} 

//sleep(1);

//dio_close($fd);

usleep(1000000 * 0.5); 

}