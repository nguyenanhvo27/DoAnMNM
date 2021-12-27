<?php 
//$action = isset($_GET['action'])?$_GET['action']:'index';
//$action = isset($_GET['action'])?$_GET['action']:'index';
//                       action: key                
$action = Utilities::get('action', 'index');
$sach = new Sach();


if ($action=='index')
{
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    $data =$sach->random(4);
//print_r($data);
    include './views/sach/index.php';
}
if ($action=='tatca')
{
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    $data =$sach->all();
//print_r($data);
    include './views/sach/index.php';
}