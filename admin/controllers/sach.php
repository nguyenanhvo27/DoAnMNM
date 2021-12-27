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

//delete product
if($action == 'delete'){
    $id = isset($_GET['id'])?$_GET['id']:'';
    $data =$sach->delete($id); 
    include './views/index.php';
}

if($action == 'Addsach'){
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    include './views/add.php';
}

//add product
if($action == 'addBook'){
    $masach=isset($_POST['masach'])?$_POST['masach']:'';
    $tensach=isset($_POST['tensach'])?$_POST['tensach']:'';
    $gia=isset($_POST['gia'])?$_POST['gia']:'';

    $hinh="";
    if($_FILES['hinh']['error']==0){
        $hinh=$_FILES['hinh']['name'];
        $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    move_uploaded_file($_FILES['hinh']['tmp_name'],$rootDir.'../DoAnMNM/assets/img/book/'.$hinh);
        var_dump("vo".$masach,"danh".$tensach,"suong".$hinh);
    }

    $maloai=isset($_POST['maloai'])?$_POST['maloai']:'';
    $manxb=isset($_POST['manxb'])?$_POST['manxb']:'';
    $mota=isset($_POST['mota'])?$_POST['mota']:'';

    $data=$sach->addBook($masach, $tensach, $mota, $gia, 
    $hinh, $manxb, $maloai);
    
  
    include './views/index.php';  
}

//edit product
if($action =='update'){
    $id = isset($_GET['id'])?$_GET['id']:'';
    $dataUpdate=$sach->getInfoSach($id);
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
    include './views/update.php';
}


if($action == 'updateBook'){
    $masach=isset($_POST['masach'])?$_POST['masach']:'';
    $tensach=isset($_POST['tensach'])?$_POST['tensach']:'';
    $gia=isset($_POST['gia'])?$_POST['gia']:'';

    $hinh="";
    if($_FILES['hinh']['error']==0){
        $hinh=$_FILES['hinh']['name'];
        $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    move_uploaded_file($_FILES['hinh']['tmp_name'],$rootDir.'../DoAnCuoiKyThucHanhWeb_NguyenAnhVo_DH51803800/assets/img/book/'.$hinh);

    }

    $maloai=isset($_POST['maloai'])?$_POST['maloai']:'';
    $manxb=isset($_POST['manxb'])?$_POST['manxb']:'';
    $mota=isset($_POST['mota'])?$_POST['mota']:'';

    $data=$sach->updateBook($masach, $tensach, $mota, $gia, 
    $hinh, $manxb, $maloai);
    
    
    include './views/index.php';  
}

if ($action=='detail')
{
    //$id = isset($_GET['id'])?$_GET['id']:'';
    $id =Utilities::get('id');
    $data =$sach->detail($id);
    $maloai =$_GET['id'];
    $hinh="";
    
    include './views/detail.php';
}
if ($action=='search')
{
    $dataloai=$sach->getAllLoaiSach();
    $datanxb=$sach->getAllNXB();
   // $kw = isset($_GET['kw'])?$_GET['kw']:'';
   $kw = Utilities::get('kw');
    $data = $sach->search($kw);
    include './views/index.php';
}


?>