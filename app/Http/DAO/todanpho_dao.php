<?php

namespace App\Http\DAO;

use App\Http\DTO\todanpho;
use Illuminate\Support\Facades\DB;

class todanpho_dao
{

    /**
     * Class constructor.
     */
    public function __construct()
    { }

    /** insert record to table todanpho */
    public function create(todanpho $todanpho)
    {
        DB::insert('insert into todanpho (ten) values(?) ', [
            $todanpho->ten
        ]);
        echo '1 to dan pho created';
    }

    /** read all todanpho */
    public function readAll()
    {
        $list_of_todanpho = DB::select('select * from todanpho');
        $list_of_todanpho_objects = [];
        foreach ($list_of_todanpho as $todanpho_infos) {
            // The $todanpho_infos is stdClass instance
            $todanpho = new todanpho($todanpho_infos->todanpho_id, $todanpho_infos->ten);
            array_push($list_of_todanpho_objects, $todanpho);
        }
        // var_dump($list_of_todanpho);
        return $list_of_todanpho_objects;
    }

    /** read todanpho by ten */
    public function readByTen($ten)
    {
        $list_of_todanpho = DB::select('select * from todanpho where ten = ?', [$ten]);
        $list_of_todanpho_objects = [];
        foreach ($list_of_todanpho as $todanpho_infos) {
            $todanpho = new todanpho($todanpho_infos->todanpho_id, $todanpho_infos->ten);
            array_push($list_of_todanpho_objects, $todanpho);
        }
        return $list_of_todanpho_objects[0];
    }

    /** read todanpho by todanpho_id */
    public function readByID($todanpho_id)
    {
        $list_of_todanpho = DB::select('select * from todanpho where ten = ?', [$ten]);
        $list_of_todanpho_objects = [];
        foreach ($list_of_todanpho as $todanpho_infos) {
            $todanpho = new todanpho($todanpho_infos->todanpho_id, $todanpho_infos->ten);
            array_push($list_of_todanpho_objects, $todanpho);
        }
        return $list_of_todanpho_objects[0];
    }

    /** update todanpho by id */
    public function update(todanpho $todanpho)
    {
        $affected = DB::update('update todanpho set ten=? where todanpho_id = ?', [$todanpho->ten, $todanpho->todanpho_id]);
        return $affected;
    }

    /** delete todanpho by id */
    public function delete($todanpho_id)
    {
        $affected = DB::delete('delete todanpho where todanpho_id = ?', [$todanpho_id]);
        return $affected;
    }
}