<?php
          class Enity_Truyen{
                   public $idtruyen;
                   public $idloai;
                   public $iduser;
                   public $tentruyen;
                   public $tinhtrang;
                   public $tacgia;
                   public $gioithieu;
                   public $ngaydang;
                   public $hinhdaidien;
                   public $duyet;
                   public function __construct($idtruyen,$idloai,$iduser,$tentruyen,$tinhtrang, $tacgia, $gioithieu, $ngaydang,$hinhdaidien,$duyet)
                   {
                             $this->idtruyen = $idtruyen;
                             $this->idloai = $idloai;
                             $this->iduser= $iduser;
                             $this->tentruyen = $tentruyen;
                             $this->tinhtrang = $tinhtrang;
                             $this->tacgia = $tacgia;
                             $this->gioithieu = $gioithieu;
                             $this->ngaydang = $ngaydang;
                             $this->hinhdaidien = $hinhdaidien;
                             $this->duyet = $duyet;
                   }
          }
?>