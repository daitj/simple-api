<?php
class SearchController extends MyController
{
    public function getAction($request) {
        $r = Array('data'=>Array(),'error'=>'');
        $search = isset($request->url[2]) ? $request->url[2] : "";
        //if database connection is required
		//$conn = MyController::db_connect();
        if($search == "keyword"){
			// example.com/search/keyword
			$r['data'] = "json";
		}else{
			// example.com/search/
			$r['error'] = "No keyword";
		}
        return $r;
    }
}