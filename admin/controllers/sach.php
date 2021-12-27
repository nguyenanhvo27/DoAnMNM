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
if ($action=='detail')
{
    
    $id =Utilities::get('id');
    $data =$sach->detail($id);
    $maloai =$_GET['id'];
    $hinh="";
    
    include './views/detail.php';
}

//add product
if($action == 'Addsach'){
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    include './views/add.php';
}

if($action == 'addBook'){
    $masach=isset($_POST['masach'])?$_POST['masach']:'';
    $tensach=isset($_POST['tensach'])?$_POST['tensach']:'';
    $gia=isset($_POST['gia'])?$_POST['gia']:'';

    $hinh="";
    if($_FILES['hinh']['error']==0){
        $hinh=$_FILES['hinh']['name'];
        $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    move_uploaded_file($_FILES['hinh']['tmp_name'],$rootDir.'../DoAnMNM/assets/img/book/'.$hinh);
    }

    $maloai=isset($_POST['maloai'])?$_POST['maloai']:'';
    $manxb=isset($_POST['manxb'])?$_POST['manxb']:'';
    $mota=isset($_POST['mota'])?$_POST['mota']:'';

    $data=$sach->addBook($masach, $tensach, $mota, $gia, 
    $hinh, $manxb, $maloai);
    
  
    include './views/index.php';  
}