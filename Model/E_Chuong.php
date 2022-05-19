<?php
          class Enity_Chuong{
                    public $idchuong;
                    public $idtruyen;
                    public $chuongso;
                    public $chuongten;
                    public $noidung;
                    public function __construct($idchuong, $idtruyen, $chuongso, $chuongten, $noidung)
                    {
                              $this->idchuong = $idchuong;
                              $this->idtruyen = $idtruyen;
                              $this->chuongso = $chuongso;
                              $this->chuongten = $chuongten;
                              $this->noidung = $noidung;
                    }
          }
?>
