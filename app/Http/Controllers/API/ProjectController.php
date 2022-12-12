<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
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
    ]);
    }
    public function info(){
          return response()->json([

"total_search_requests"=> 330,
"total_search_clicks"=>  55,
"stats" => [

]
    ]);
    }
    public function getGob(){
          return response()->json([
            'jobs' => [
                []
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
           switch ($fileName) {
            case 'synonym_dictionary':

        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="synonym_dictionary.csv"');

        return $response;


                break;
            case 'keyword_add_list':
                        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="keyword_add_list.csv"');

        return $response;
                break;
            case 'keyword_remove_list':
                       $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="keyword_remove_list.csv"');

        return $response;
                break;
              case 'default_keyword_list':
                        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="default_keyword_list.csv"');

        return $response;
                break;
                        case 'keyword_remove_list':
                       $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="keyword_remove_list.csv"');

        return $response;
                break;
              case 'scored_page_list':
                        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="	scored_page_list.csv"');

        return $response;
                break;
                  case 'poplink_items':
                        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="	poplink_items.csv"');

        return $response;
                break;
            default :
                 return response()->json([
        'message' => 'Internal Server Error',
        'details' => 'string',
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
