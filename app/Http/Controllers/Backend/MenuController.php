<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;


class MenuController extends Controller
{
    public function table(Request $r)
    {
        //title of page
        $title = 'Menu';
        //sub title of page
        $sub_title = 'Lists';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Menu',
                            'url' => url('backend/menu')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );

        //get data from table
        $data = Menu::query();

        if($r->has('name')){
            if($r->name != null && $r->name !=''){
                $data = $data->where('name','like','%'.$r->name.'%');
            }
        }

        if($r->has('parent')){
            if($r->parent != null && $r->parent !=''){
                $data = $data->where('parent','=',$r->parent);
            }
        }

        if($r->has('url')){
            if($r->url != null && $r->url !=''){
                $data = $data->where('url','like','%'.$r->url.'%');
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
        $parents = Menu::whereNull("parent")->pluck('name','id');
        $parents[''] = 'No Parents';

        return view('backend.menu.lists',compact('title','sub_title','breadcrumb','data','r','parents'));
    }

    /**
     * @return void
     * @method add
     */

    public function add()
    {
    	//title of page
    	$title = 'Menu';
    	//sub title of page
    	$sub_title = 'Add';
    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Menu',
    						'url' => url('backend/menu/')
    					],
    					[
    						'name' => 'Add',
    						'url' => '#!'
    					]
    				  );
        //url
        $url = url()->current();
        //data
    	$data = new Menu;
    	$parents = Menu::whereNull("parent")->pluck('name','id');
        $parents[''] = 'No Parents';

        return view('backend.menu.form',compact('title','sub_title','breadcrumb','data','parents','url'));
    }

    /**
     * @return void
     * @method insert
     * @param Request $r 'POST'
     */

    public function insert(Request $r)
    {
    	$this->validate($r,[
            'name'=>'required|unique:menu,name',
            'url'=>'required',
        ]);

        $data = new Menu;
        $data->name = $r->name;
        $data->url = $r->url;
        $data->parent = $r->parent;
        $data->icon = $r->icon;

        try{
        	$data->save();
            flash('New record has been inserted')->success();
        }catch(Exception $e){
            flash('Failed to inserting new record')->error();
        }

        return redirect('backend/menu');

    }

    /**
     * @return void
     * @method edit
     * @param Menu $data 'GET'
     */

    public function edit(Menu $data)
    {

        //title of page
        $title = 'Menu';
        //sub title of page
        $sub_title = 'Edit';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Menu',
                            'url' => url('backend/menu/')
                        ],
                        [
                            'name' => 'Edit',
                            'url' => '#!'
                        ]
                      );
        //url
        $url = route('backend.menu.update',[$data->id]);
        //data
        $parents = Menu::whereNull("parent")->where('id','!=',$data->id)->pluck('name','id');
        $parents[''] = 'No Parents';

        return view('backend.menu.form',compact('title','sub_title','breadcrumb','data','parents','url'));

    }

    /**
     * @return void
     * @method update
     * @param Request $r 'POST'
     */

    public function update(Request $r, Menu $data)
    {
        $this->validate($r,[
            'name'=>'required|unique:menu,name,'.$data->id,
            'url'=>'required',
        ]);

        $data->name = $r->name;
        $data->url = $r->url;
        $data->parent = $r->parent;
        $data->icon = $r->icon;

        try{
            $data->save();
            flash('Record has been updated')->success();
            return redirect('backend/menu');
        }catch(Exception $e){
            flash('Failed to update record')->error();
            return redirect('backend/menu/'.$data->id.'/edit');
        }


    }
}
