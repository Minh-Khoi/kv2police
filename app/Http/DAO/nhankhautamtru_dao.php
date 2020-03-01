<?php

namespace App\Http\DAO;

use App\Http\DTO\nhankhautamtru;
use Illuminate\Support\Facades\DB;

class nhankhautamtru_dao
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        // $this-> = $;
    }

    /** insert record to table nhankhautamtru */
    public function create(nhankhautamtru $nhankhau)
    {
        DB::insert('insert into nhankhautamtru(
                hoten, hotenkhac, ngaysinh, gioitinh, dantoc, tongiao, cmnd, passport, nghenghiep, so_hshk, ho_id
                ) values (?,?,?,?,?,?,?,?,?,?,?)
            ', [
            $nhankhau->hoten, $nhankhau->hotenkhac, $nhankhau->ngaysinh,
            $nhankhau->gioitinh, $nhankhau->dantoc,  $nhankhau->tongiao,
            $nhankhau->cmnd,  $nhankhau->passport,  $nhankhau->nghenghiep,
            $nhankhau->so_hshk,  $nhankhau->ho_id
        ]);
    }

    /** read all records */
    public function readAll()
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru');
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by nhankhau_id*/
    public function readById($nhankhau_id)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where nhankhau_id=?', [$nhankhau_id]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects[0];
    }

    /** read records by hoten*/
    public function readByHoten($hoten)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where hoten=?', [$hoten]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by gioitinh*/
    public function readByGioiTinh($gioitinh)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where gioitinh=?', [$gioitinh]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by dantoc*/
    public function readByDanToc($dantoc)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where dantoc=?', [$dantoc]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by tongiao*/
    public function readByTonGiao($tongiao)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where tongiao=?', [$tongiao]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by so_hshk*/
    public function readBySoHSHK($so_hshk)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where so_hshk=?', [$so_hshk]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** read records by ho_id*/
    public function readByHoID($ho_id)
    {
        $list_of_nhankhau = DB::select('select * from nhankhautamtru where ho_id=?', [$ho_id]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhautamtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** update by id */
    public function update(nhankhautamtru $nhankhau)
    {
        $affected = DB::update('update nhankhautamtru set
                hoten =?, hotenkhac=?, ngaysinh=?, gioitinh?, dantoc=?,
                tongiao=?, cmnd=?, passport=?, nghenghiep=?, so_hshk=?, ho_id=?
            where nhankhau_id=?
        ', [
            $nhankhau->hoten, $nhankhau->hotenkhac, $nhankhau->ngaysinh,
            $nhankhau->gioitinh, $nhankhau->dantoc,  $nhankhau->tongiao,
            $nhankhau->cmnd,  $nhankhau->passport,  $nhankhau->nghenghiep,
            $nhankhau->so_hshk,  $nhankhau->ho_id, $nhankhau->nhankhau_id
        ]);

        return $affected;
    }

    /** delete by id */
    public function delete($nhankhau_id)
    {
        $affected = DB::delete('
            delete from nhankhautamtru where nhankhau_id=?
        ', [$nhankhau_id]);

        return $affected;
    }
}