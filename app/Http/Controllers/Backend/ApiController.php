<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     *
     */
    public function getData()
    {	
    	$data = [];
    	$data['data'] = json_decode(file_get_contents(storage_path().'/fake/MOCK_DATA.json'),true);

        return response()->json($data);
    }

}
