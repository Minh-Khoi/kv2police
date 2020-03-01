<?php

namespace App\Http\DAO;

use App\Http\DTO\canbo;
use Illuminate\Support\Facades\DB;

class canbo_dao
{
    private $conn;
    /**
     * Class constructor.
     */
    public function __construct()
    { }

    //** insert to table canbo */
    public function create(canbo $canbo)
    {
        DB::insert('insert into canbo (todanpho_id, hoten, so_hieu, chucvu, password, on_working) values(?,?,?,?,?,?) ', [
            $canbo->todanpho_id, $canbo->hoten, $canbo->so_hieu, $canbo->chucvu, $canbo->password, $canbo->on_working
        ]);
    }

    /**
     * read all records canbo
     */
    public function readAll()
    {
        $list_of_canbo = DB::select('select * from canbo');
        $list_of_objects_canbo = [];
        foreach ($list_of_canbo as $canbo_infos_array) {
            $canbo = new canbo(0, 0, 0, 0, 0, 0);
            $canbo->todanpho_id = $canbo_infos_array->todanpho_id;
            $canbo->hoten = $canbo_infos_array->hoten;
            $canbo->so_hieu = $canbo_infos_array->so_hieu;
            $canbo->chucvu = $canbo_infos_array->chucvu;
            $canbo->password = $canbo_infos_array->password;
            $canbo->on_working = $canbo_infos_array->on_working;

            array_push($list_of_objects_canbo, $canbo);
        }
        return $list_of_objects_canbo;
    }

    /**
     *  Read records canbo by id
     */
    public function readById($canbo_id)
    {
        $list_of_canbo = DB::select('select * from canbo where canbo_id = ?', [$canbo_id]);
        $list_of_objects_canbo = [];
        foreach ($list_of_canbo as $canbo_infos_array) {
            $canbo = new canbo(0, 0, 0, 0, 0, 0);
            $canbo->todanpho_id = $canbo_infos_array->todanpho_id;
            $canbo->hoten = $canbo_infos_array->hoten;
            $canbo->so_hieu = $canbo_infos_array->so_hieu;
            $canbo->chucvu = $canbo_infos_array->chucvu;
            $canbo->password = $canbo_infos_array->password;
            $canbo->on_working = $canbo_infos_array->on_working;

            array_push($list_of_objects_canbo, $canbo);
        }
        return $list_of_objects_canbo[0];
    }

    /**
     * Read records canbo by sohieu
     */
    public function readBySoHieu($so_hieu)
    {
        $list_of_canbo = DB::select('select * from canbo where so_hieu = ?', [$so_hieu]);
        $list_of_objects_canbo = [];
        foreach ($list_of_canbo as $canbo_infos_array) {
            $canbo = new canbo(0, 0, 0, 0, 0, 0);
            $canbo->todanpho_id = $canbo_infos_array->todanpho_id;
            $canbo->hoten = $canbo_infos_array->hoten;
            $canbo->so_hieu = $canbo_infos_array->so_hieu;
            $canbo->chucvu = $canbo_infos_array->chucvu;
            $canbo->password = $canbo_infos_array->password;
            $canbo->on_working = $canbo_infos_array->on_working;

            array_push($list_of_objects_canbo, $canbo);
        }
        return $list_of_objects_canbo[0];
    }

    /** Read records canbo by hoten */
    public function readByTen($hoten)
    {
        $list_of_canbo = DB::select('select * from canbo where hoten = ?', [$hoten]);
        $list_of_objects_canbo = [];
        foreach ($list_of_canbo as $canbo_infos_array) {
            $canbo = new canbo(0, 0, 0, 0, 0, 0);
            $canbo->todanpho_id = $canbo_infos_array->todanpho_id;
            $canbo->hoten = $canbo_infos_array->hoten;
            $canbo->so_hieu = $canbo_infos_array->so_hieu;
            $canbo->chucvu = $canbo_infos_array->chucvu;
            $canbo->password = $canbo_infos_array->password;
            $canbo->on_working = $canbo_infos_array->on_working;

            array_push($list_of_objects_canbo, $canbo);
        }
        return $list_of_objects_canbo;
    }

    /** Read records canbo by chucvu */
    public function readByChucVu($chucvu)
    {
        $list_of_canbo = DB::select('select * from canbo where chucvu = ?', [$chucvu]);
        $list_of_objects_canbo = [];
        foreach ($list_of_canbo as $canbo_infos_array) {
            $canbo = new canbo(0, 0, 0, 0, 0, 0);
            $canbo->todanpho_id = $canbo_infos_array->todanpho_id;
            $canbo->hoten = $canbo_infos_array->hoten;
            $canbo->so_hieu = $canbo_infos_array->so_hieu;
            $canbo->chucvu = $canbo_infos_array->chucvu;
            $canbo->password = $canbo_infos_array->password;
            $canbo->on_working = $canbo_infos_array->on_working;

            array_push($list_of_objects_canbo, $canbo);
        }
        return $list_of_objects_canbo;
    }

    /** update records by canbo_id */
    public function updateById(canbo $canbo)
    {
        $affected = DB::update('update canbo set todanpho_id=?,
                                                chucvu =?,
                                                password=?,
                                                on_working=?
                                            where canbo_id=?', [
            $canbo->todanpho_id, $canbo->chucvu, $canbo->password, $canbo->on_working, $canbo->canbo_id
        ]);
        return $affected;
    }

    /** update records by so_hieu */
    public function updateBySoHieu(canbo $canbo)
    {
        $affected = DB::update('update canbo set todanpho_id=?,
                                                chucvu =?,
                                                password=?,
                                                on_working=?
                                            where so_hieu=?', [
            $canbo->todanpho_id, $canbo->chucvu, $canbo->password, $canbo->on_working, $canbo->so_hieu
        ]);
        return $affected;
    }

    /** delete records by canbo_id */
    public function deleteById($canbo_id)
    {
        $affected = DB::delete('delete from canbo where canbo_id = ?', [$canbo_id]);
        return $affected;
    }

    /** delete records by sohieu */
    public function deleteBySoHieu($so_hieu)
    {
        $affected = DB::delete('delete from canbo where so_hieu = ?', [$so_hieu]);
        return $affected;
    }
}