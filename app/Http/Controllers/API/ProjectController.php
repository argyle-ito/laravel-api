<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\Response;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSetting(){
          return response()->json([
        'sort_order' => 'score',
    ]);
    }
    public function putSetting(){
          return response()->json([
        'message' => 'OK',
    ]);
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
    public function info(){
          return response()->json([

"total_search_requests"=> 330,
"total_search_clicks"=>  55,
"stats" => [

["date" =>"2022-12-18","search_requests" => 330, "search_clicks" => 55]
]
    ]);
    }
    public function getGob(){
          return response()->json([
            'jobs' => [
                [
                "started_at" => "2022-10-09T00:01:56+09:00",
                "finished_at" => "2022-10-09T00:03:13+09:00",
                "item_count" => 124,
                "error_item_count" => 3
                ]
            ],

          ]);
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
    ]);
                break;
        }


    }
        public function postCsv(Request $request,$id){
        $fileName = $id;
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
        'message' => 'Internal Server Error',
        'details' => 'string',
    ]);
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
