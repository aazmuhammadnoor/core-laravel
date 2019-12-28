<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * @return void
     * @method table
     * @param Request $r 'POST'
     */
    public function table(Request $r)
    {
        //access
        access('config-group');

        //title of page
        $title = 'Group';

        //sub title of page
        $sub_title = 'Lists';

        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Group',
                            'url' => url('backend/group')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );

        //folder view
        $folder = 'group';

        //main table
        $data = Group::query();

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
        if($r->has('username')){
            if($r->username != null && $r->username !=''){
                $data = $data->where('username','like','%'.$r->username.'%');
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
        access('config-group');

    	//title of page
    	$title = 'Group';

    	//sub title of page
    	$sub_title = 'Add';

    	//breadcrumb of page
    	$breadcrumb = array(
    					[
    						'name' => 'Group',
    						'url' => url('backend/group/')
    					],
    					[
    						'name' => 'Add',
    						'url' => '#!'
    					]
    				  );

        //folder view
        $folder = 'group';

        //url
        $url = url()->current();

        //data
    	$data = new Group;

        //other relation table

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
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
        access('config-group');

        $this->validate($r,[
            'name'=>'required|unique:group,name|max:191'
        ]);

        $data = new Group;
        $data->name = $r->name;

        try{
            $data->save();
            flash('New record has been inserted')->success();
        }catch(Exception $e){
            flash('Failed to inserting new record')->error();
        }

        return redirect('backend/group');

    }

    /**
     * @return void
     * @method edit
     * @param id group .... $data
     */
    public function edit(Group $data)
    {
        //access
        access('config-group');

        //title of page
        $title = 'Group';
        //sub title of page
        $sub_title = 'Edit';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Group',
                            'url' => url('backend/group/')
                        ],
                        [
                            'name' => 'Edit',
                            'url' => '#!'
                        ]
                      );
        //folder view
        $folder = 'group';

        //url
        $url = url()->current();

        //other relation table

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder'
                    ];

        return view('backend.form',compact($compact));
    }

    /**
     * @return void
     * @method update
     * @param Request $r 'POST'
     * @param id user .... $data
     */
    public function update(Request $r, Group $data)
    {
        //access
        access('config-group');

        $this->validate($r,[
            'name'=>'required|max:191|unique:group,name,'.$data->id
        ]);

        $data->name = $r->name;

        try{
            $data->save();
            flash('Record has been updated')->success();
        }catch(Exception $e){
            flash('Failed to updating record')->error();
        }

        return redirect('backend/group');

    }

    /**
     * @return void
     * @method delete
     */
    public function delete(Group $data)
    {
        //access
        access('config-group');
        
        try{
            $data->delete();
            flash('Record has been deleted')->success();
        }catch(Exception $e){
            flash('Failed to delete record')->error();
        }
        return redirect('backend/group');

    }
}
