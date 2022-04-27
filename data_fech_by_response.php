<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public static function fetchAllRecords($table, $select, $orderBy = '', $sort = '', $where = '', $whereIn = '', $pluck = '')
    {
        $response = DB::table($table);
        $response->select($select);
        if (!empty($orderBy) && !empty($sort)) {
            $response->OrderBy($orderBy, $sort);
        }
        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $response->where($key, '=', $value);
            }
        }
        if (!empty($whereIn)) {
            foreach ($whereIn as $key => $value) {
                $response->whereIn($key, $value);
            }
        }
        if($pluck != ''){
        $res = $response->pluck($pluck)->all();
        }else{
        $res = $response->get();
        }
        return $res;
    }


    public function showdetail()
    {
        $table='record';
        $select=array(
            "name",
            "email"
        );
        $where=array("id"=>2);
        $OD_vendors = $this->fetchAllRecords($table, $select, '', '',  $where, '', '');
        $response = [
            'OD_vendors' => $OD_vendors,
        ];

        return $this->sendResponse($response, 'Data retrieved successfully.');
    }

    public function show()
    {
        $data = $this->showdetail();
        $response = json_decode(json_encode($data), true);
        $vendor_data = isset($response['original']['data']['OD_vendors']) ? $response['original']['data']['OD_vendors'] : [];
        // dd($vendor_data[0]->{'name'});
        dd($vendor_data[0]['name']);
    }
}
