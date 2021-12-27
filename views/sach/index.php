<div class="container">
  <form action='index.php?controller=sach&action=loc' method='POST' enctype='multipart/form-data'>
    <div class="row">

      <div class="col-6 col-sm-6">
        Loại <select name="maloai" id="" class="form-control">
         
        </select>
      </div>
      <div class="col-6 col-sm-6">
        Nhà xuất bản <select name="manxb" id="" class="form-control">
        
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mx-auto" value='Thêm mới'>Lọc</button>

  </form>
</div>
<table class='table table-info'>
  <div class="table-dark">
    <td class="columnTitle">Hình sách</td>
    <td class="columnTitle">Mã sách</td>
    <td class="columnTitle">Tên sách</td>
    <td class="columnTitle">Giá</td>
    <td class="columnTitle">Detail</td>
   
  </div>
   
</table>