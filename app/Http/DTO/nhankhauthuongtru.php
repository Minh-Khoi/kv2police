<?php

namespace App\Http\DTO;

class nhankhauthuongtru
{
    public $nhankhau_id, $hoten, $hotenkhac, $ngaysinh, $gioitinh, $quequan, $dantoc,
        $tongiao, $cmnd, $passport, $nghenghiep, $quanhe_chuho, $so_hshk, $ho_id;

    /**
     * Class constructor.
     */
    public function __construct(
        $nhankhau_id,
        $hoten,
        $hotenkhac,
        $ngaysinh,
        $gioitinh,
        $quequan,
        $dantoc,
        $tongiao,
        $cmnd,
        $passport,
        $nghenghiep,
        $quanhe_chuho,
        $so_hshk,
        $ho_id
    ) {
        $this->nhankhau_id = $nhankhau_id;
        $this->hoten = $hoten;
        $this->hotenkhac = $hotenkhac;
        $this->ngaysinh = $ngaysinh;
        $this->gioitinh = $gioitinh;
        $this->quequan = $quequan;
        $this->dantoc = $dantoc;
        $this->tongiao = $tongiao;
        $this->cmnd = $cmnd;
        $this->passport = $passport;
        $this->nghenghiep = $nghenghiep;
        $this->quanhe_chuho = $quanhe_chuho;
        $this->so_hshk = $so_hshk;
        $this->ho_id = $ho_id;
    }
}
