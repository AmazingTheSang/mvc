<!DOCTYPE html>
<html lang="en">
          <head>
                    <meta charset="UTF-8">
                
                    <link href="View\truyen\style.css" rel="stylesheet" >
                    <title>Duyệt truyện</title>
                    
          </head>
<body>
          
          <form class="danhsachtruyen" method="POST">
          <h3>Danh sách truyện chờ duyệt</h3>
          <table  border="1px">
               <thead>
                    <tr>
                              <th>Số thứ tự</th>
                              <th>Hình đại diện</th>
                              <th>Tên truyện</th>
                              <th>Thể loại</th>
                              <th>Tác giả</th>
                              <th>Người đăng</th>
                              <th>Giới thiệu</th>
                              <th>Ngày đăng</th>
                             
                    </tr>
               </thead>
               <tbody>
                    <?php
                    $stt = 1;
                    for($i=0;$i<sizeof($danhsachtruyen);$i++){
                         $nguoidang = $db->getNguoiDang($danhsachtruyen[$i]->iduser);
                         $loaitruyen = $db->getTheLoai($danhsachtruyen[$i]->idloai);
                    ?>
                    <tr>
                         <td><?= $stt ?></td>
                         <td><img width="30" height="50"   src="./Images/<?=$danhsachtruyen[$i]->hinhdaidien?>" ></td>
                         <td><?= $danhsachtruyen[$i]->tentruyen ?></td>
                         <td><?=$nguoidang?></td>
                         <td><?=$danhsachtruyen[$i]->tacgia ?></td>
                         <td><?=$nguoidang   ?></td>
                         <td><?=$danhsachtruyen[$i]->gioithieu  ?></td>     
                         <td><?=$danhsachtruyen[$i]->ngaydang  ?></td>
                         <td><input type="checkbox" value="<?=$danhsachtruyen[$i]->idtruyen ?>" name="checklist[ ]"></td>
                    </tr>
                    <?php $stt++; } ?>
               </tbody>
          </table>
          
          <input type="submit" value="Duyệt" name="duyettruyen" onsubmit="window.location.reload();">
           </form>
</body>
</html>