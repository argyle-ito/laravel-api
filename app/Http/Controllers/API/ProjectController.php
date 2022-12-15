<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// \Log::info($users);
    public function getSetting(Request $request){

          return response()->json([
        'sort_order' => "score",
          ],Response::HTTP_OK);
    }
    public function putSetting(Request $request)
    {
          return response()->json([
        'message' => 'OK',
    ],Response::HTTP_OK);
    }
    public function status(){
          return response()->json([

"service_status"=> "active",
"update_status"=>"updating"
    ]);
    }
    public function updateGob(){
          return response()->json([
        'message' => 'Accepted',
    ],Response::HTTP_ACCEPTED);
    }
    public function info(Request $request,$year,$month){


        for($i = 0;$i < 6; $i++){
            $start[$i] =  Carbon::create($year, $month, "1");
            $end[$i] = Carbon::create($year, $month, "31");
            $min[$i] = strtotime($start[$i]);
            $max[$i] = strtotime($end[$i]);
            $date[$i] = rand($min[$i], $max[$i]);
            // タイムスタンプ => Y-m-d に変換
            $date[$i] = date('Y-m-d', $date[$i]);
        }

array_multisort( array_map( "strtotime", $date ), SORT_ASC, $date ) ;


          return response()->json([

"total_search_requests"=> 330,
"total_search_clicks"=>  200,
"stats" => [

["date" =>$date[0],"search_requests" => 50, "search_clicks" => 35],
["date" =>$date[1],"search_requests" => 70, "search_clicks" => 45],
["date" =>$date[2],"search_requests" => 20, "search_clicks" => 10],
["date" =>$date[3],"search_requests" => 100, "search_clicks" => 50],
["date" =>$date[4],"search_requests" => 90, "search_clicks" => 60],


]
    ]);
    }
    public function getGob(){


          return response()->json([

                'jobs' => [

                  [
                "started_at" => "2023-02-20T00:18:56+09:00",
                "finished_at" => "2023-02-20T00:20:13+09:00",
                "status" => "success",
                "item_count" => 300,
                "error_item_count" => 10
                ],
             [
                "started_at" => "2023-02-02T00:12:56+09:00",
                "finished_at" => null,
                "status" => "running",
                "item_count" => 0,
                "error_item_count" => 0
                ],
        [
                "started_at" => "2023-01-20T00:13:56+09:00",
                "finished_at" => "2023-01-20T00:17:13+09:00",
                "status" => "fail",
                "item_count" => 0,
                "error_item_count" => 0
                ],
            [
                "started_at" => "2023-01-11T00:09:56+09:00",
                "finished_at" => "2023-01-11T00:11:13+09:00",
                 "status" => "success",
                "item_count" => 220,
                "error_item_count" => 2
                ],
               [
                "started_at" => "2023-01-09T00:11:56+09:00",
                "finished_at" => "2023-01-09T00:14:23+09:00",
                "status" => "fail",
                "item_count" => 0,
                "error_item_count" => 0
                ],
         [
                "started_at" => "2023-01-02T00:12:56+09:00",
                "finished_at" => "2023-01-02T00:15:13+09:00",
                     "status" => "success",
                "item_count" => 200,
                "error_item_count" => 0
                ],
          [
                "started_at" => "2022-12-24T00:02:56+09:00",
                "finished_at" => "2022-12-24T00:04:13+09:00",
                     "status" => "success",
                "item_count" => 170,
                "error_item_count" => 1
                ],
                [
                "started_at" => "2022-12-22T00:04:56+09:00",
                "finished_at" => "2022-12-22T00:05:13+09:00",
                     "status" => "success",
                "item_count" => 159,
                "error_item_count" => 2
                ],
               [
                "started_at" => "2022-12-19T00:01:50+09:00",
                "finished_at" => "2022-12-19T00:03:10+09:00",
                     "status" => "success",
                "item_count" => 148,
                "error_item_count" => 0
                ],
                [
                "started_at" => "2022-12-09T00:12:56+09:00",
                "finished_at" => "2022-12-09T00:13:13+09:00",
                     "status" => "success",
                "item_count" => 145,
                "error_item_count" => 0
                ],
                [
                "started_at" => "2022-12-01T00:02:56+09:00",
                "finished_at" => "2022-12-01T00:03:13+09:00",
                     "status" => "success",
                "item_count" => 140,
                "error_item_count" => 2
                ],
                [
                "started_at" => "2022-11-09T00:01:56+09:00",
                "finished_at" => "2022-11-09T00:02:13+09:00",
                     "status" => "success",
                "item_count" => 130,
                "error_item_count" => 2
                ],
                [
                "started_at" => "2022-10-09T00:01:56+09:00",
                "finished_at" => "2022-10-09T00:03:13+09:00",
                     "status" => "success",
                "item_count" => 124,
                "error_item_count" => 3
                ]




            ]

          ],Response::HTTP_OK);
            // 'jobs' => [
            //     [
            //     "started_at" => "2022-10-09T00:01:56+09:00",
            //     "finished_at" => "2022-10-09T00:03:13+09:00",
            //     "item_count" => 124,
            //     "error_item_count" => 3
            //     ],
            //     [
            //     "started_at" => "2022-11-09T00:01:56+09:00",
            //     "finished_at" => "2022-11-09T00:02:13+09:00",
            //     "item_count" => 130,
            //     "error_item_count" => 2
            //     ],
            //     [
            //     "started_at" => "2022-12-01T00:02:56+09:00",
            //     "finished_at" => "2022-12-01T00:03:13+09:00",
            //     "item_count" => 140,
            //     "error_item_count" => 2
            //     ],
            //     [
            //     "started_at" => "2022-12-09T00:12:56+09:00",
            //     "finished_at" => "2022-12-09T00:13:13+09:00",
            //     "item_count" => 145,
            //     "error_item_count" => 0
            //     ],
            //     [
            //     "started_at" => "2022-12-19T00:01:50+09:00",
            //     "finished_at" => "2022-12-19T00:03:10+09:00",
            //     "item_count" => 148,
            //     "error_item_count" => 0
            //     ],
            //     [
            //     "started_at" => "2022-12-22T00:04:56+09:00",
            //     "finished_at" => "2022-12-22T00:05:13+09:00",
            //     "item_count" => 159,
            //     "error_item_count" => 2
            //     ],
            //     [
            //     "started_at" => "2022-12-24T00:02:56+09:00",
            //     "finished_at" => "2022-12-24T00:04:13+09:00",
            //     "item_count" => 170,
            //     "error_item_count" => 1
            //     ],
            //     [
            //     "started_at" => "2023-01-02T00:12:56+09:00",
            //     "finished_at" => "2023-01-02T00:15:13+09:00",
            //     "item_count" => 200,
            //     "error_item_count" => 0
            //     ],
            //     [
            //     "started_at" => "2023-01-09T00:11:56+09:00",
            //     "finished_at" => "2023-01-09T00:14:23+09:00",
            //     "item_count" => 210,
            //     "error_item_count" => 1
            //     ],
            //     [
            //     "started_at" => "2023-01-11T00:09:56+09:00",
            //     "finished_at" => "2023-01-11T00:11:13+09:00",
            //     "item_count" => 220,
            //     "error_item_count" => 2
            //     ],
            //     [
            //     "started_at" => "2023-01-20T00:13:56+09:00",
            //     "finished_at" => "2023-01-20T00:17:13+09:00",
            //     "item_count" => 240,
            //     "error_item_count" => 5
            //     ],
            //     [
            //     "started_at" => "2023-02-02T00:12:56+09:00",
            //     "finished_at" => "2023-02-02T00:15:13+09:00",
            //     "item_count" => 270,
            //     "error_item_count" => 3
            //     ],
            //     [
            //     "started_at" => "2023-02-20T00:18:56+09:00",
            //     "finished_at" => "2023-02-20T00:20:13+09:00",
            //     "item_count" => 300,
            //     "error_item_count" => 10
            //     ],

            // ],
    }
    public function deleteProject(){
          return response()->json([
        'message' => 'OK',
    ]);
    }

    public function getCsv(Request $request,$id){
        $fileName = $id;
              $cvsList = [
             ['フィールド名', '項目', '必須']
             , ['keyword', '表示するキーワード', '○']

        ];
              $data = [
             ['フィールド名', '項目', '必須']
             , ['keyword', '表示するキーワード', '○']

        ];
           switch ($fileName) {
            case 'synonym_dictionary':

      $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=synonym_dictionary.csv");
    header('Content-Transfer-Encoding: binary');
    exit;



                break;
            case 'keyword_add_list':
                           $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=keyword_add_list.csv");
    header('Content-Transfer-Encoding: binary');
    exit;
                break;
            case 'keyword_remove_list':

                       $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=keyword_remove_list.csv");
    header('Content-Transfer-Encoding: binary');
    exit;


                break;
              case 'default_keyword_list':
                           $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=default_keyword_list.csv");
    header('Content-Transfer-Encoding: binary');
    exit;

                break;
                        case 'keyword_remove_list':
                                $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=keyword_remove_list.csv");
    header('Content-Transfer-Encoding: binary');
    exit;
                break;
              case 'scored_page_list':
                        $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=scored_page_list.csv");
    header('Content-Transfer-Encoding: binary');
    exit;

                break;
                  case 'poplink_items':
                      $fp = fopen('php://output', 'w');

    foreach ($data as $row) {
        fputcsv($fp, $row, ',', '"');
    }
    fclose($fp);
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=poplink_items.csv");
    header('Content-Transfer-Encoding: binary');
    exit;

                break;
            default :
                 return response()->json([
"message" =>  "Not Found",
"details" =>"string"
    ],Response::HTTP_NOT_FOUND);
                break;
        }


    }
        public function postCsv(Request $request,$id){
        $fileName = $id;

        // \Log::info($request->csv);
           switch ($fileName) {
            case 'synonym_dictionary':
                  return response()->json([
        'message' => 'OK',

    ]);
                break;
            case 'keyword_add_list':
                  return response()->json([
        'message' => 'OK',

    ]);
                break;
            case 'keyword_remove_list':
                return response()->json([
        'message' => 'OK',

    ]);
                break;
            case 'default_keyword_list':
                 return response()->json([
        'message' => 'OK',

    ]);
                break;
            case 'scored_page_list':
                  return response()->json([
        'message' => 'OK',

    ]);
                break;
            case 'poplink_items':
                return response()->json([
        'message' => 'OK',

    ]);
                break;
            default :
              return response()->json([
        "message" =>  "Not Found",
"details" =>"string"
              ],Response::HTTP_NOT_FOUND);
                break;
        }

    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
