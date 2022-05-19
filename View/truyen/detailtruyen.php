<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/danh_sach_chuong.css">
    <title></title>
</head>

<body>
          <div class="truyen">
                    <h2><?= $truyen->tentruyen ?></h2>
                    <p>Tác giả         <?= $truyen->tacgia ?></p>
                    <p>Thể loại       <?= $theloai ?></p>
                    <button>Theo dõi</button>
                    <button>Đọc từ đầu</button>
                    <button>Đọc mới nhất</button>
          </div>
    <div class="danhsachchuong">
        <h3>Danh sách chương</h3>
        <table border="1px">
            <thead>
                <tr>
                    <th>Chương số</th>
                    <th>Tên</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($danhsachchuong) || is_object($danhsachchuong))
                    {
                        foreach ($danhsachchuong as $value){ ?>
                <tr>
                    <td><a href="index.php?controller=chuong&action=detail&idchuong=<?= $value->idchuong?>">Chapter <?=$value->chuongso ?></a></td>
                    <td><?=$value->chuongten ?></td>
                </tr>
                <?php
                        }
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>