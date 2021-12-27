<?php
if (!defined('HOST')) {
    exit;
}
class Sach extends Db
{
    // cac phuong thuc 
    function all()
    {
        return $this->selectQuery('select * from sach');
    }

    function random($n)
    {
        return $this->selectQuery("select * from sach order by rand() limit 0, $n");
    }
    function getAllLoaiSach()
    {
        return $this->selectQuery('select * from loai');
    }
    function getAllNXB()
    {
        return $this->selectQuery('select * from nhaxb');
    }
    function detail($id)
    {
        $data = $this->selectQuery('select * from sach where masach=?', [$id]);
        return $data[0];
    }

    //add product
    public function addBook($id, $name, $des, $price, $img, $nxb, $loai)
    {
        $sql = "INSERT INTO sach(masach, tensach, mota, gia, hinh, manxb, maloai) 
        VALUES ('$id','$name','$des','$price','$img','$nxb','$loai')";
        $data = $this->updateQuery($sql);
        return $this->selectQuery('select * from sach');
    }
    function getInfoSach($id)
    {
        $data = $this->selectQuery('select * from sach where masach=?', [$id]);
        return $data[0];
    }

    //delete product
    function delete($id)
    {
        $data = $this->selectQuery(' DELETE FROM `sach`where masach=?', [$id]);
        return $this->selectQuery('select * from sach');
    }
}