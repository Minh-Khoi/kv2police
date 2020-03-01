<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\DAO\canbo_dao;
use App\Http\DAO\hothuongtru_dao;
use App\Http\DAO\nhankhautamtru_dao;
use App\Http\DAO\nhankhauthuongtru_dao;
use App\Http\DAO\todanpho_dao;
use App\Http\DTO\canbo;
use App\Http\DTO\hothuongtru;
use App\Http\DTO\todanpho;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //** use this function for test */
    public function check()
    {
        // $canboDAO = new canbo_dao();
        // $canbo = new canbo(0, 0, 0, 5, 0, 0);
        // $canboDAO->create($canbo);
        // echo "ok";
        // $key = 'so_hieu';
        // echo $canbo->$key;
        // $todanpho = new todanpho(0, 'La Chữ Trung');
        // $todanpho_dao = new todanpho_dao();
        // $todanpho_dao->create($todanpho);
        $hothuongtru = new hothuongtru(0, "Lê Đình Trợ", 121, 1);
        $hothuongtru_dao = new hothuongtru_dao();
        $hothuongtru_dao->create($hothuongtru);
    }

    /** Use this function to render the array of nhankhauthuongtru and nhankhautamtru by ho_id */
    public function renderNhanKhau(Request $request)
    {
        $form_datas = $request->all();
        $nhankhau_array = [];
        $nhankhauthuongtru_dao = new nhankhauthuongtru_dao();
        $nhankhautamtru_dao = new nhankhautamtru_dao();
        $list_of_nhankhauthuongtru = $nhankhauthuongtru_dao->readByHoID($form_datas['ho_id']);
        $list_of_nhankhautamtru = $nhankhautamtru_dao->readByHoID($form_datas['ho_id']);
        array_push($nhankhau_array, $list_of_nhankhauthuongtru, $list_of_nhankhautamtru);
        return $nhankhau_array;
        // return $form_datas;
    }

    /** Use this function  to render the list of hothuongtru */
    public function renderHoThuongTru()
    {
        $list_of_hothuongtru_only_array = [];
        $hothuongtru_dao = new hothuongtru_dao();
        $list_of_hothuongtru = $hothuongtru_dao->readAll();
        foreach ($list_of_hothuongtru as $ho_index => $ho) {
            $ho_new = object_to_array($ho);
            array_push($list_of_hothuongtru_only_array, $ho_new);
        }
        return json_encode($list_of_hothuongtru_only_array);
    }

    /** Use this function  to render the list of todanpho */
    public function renderToDanPho()
    {
        $todanpho_dao = new todanpho_dao();
        $list_of_todanpho = $todanpho_dao->readAll();

        return json_encode($list_of_todanpho);
    }

    /** Use this function to render details of one hothuongtru by ho_id */
    public function renderChiTietHo(Request $request)
    {
        $form_datas = $request->all();
        $hothuongtru_dao = new hothuongtru_dao();
        $hothuongtru = $hothuongtru_dao->readById($form_datas["ho_id"]);
        return json_encode($hothuongtru);
    }
}
