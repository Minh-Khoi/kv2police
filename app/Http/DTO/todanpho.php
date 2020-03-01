<?php

namespace App\Http\DTO;

class todanpho
{
    public $todanpho_id, $ten;

    /**
     * Class constructor.
     */
    public function __construct($todanpho_id, $ten)
    {
        $this->todanpho_id = $todanpho_id;
        $this->ten = $ten;
    }
}