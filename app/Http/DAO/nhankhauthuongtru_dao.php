<?php

namespace App\Http\DAO;

use App\Http\DTO\nhankhauthuongtru;
use Illuminate\Support\Facades\DB;

class nhankhauthuongtru_dao
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        // $this-> = $;
    }

    /** insert record to table nhankhauthuongtru */
    public function create(nhankhauthuongtru $nhankhau)
    {
        DB::insert('insert into nhankhauthuongtru(
                hoten, hotenkhac, ngaysinh, gioitinh, quequan, dantoc, tongiao, cmnd, passport,
                nghenghiep, quanhe_chuho, so_hshk, ho_id
                ) values (?,?,?,?,?,?,?,?,?,?,?,?,?)
            ', [
            $nhankhau->hoten, $nhankhau->hotenkhac, $nhankhau->ngaysinh,
            $nhankhau->gioitinh, $nhankhau->quequan, $nhankhau->dantoc,  $nhankhau->tongiao,
            $nhankhau->cmnd,  $nhankhau->passport,  $nhankhau->nghenghiep, $nhankhau->quanhe_chuho,
            $nhankhau->so_hshk,  $nhankhau->ho_id
        ]);
    }

    /** read all records */
    public function readAll()
    {
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru');
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        // echo "hihi";
        return $list_of_nhankhau_objects;
    }

    /** read records by nhankhau_id*/
    public function readById($nhankhau_id)
    {
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where nhankhau_id=?', [$nhankhau_id]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where hoten=?', [$hoten]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where gioitinh=?', [$gioitinh]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where dantoc=?', [$dantoc]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where tongiao=?', [$tongiao]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where so_hshk=?', [$so_hshk]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        $list_of_nhankhau = DB::select('select * from nhankhauthuongtru where ho_id=?', [$ho_id]);
        $list_of_nhankhau_objects = [];
        foreach ($list_of_nhankhau as $nhankhau_infos) {
            $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($nhankhau_infos as $key => $value) {
                $nhankhau->$key = $value;
            }
            array_push($list_of_nhankhau_objects, $nhankhau);
        }
        return $list_of_nhankhau_objects;
    }

    /** update by id */
    public function update(nhankhauthuongtru $nhankhau)
    {
        $affected = DB::update('update nhankhauthuongtru set
                hoten =?, hotenkhac=?, ngaysinh=?, gioitinh=?, quequan=?,  dantoc=?,
                tongiao=?, cmnd=?, passport=?, nghenghiep=?, quanhe_chuho=?, so_hshk=?, ho_id=?
            where nhankhau_id=?
        ', [
            $nhankhau->hoten, $nhankhau->hotenkhac, $nhankhau->ngaysinh,
            $nhankhau->gioitinh, $nhankhau->quequan, $nhankhau->dantoc,  $nhankhau->tongiao,
            $nhankhau->cmnd,  $nhankhau->passport,  $nhankhau->nghenghiep, $nhankhau->quanhe_chuho,
            $nhankhau->so_hshk,  $nhankhau->ho_id, $nhankhau->nhankhau_id
        ]);
        return $affected;
    }

    /** delete by id */
    public function delete($nhankhau_id)
    {
        $affected = DB::delete('
            delete from nhankhauthuongtru where nhankhau_id=?
        ', [$nhankhau_id]);
        return $affected;
    }
}