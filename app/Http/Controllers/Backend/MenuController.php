<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Group;
use App\Models\GroupMenu;


class MenuController extends Controller
{
    public function table(Request $r)
    {
        //access
        access('config-menu');

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
        //folder view
        $folder = 'menu';

        //get data from table
        $data = Menu::query();

        //get filter from table filter
        $this->filter($data,$r);

        //pagination
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

        //other relation table
        $parents = Menu::pluck('name','id');
        $parents[''] = 'No Parents';

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'r',
                    'folder',
                    'parents'
                    ];

        return view('backend.lists',compact($compact));
    }

    /**
     * @return array
     * @method filter
     * @param $data .... data query
     * @param $r .... request filter
     */
    protected function filter($data,$r){
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
        return $data;
    }

    /**
     * @return void
     * @method add
     */

    public function add()
    {   
        //access
        access('config-menu');
        
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
        //folder view
        $folder = 'menu';

        //url
        $url = url()->current();

        //data
    	$data = new Menu;

        //other relation table
    	$parents = Menu::pluck('name','id');
        $parents[''] = 'No Parents';
        $group = Group::all();
        $groupMenu = null;

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'parents',
                    'group',
                    'groupMenu'
                    ];

        return view('backend.form',compact($compact));
    }

    /**
     * @return void
     * @method insert
     * @param Request $r 'POST'
     */
    public function insert(Request $r)
    {
        //access
        access('config-menu');
        
    	$this->validate($r,[
            'name'=>'required|unique:menu,name',
            'url'=>'required',
        ]);

        //max sort
        $maxMenu = Menu::max('sort');

        //saving
        $data = new Menu;
        $data->name = $r->name;
        $data->url = $r->url;
        $data->parent = $r->parent;
        $data->icon = $r->icon;
        $data->sort = $maxMenu+1;
        $data->save();

        //insert into group_permission
        $GroupMenu = GroupMenu::where("menu",$data->id)->delete();
        if($r->has('group')){ 
            $group = $r->group;
            foreach($group as $key => $row) {
                $GroupMenu = new GroupMenu;
                $GroupMenu->menu = $data->id;
                $GroupMenu->group = $row;
                $GroupMenu->save();
            }
        }

        try{
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
        //access
        access('config-menu');
        

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
        //folder view
        $folder = 'menu';

        //url
        $url = route('backend.menu.update',[$data->id]);

        //data
        $parents = Menu::where('id','!=',$data->id)->pluck('name','id');

        //other relation table
        $parents[''] = 'No Parents';
        $group = Group::all();
        $groupMenu = GroupMenu::where("menu",$data->id)->get();

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'parents',
                    'groupMenu',
                    'group'
                    ];

        return view('backend.form',compact($compact));

    }

    /**
     * @return void
     * @method update
     * @param Request $r 'POST'
     */

    public function update(Request $r, Menu $data)
    {
        //access
        access('config-menu');
        
        $this->validate($r,[
            'name'=>'required|unique:menu,name,'.$data->id,
            'url'=>'required',
        ]);

        $data->name = $r->name;
        $data->url = $r->url;
        $data->parent = $r->parent;
        $data->icon = $r->icon;
        $data->save();

        //insert into group_permission
        $GroupMenu = GroupMenu::where("menu",$data->id)->delete();
        if($r->has('group')){ 
            $group = $r->group;
            foreach($group as $key => $row) {
                $GroupMenu = new GroupMenu;
                $GroupMenu->menu = $data->id;
                $GroupMenu->group = $row;
                $GroupMenu->save();
            }
        }

        try{
            flash('Record has been updated')->success();
            return redirect('backend/menu');
        }catch(Exception $e){
            flash('Failed to update record')->error();
            return redirect('backend/menu/'.$data->id.'/edit');
        }
    }

    /**
     * @return void
     * @method delete
     */
    public function delete(Menu $data)
    {
        //access
        access('config-menu');
        
        $GroupPermission = GroupMenu::where("menu",$data->id)->delete();
        try{
            $data->delete();
            flash('Record has been deleted')->success();
        }catch(Exception $e){
            flash('Failed to delete record')->error();
        }
        return redirect('backend/menu');

    }

    /**
     * @method sort
     */
    public function sort()
    {
        //access
        access('config-menu');
        
        //access
        access('config-menu');
        //title of page
        $title = 'Menu';
        //sub title of page
        $sub_title = 'Sort';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Menu',
                            'url' => url('backend/menu')
                        ],
                        [
                            'name' => 'Sort',
                            'url' => '#!'
                        ]
                      );

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb'
                    ];

        return view('backend.menu.sort',compact($compact));
    }

    /**
     * @method sortUpdate
     * @param $r ... request
     */
    public function sortUpdate(Request $r)
    {
        //access
        access('config-menu');
        
        $id = $r->id;
        $value = $r->value;

        //current sort
        $current = Menu::where("id",$id)->first();

        //replaced sort
        $replaced = Menu::where("sort",$value)->first();

        //change sort number
        $replaced->sort = $current->sort;
        $current->sort = $value;

        try{
            $replaced->save();
            $current->save();
            return response()->json(true);
        }catch(Exception $e){
            return response()->json(false);
        }
    }
}
