<?php

set_time_limit(0);

//include_once "lib/Db.php";//dfms���ݿ������

exec('mode COM3: baud=9600 data=8 stop=1 parity=n xon=on');

//��COM3�� O_RDWR��дģʽ O_RDONLYֻ��

$fd = dio_open('COM3:', O_RDWR);

//��ʧ�ܱ���

if(!$fd)

{

die("Error when open COM3");

}

//��ʼ

$ff = dio_stat($fd);

//д��Ϣ

dio_write($fd,chr(0).chr(1));

//��ȡ����

$len = 80;

while(1){

//��ȡ��Ϣ

$data = dio_read($fd, $len);

if($data){

echo $data;

echo "\r\n";   

} 

//sleep(1);

//dio_close($fd);

usleep(1000000 * 0.5); 

}