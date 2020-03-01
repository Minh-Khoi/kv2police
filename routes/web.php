<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\DAO\hothuongtru_dao;

/** This is method to convert php object into PHP array */
function object_to_array($data)
{
    if (is_array($data) || is_object($data)) {
        $result = array();

        foreach ($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }

        return $result;
    }

    return $data;
}
/** This is routes which return view of vue component and pass param variables from backend */
Route::get('/', function () {
    return view('dashboard_child');
});

//** This route used to check database connection */
Route::get('connection', function () {
    try {
        // DB::connection()->getPdo();
        echo json_encode(DB::select("select * from canbo"));
        if (DB::connection()->getDatabaseName()) {
            return "Yes! Successfully connected to the DB:" . DB::connection()->getDatabaseName()
                . "<br>" . json_encode(DB::select("select * from canbo"));
        } else {
            return ("Could not find the database. Please check your configuration.");
        }
    } catch (\Exception $e) {
        die("Could not open connection to database server.  Please check your configuration." . $e);
    }
});

//** This route check CRUD features */
Route::get('crud/check', 'Controller@check');

//** This routes use to call the functions in Controller class*/
Route::post('gettodanpho', 'Controller@renderToDanPho');
Route::post('getnhankhau', 'Controller@renderNhanKhau');
Route::post('getdanhsachho', 'Controller@renderHoThuongTru');
Route::post('getchitietho', 'Controller@renderChiTietHo');
