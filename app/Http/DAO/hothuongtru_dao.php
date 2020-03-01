<?php

namespace App\Http\DAO;

use App\Http\DTO\hothuongtru;
use Illuminate\Support\Facades\DB;

class hothuongtru_dao
{
    /**
     * Class constructor.
     */
    public function __construct()
    { }

    /** insert to table hothuongtru */
    public function create(hothuongtru $hothuongtru)
    {
        DB::insert('insert into hothuongtru (ten_chu_ho,so_hshk, todanpho_id) values(?,?,?) ', [
            $hothuongtru->ten_chu_ho, $hothuongtru->so_hshk, $hothuongtru->todanpho_id
        ]);
        echo '1 ho thuong tru created';
    }

    /** read all records hothuongtru */
    public function readAll()
    {
        $list_of_hothuongtru = DB::select('select * from hothuongtru');
        $list_of_objects_hothuongtru = [];
        foreach ($list_of_hothuongtru as $ho_infos) {
            $ho = new hothuongtru(
                $ho_infos->ho_id,
                $ho_infos->ten_chu_ho,
                $ho_infos->so_hshk,
                $ho_infos->todanpho_id
            );
            array_push($list_of_objects_hothuongtru, $ho);
        }
        return $list_of_objects_hothuongtru;
    }

    /** Read records hothuongtru by id */
    public function readById($ho_id)
    {
        $list_of_hothuongtru = DB::select('select * from hothuongtru where ho_id = ?', [$ho_id]);
        $list_of_objects_hothuongtru = [];
        foreach ($list_of_hothuongtru as $ho_infos) {
            $ho = new hothuongtru(
                $ho_infos->ho_id,
                $ho_infos->ten_chu_ho,
                $ho_infos->so_hshk,
                $ho_infos->todanpho_id
            );
            array_push($list_of_objects_hothuongtru, $ho);
        }
        return $list_of_objects_hothuongtru[0];
    }

    /** Read records hothuongtru by so hshk */
    public function readBySoHieu($so_hshk)
    {
        $list_of_hothuongtru = DB::select('select * from hothuongtru where so_hshk = ?', [$so_hshk]);
        $list_of_objects_hothuongtru = [];
        foreach ($list_of_hothuongtru as $ho_infos) {
            $ho = new hothuongtru(
                $ho_infos->ho_id,
                $ho_infos->ten_chu_ho,
                $ho_infos->so_hshk,
                $ho_infos->todanpho_id
            );
            array_push($list_of_objects_hothuongtru, $ho);
        }
        return $list_of_objects_hothuongtru;
    }

    /** Read records hothuongtru by ten_chu_ho */
    public function readByTen($ten_chu_ho)
    {
        $list_of_hothuongtru = DB::select('select * from hothuongtru where ten_chu_ho = ?', [$ten_chu_ho]);
        $list_of_objects_hothuongtru = [];
        foreach ($list_of_hothuongtru as $ho_infos) {
            $ho = new hothuongtru(
                $ho_infos->ho_id,
                $ho_infos->ten_chu_ho,
                $ho_infos->so_hshk,
                $ho_infos->todanpho_id
            );
            array_push($list_of_objects_hothuongtru, $ho);
        }
        return $list_of_objects_hothuongtru;
    }

    /** update by ho_id */
    public function updateById(hothuongtru $hothuongtru)
    {
        $affected = DB::update('update hothuongtru set ten_chu_ho=?,
                                                so_hshk=?,
                                                todanpho_id=?,
                                            where ho_id=?', [
            $hothuongtru->ten_chu_ho, $hothuongtru->so_hshk, $hothuongtru->todanpho_id, $hothuongtru->ho_id
        ]);
        return $affected;
    }

    /** update by so_hshk */
    public function updateBySoHSHK(hothuongtru $hothuongtru)
    {
        $affected = DB::update('update hothuongtru set ten_chu_ho=?,
                                                todanpho_id=?,
                                            where so_hshk=?', [
            $hothuongtru->ten_chu_ho, $hothuongtru->todanpho_id, $hothuongtru->so_hshk
        ]);
        return $affected;
    }

    /** delete by id */
    public function deleteById($ho_id)
    {
        $affected = DB::delete('delete from hothuongtru where ho_id=?', [$ho_id]);
        return $affected;
    }

    /** delete by so_hshk */
    public function deleteBySoHSHK($so_hshk)
    {
        $affected = DB::delete('delete from hothuongtru where so_hshk=?', [$so_hshk]);
        return $affected;
    }
}