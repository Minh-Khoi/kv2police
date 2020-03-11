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
use App\Http\DTO\nhankhauthuongtru;
use App\Http\DTO\todanpho;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** use this function for test */
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

    //** Use this function to render the whole danhsachnhankhau */
    public function renderDanhSachNhanKhau()
    {
        $nhankhauthuongtru_dao = new nhankhauthuongtru_dao();
        $nhankhautamtru_dao = new nhankhautamtru_dao();
        $list_of_nhankhauthuongtru = $nhankhauthuongtru_dao->readAll();
        $list_of_nhankhautamtru = $nhankhautamtru_dao->readAll();
        $nhankhau_array = [];
        array_push($nhankhau_array, $list_of_nhankhauthuongtru, $list_of_nhankhautamtru);
        // echo 'hihih';
        return json_encode($nhankhau_array);
    }

    /** Use this function to edit details of hothuongtru */
    public function createHoThuongTru(Request $request)
    {
        $form_datas = $request->all();
        $ho_id = (isset($form_datas['ho_id'])) ? $form_datas['ho_id'] : 0;
        // with only $todanpho_id, we must use todanpho_dao to get the todanpho_id
        //before call the hothuongtru_dao->create()
        $todanpho_dao = new todanpho_dao();
        $todanpho = $todanpho_dao->readByTen($form_datas['todanpho_id']);
        $todanpho_id = $todanpho->todanpho_id;
        // finish render todanpho_id

        $ten_chu_ho = $form_datas['ten_chu_ho'];
        $so_hshk = $form_datas['so_hshk'];
        $hothuongtru_dao = new hothuongtru_dao();
        $hothuongtru = new hothuongtru($ho_id, $ten_chu_ho, $so_hshk, $todanpho_id);
        return $hothuongtru_dao->create($hothuongtru);
    }

    /** Use this function to edit details of hothuongtru */
    public function editHoThuongTru(Request $request)
    {
        $form_datas = $request->all();
        $ho_id = $form_datas['ho_id'];
        // with only $todanpho_id, we must use todanpho_dao to get the todanpho_id
        //before call the hothuongtru_dao->create()
        $todanpho_dao = new todanpho_dao();
        $todanpho = $todanpho_dao->readByTen($form_datas['todanpho_id']);
        $todanpho_id = $todanpho->ten;
        // finish render todanpho_id

        $ten_chu_ho = $form_datas['ten_chu_ho'];
        $so_hshk = $form_datas['so_hshk'];
        $hothuongtru_dao = new hothuongtru_dao();
        $hothuongtru = new hothuongtru($ho_id, $todanpho_id, $ten_chu_ho, $so_hshk);
        $affected = $hothuongtru_dao->updateById($hothuongtru);
        return $affected . "hothuongtru is updated";
    }

    /** Use this function to delete one hothuongtru */
    public function deleteHoThuongTru(Request $request)
    {
        $form_datas = $request->all();
        $ho_id = $form_datas['ho_id'];
        $hothuongtru_dao = new hothuongtru_dao();
        $affected = $hothuongtru_dao->deleteById($ho_id);
        return $affected . "hothuongtru is deleted";
    }

    /** use this function to create nhankhau */
    public function createNhanKhau(Request $request)
    {
        $form_datas = $request->all();
        $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($form_datas as $key => $value) {
            if ($key != "dien_cu_tru") {
                $nhankhau->$key = $value;
            }
        }
        $nhankhau_dao = ($form_datas['dien_cu_tru'] == "thuongtru")
            ? (new nhankhauthuongtru_dao())
            : (new nhankhautamtru_dao());
        return $nhankhau_dao->create($nhankhau);
    }

    /** use this function to edit nhankhau */
    public function editNhanKhau(Request $request)
    {
        $form_datas = $request->all();
        $nhankhau = new nhankhauthuongtru(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($form_datas as $key => $value) {
            if ($key != "dien_cu_tru") {
                $nhankhau->$key = $value;
            }
        }
        $nhankhau_dao = ($form_datas['dien_cu_tru'] == "thuongtru")
            ? (new nhankhauthuongtru_dao())
            : (new nhankhautamtru_dao());
        $affected = $nhankhau_dao->update($nhankhau);
        return $affected . "nhankhau is updated";
    }

    /** use this function to edit nhankhau */
    public function deleteNhanKhau(Request $request)
    {
        $form_datas = $request->all();
        $nhankhau_dao = ($form_datas['dien_cu_tru'] == "thuongtru")
            ? (new nhankhauthuongtru_dao())
            : (new nhankhautamtru_dao());
        $affected = $nhankhau_dao->update($form_datas['nhankhau_id']);
        return $affected . "nhankhau is deleted";
    }
}