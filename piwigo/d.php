<?php
# https://photos.kapable.info/d.php?img=./galleries/2020/202007_Sprint-racing-et-barbecue/202007_Sprint-racing-et-barbecue--10.jpg
$conf = array();
include 'local/config/database.inc.php';
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

#$get_img = $_GET['img'];
$get_img = $argv['1'];

$bucket_name = 'kapable-photos';

echo $get_img . PHP_EOL;

$img=preg_replace('/^.*galleries./', '', $get_img);

echo $img . PHP_EOL;

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region' => 'eu-west-2'
]);


$result = $s3->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}

$command = $s3->getCommand('ListObjects');
$command['MaxKeys'] = 50;
$command['Prefix'] = 'photos/';
$command['Bucket'] = $bucket_name;
$result = $s3->execute($command);


foreach ($result['Contents']  as $object) {
    echo $object['Key'] . PHP_EOL;
}





exit;

 ?>
