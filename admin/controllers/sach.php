<?php

$action = isset($_GET['action'])?$_GET['action']:'index';
$sach = new Sach();
if ($action=='index')
{
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    $data =$sach->all();
//print_r($data);
    include './views/index.php';
}