<?php 

namespace Li\Finale;

use App\Http\Controllers\Controller;
// use App\Board;


class FinaleController extends Controller
{

    public function __construct()
    {
    //
    }

    /**
     * Requests Instagram pics.
     *
     * @return Response
     */
    public static function finale()
    {
        // $client_id = env('INSTAGRAM_CLIENTID');
        // $tag = env('GLOBAL_TAG');

        // $params = array('client_id=' . $client_id);
        // $url = "https://api.instagram.com/v1/tags/" . $tag . "/media/recent?";

        // $result = json_decode(file_get_contents($url . implode('&', $params)));
        // $data = $result->data;

        // return $data;

        // return Board::all();


        // $key = app('redis')->exists($key);
        $redis = app()->make('redis');
        // $redis->set("key1", "testValue");

        return response()->json([
            'status' => 'Success',
            'redis' => $redis->get("key1"),
            'message' => 'Li Finale.... Awesome!!!'
        ], 200);
    }
}