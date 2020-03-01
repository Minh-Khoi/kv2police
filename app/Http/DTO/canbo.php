<?php

namespace App\Http\DTO;

class canbo
{
    public $canbo_id, $todanpho_id, $hoten, $so_hieu, $chucvu, $password, $on_working;

    public function __construct($canbo_id, $todanpho_id, $hoten, $so_hieu, $chucvu, $password)
    {
        $this->canbo_id = $canbo_id;
        $this->todanpho_id = $todanpho_id;
        $this->hoten = $hoten;
        $this->so_hieu = $so_hieu;
        $this->chucvu = $chucvu;
        $this->password = $password;
        $this->on_working = true;
    }
}
