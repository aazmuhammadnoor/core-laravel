<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FakeTable;

class BackendController extends Controller
{
    /**
     * index
     */
    public function index(Request $r)
    {	
    	//title of page
    	$title = 'Home';
    	//sub title of page
    	$sub_title = 'backend';
    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Home',
    						'url' => url('/')
    					]
    				  );

        return view('backend.home',compact('title','sub_title','breadcrumb'));
    }

    /**
     * @method form
     * @return void
     */
    public function form()
    {	
    	//title of page
    	$title = 'Form';
    	//sub title of page
    	$sub_title = 'Add';
    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Form',
    						'url' => url('/')
    					],
    					[
    						'name' => 'Add',
    						'url' => '#!'
    					]
    				  );

        return view('backend.form',compact('title','sub_title','breadcrumb'));
    }

    /**
     * @method form
     * @return void
     */
    public function document()
    {	
    	//title of page
    	$title = 'Document';
    	//sub title of page
    	$sub_title = 'Editor';
    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Form',
    						'url' => url('/')
    					],
    					[
    						'name' => 'Editor',
    						'url' => '#!'
    					]
    				  );

        return view('backend.document_editor',compact('title','sub_title','breadcrumb'));
    }

    /**
     * @method table
     * @return void
     * @param Request $r 'GET'
     */

    public function table(Request $r)
    {
        //title of page
        $title = 'Table';
        //sub title of page
        $sub_title = 'list';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Table',
                            'url' => url('/')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );
        //get data from table
        $data = FakeTable::query();

        if($r->has('name')){
            if($r->name != null && $r->name !=''){
                $data = $data->where('name','like','%'.$r->name.'%');
            }
        }

        if($r->has('email')){
            if($r->email != null && $r->email !=''){
                $data = $data->where('email','like','%'.$r->email.'%');
            }
        }

        if($r->has('address')){
            if($r->address != null && $r->address !=''){
                $data = $data->where('address','like','%'.$r->address.'%');
            }
        }

        if($r->has('phone')){
            if($r->phone != null && $r->phone !=''){
                $data = $data->where('phone','like','%'.$r->phone.'%');
            }
        }

        if($r->has('limit')){
            if($r->limit != null && $r->limit !=''){
                $r->limit = $r->limit;
            }else{
                $r->limit = FakeTable::count();
            }
        }else{
            $r->limit = FakeTable::count();
        }
        $data = $data->paginate($r->limit);

        return view('backend.table',compact('title','sub_title','breadcrumb','data','r'));
    }
}
