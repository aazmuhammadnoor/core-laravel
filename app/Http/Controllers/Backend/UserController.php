<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function table(Request $r)
    {
        //title of page
        $title = 'User';
        //sub title of page
        $sub_title = 'Lists';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'User',
                            'url' => url('backend/menu')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );

        //get data from table
        $data = User::query();

        if($r->has('username')){
            if($r->username != null && $r->username !=''){
                $data = $data->where('username','like','%'.$r->username.'%');
            }
        }

        if($r->has('email')){
            if($r->email != null && $r->email !=''){
                $data = $data->where('email','=',$r->email);
            }
        }

        if($r->has('limit')){
            if($r->limit != null && $r->limit !=''){
                $r->limit = $r->limit;
            }else{
                $r->limit = 10;
            }
        }else{
            $r->limit = 10;
        }
        $data = $data->paginate($r->limit);

        return view('backend.user.lists',compact('title','sub_title','breadcrumb','data','r','parents'));
    }

    /**
     * @return void
     * @method add
     */

    public function add()
    {
    	//title of page
    	$title = 'User';
    	//sub title of page
    	$sub_title = 'Add';
    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'User',
    						'url' => url('backend/user/')
    					],
    					[
    						'name' => 'Add',
    						'url' => '#!'
    					]
    				  );
        //url
        $url = url()->current();
        //data
    	$data = new User;

        return view('backend.user.form',compact('title','sub_title','breadcrumb','data','url'));
    }
}
