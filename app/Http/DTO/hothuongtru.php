<?php

namespace App\Http\DTO;

class hothuongtru
{
    public $ho_id, $todanpho_id, $ten_chu_ho, $so_hshk;

    public function __construct($ho_id,  $ten_chu_ho, $so_hshk, $todanpho_id)
    {
        $this->ho_id = $ho_id;
        $this->ten_chu_ho = $ten_chu_ho;
        $this->so_hshk = $so_hshk;
        $this->todanpho_id = $todanpho_id;
    }
}