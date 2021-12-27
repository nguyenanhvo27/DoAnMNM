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
}