<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Group;

class UserController extends Controller
{
    /**
     * @return void
     * @method table
     * @param Request $r 'POST'
     */
    public function table(Request $r)
    {
        //access
        access('config-user');

        //title of page
        $title = 'User';

        //sub title of page
        $sub_title = 'Lists';

        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'User',
                            'url' => url('backend/user')
                        ],
                        [
                            'name' => 'List',
                            'url' => '#!'
                        ]
                      );

        //folder view
        $folder = 'user';

        //main table
        $data = User::where("id","!=",1);

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
        $group = Group::pluck('name','id');
        $group[''] = 'Semua Group';

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'r',
                    'folder',
                    'group'
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
        if($r->has('group')){
            if($r->group != null && $r->group !=''){
                $data = $data->where('group','=',$r->group);
            }
        }
        if($r->has('email')){
            if($r->email != null && $r->email !=''){
                $data = $data->where('email','like','%'.$r->email.'%');
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
        access('config-user');

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

        //folder view
        $folder = 'user';

        //url
        $url = url()->current();

        //data
    	$data = new User;

        //other relation table
        $group = Group::pluck('name','id');

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'group'
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
        access('config-user');

        $this->validate($r,[
            'username'=>'required|unique:users,username|max:191',
            'group'=>'required',
            'email'=>'required|unique:users,email|max:191',
            'password'=>'required|max:16|min:8',
            're-password'=>'required|same:password|min:8',
        ]);

        $data = new User;
        $data->username = $r->username;
        $data->email = $r->email;
        $data->group = $r->group;
        $data->password = bcrypt($r->password);

        try{
            $data->save();
            flash('New record has been inserted')->success();
        }catch(Exception $e){
            flash('Failed to inserting new record')->error();
        }

        return redirect('backend/user');

    }

    /**
     * @return void
     * @method edit
     * @param id user .... $data
     */
    public function edit(User $data)
    {   
        //access
        access('config-user');

        //abort if super administrator
        if($data->id == 0)
        {
            abort('404');
        }

        //title of page
        $title = 'User';
        //sub title of page
        $sub_title = 'Edit';
        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'User',
                            'url' => url('backend/user/')
                        ],
                        [
                            'name' => 'Edit',
                            'url' => '#!'
                        ]
                      );
        //folder view
        $folder = 'user';

        //url
        $url = url()->current();

        //other relation table
        $group = Group::pluck('name','id');

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'data',
                    'url',
                    'folder',
                    'group'
                    ];

        return view('backend.form',compact($compact));
    }

    /**
     * @return void
     * @method update
     * @param Request $r 'POST'
     * @param id user .... $data
     */
    public function update(Request $r, User $data)
    {
        //access
        access('config-user');

        //abort if super administrator
        if($data->id == 0)
        {
            abort('404');
        }

        $this->validate($r,[
            'username'=>'required|max:191|unique:users,username,'.$data->id,
            'email'=>'required|max:191|unique:users,email,'.$data->id,
            'group'=>'required',
        ]);

        $data->username = $r->username;
        $data->email = $r->email;
        $data->group = $r->group;
        if($r->has('password') && $r->password != ''){
            $this->validate($r,[
                'password'=>'required|max:16|min:8',
                're-password'=>'required|same:password|min:8',
            ]);
            $data->password = bcrypt($r->password);
        }

        try{
            $data->save();
            flash('Record has been updated')->success();
        }catch(Exception $e){
            flash('Failed to updating record')->error();
        }

        return redirect('backend/user');

    }

    /**
     * @return void
     * @method delete
     */
    public function delete(User $data)
    {
        //access
        access('config-user');
        
        //abort if super administrator
        if($data->id == 0)
        {
            abort('404');
        }

        try{
            $data->delete();
            flash('Record has been deleted')->success();
        }catch(Exception $e){
            flash('Failed to delete record')->error();
        }
        return redirect('backend/user');

    }

    /**
     * @return void
     * @method password
     */
    public function password()
    {
        //title of page
        $title = 'Update Password';

        //sub title of page
        $sub_title = '';

        //breadcrumb of page
        $breadcrumb = array(
                        [
                            'name' => 'Update Password',
                            'url' => url()->current()
                        ]
                      );

        //url
        $url = url()->current();

        //data

        //other relation table

        //compact
        $compact = [
                    'title',
                    'sub_title',
                    'breadcrumb',
                    'url'
                    ];

        return view('backend.user.password',compact($compact));
    }

    /**
     * @return void
     * @method updatePassword
     * @param Request $r 'POST'
     */
    public function updatePassword(Request $r)
    {
        $this->validate($r,[
            'old_password'=>'required',
            'password'=>'required|max:16|min:8',
            're-password'=>'required|same:password|min:8',
        ]);

        $user = \Auth::guard('admin')->user()->id;
        $data = User::where("id",$user)->first();
        $check = \Hash::check($r->old_password, $data->password);

        if(!$check){//check old password
            flash('Wrong Old Password')->error();
        }else{
            $data->password = bcrypt($r->password);
            try{
                $data->save();
                flash('Password has been updated')->success();
            }catch(Exception $e){
                flash('Failed to update password')->error();
            }
        }      
        return redirect('backend/password');

    }
}
