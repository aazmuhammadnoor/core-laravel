<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Group;
use App\Models\GroupPermission;

class PermissionController extends Controller
{
    /**
     * @return void
     * @method table
     * @param Request $r 'POST'
     */
    public function table(Request $r)
    {
        //access
        access('config-permission');
        
        //title of page
        $title = 'Permission';

        //sub title of page
        $sub_title = 'Lists';

        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Permission',
                            'url' => url('backend/permission')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );

        //folder view
        $folder = 'permission';

        //main table
        $data = Permission::query();

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

        //other relation data

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'r',
                    'folder',
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
        return $data;
    }

    /**
     * @return void
     * @method add
     */
    public function add()
    {
        //access
        access('config-permission');

    	//title of page
    	$title = 'Permission';

    	//sub title of page
    	$sub_title = 'Add';

    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Permission',
    						'url' => url('backend/group/')
    					],
    					[
    						'name' => 'Add',
    						'url' => '#!'
    					]
    				  );

        //folder view
        $folder = 'permission';

        //url
        $url = url()->current();

        //data
    	$data = new Permission;

        //other relation table
        $group = Group::all();
        $groupPermission = null;

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'group',
                    'groupPermission'
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
        access('config-permission');

        $this->validate($r,[
            'name'=>'required|unique:permission,name|max:191'
        ]);

        $data = new Permission;
        $data->name = $r->name;
        $data->save();

        //insert into group_permission
        $GroupPermission = GroupPermission::where("permission",$data->id)->delete();
        if($r->has('group')){ 
            $group = $r->group;
            foreach($group as $key => $row) {
                $GroupPermission = new GroupPermission;
                $GroupPermission->permission = $data->id;
                $GroupPermission->group = $row;
                $GroupPermission->save();
            }
        }

        try{
            flash('New record has been inserted')->success();
        }catch(Exception $e){
            flash('Failed to inserting new record')->error();
        }

        return redirect('backend/permission');

    }

    /**
     * @return void
     * @method edit
     * @param id group .... $data
     */
    public function edit(Permission $data)
    {
        //access
        access('config-permission');

        //title of page
        $title = 'Permission';
        //sub title of page
        $sub_title = 'Edit';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Permission',
                            'url' => url('backend/permission/')
                        ],
                        [
                            'name' => 'Edit',
                            'url' => '#!'
                        ]
                      );
        //folder view
        $folder = 'permission';

        //url
        $url = url()->current();

        //other relation table
        $group = Group::all();
        $groupPermission = GroupPermission::where("permission",$data->id)->get();

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'group',
                    'groupPermission'
                    ];

        return view('backend.form',compact($compact));
    }

    /**
     * @return void
     * @method update
     * @param Request $r 'POST'
     * @param id user .... $data
     */
    public function update(Request $r, Permission $data)
    {
        //access
        access('config-permission');

        $this->validate($r,[
            'name'=>'required|max:191|unique:permission,name,'.$data->id
        ]);

        $data->name = $r->name;
        $data->save();

        //insert into group_permission
        $GroupPermission = GroupPermission::where("permission",$data->id)->delete();
        if($r->has('group')){ 
            $group = $r->group;
            foreach($group as $key => $row) {
                $GroupPermission = new GroupPermission;
                $GroupPermission->permission = $data->id;
                $GroupPermission->group = $row;
                $GroupPermission->save();
            }
        }

        try{
            flash('Record has been updated')->success();
        }catch(Exception $e){
            flash('Failed to updating record')->error();
        }

        return redirect('backend/permission');

    }

    /**
     * @return void
     * @method delete
     */
    public function delete(Permission $data)
    {
        //access
        access('config-permission');
        
        $GroupPermission = GroupPermission::where("permission",$data->id)->delete();
        try{
            $data->delete();
            flash('Record has been deleted')->success();
        }catch(Exception $e){
            flash('Failed to delete record')->error();
        }
        return redirect('backend/permission');

    }
}
