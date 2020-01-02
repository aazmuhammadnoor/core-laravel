<?php
	
	/**
	 * @method limit_page
	 * @return array
	 */
	if(!function_exists("limit_page")){
		function limit_page()
		{
        	$limit = ['10'=>'10','25'=>'25','50'=>'50','100'=>'100',''=>'All'];
        	return $limit;
		}
	}

	/**
	 * @method access
	 * @return void
	 * @param $permission_name .... permission name
	 */
	if(!function_exists("access")){
		function access($permission_name)
		{
			$group = Auth::guard('admin')->user()->thisGroup->id;
        	$permisson = \App\Models\Permission::where('name',$permission_name)->first();
        	$groupPermission = \App\Models\GroupPermission::where('group',$group)
        													->where('permission',$permisson->id)
        													->count();
        	if($permisson){
        		if($groupPermission == 0){
        			abort('401');
        		}
        	}else{
        		abort('401');
        	}
		}
	}

	/**
	 * @method createMenu
	 * @return void
	 */
	if(!function_exists("createMenu")){
		function createMenu()
		{
			$group = Auth::guard('admin')->user()->thisGroup->id;
        	showMenu($group);
		}
	}

	/**
	 * @method showMenu
	 * @return void
	 * @param $group .... group
	 */
	if(!function_exists("showMenu")){
		function showMenu($group,$parent = null)
		{
			if($parent){
				$groupMenu = \App\Models\GroupMenu::where('group',$group)
        									->join('menu','menu.id','=','group_menu.menu')
        									->where('menu.parent','=',$parent)
        									->orderBy('menu.sort','asc')
        									->get();
			}else{
        		$groupMenu = \App\Models\GroupMenu::where('group',$group)
        									->join('menu','menu.id','=','group_menu.menu')
        									->whereNull('menu.parent')
        									->orderBy('menu.sort','asc')
        									->get();
        		
			}

			foreach ($groupMenu as $row) {

    			$slug = str_slug($row->name);
    			//is have child
    			$childMenu = \App\Models\GroupMenu::where('group',$group)
    									->join('menu','menu.id','=','group_menu.menu')
    									->where('menu.parent','=',$row->id)
    									->count();
    			//if has child
    			if($childMenu > 0){
    				echo '<li class="treeview" id="'.$slug.'">
					        <a href="#">
					          <i class="fa fa-'.$row->icon.'"></i>
					          <span>'.$row->name.'</span>
					          <span class="pull-right-container">
					            <i class="fa fa-angle-left pull-right"></i>
					          </span>
					        </a>
					        <ul class="treeview-menu">';
    							showMenu($group,$row->id);
					echo   '</ul>
					      </li>';
    			}else{
    				echo '<li id="'.$slug.'"><a href="'.url('backend/'.$row->url).'"><i class="fa fa-'.$row->icon.'"></i>'.$row->name.'</a></li>';
    			}
    		}
		}
	}

	/**
	 * ordering menu backend
	 */
	if(!function_exists('order'))
	{
	    /**
	     * ordering number
	     */
	    function order($parent_result,$id,$current)
	    {   
	        $element = '<select class="form-control select2 ordering" data-id="'.$id.'">';

	        $no = 0;
	        foreach($parent_result as $row)
	        {
	            $no++;
	            $isSelected = ($row->sort == $current) ? 'selected' : '';

	            $element .= '<option value="'.$row->sort.'" '.$isSelected.' >'.$no.'</option>';
	        }

	        $element .= '</select>';

	        echo $element;
	    }
	}

	/**
	 * menu sort backend
	 */
	if(!function_exists('menu_backend'))
	{

	    /**
	     * get menu
	     */
	    function menu_backend($id_parent=null)
	    {   
	        if($id_parent)
	        {
	            $resultMenu = \App\Models\Menu::where("parent",$id_parent)
	                                ->orderBy('sort'); 
	        }else{
	            $resultMenu = \App\Models\Menu::where(function($q) {
	                                      $q->whereNull('parent')
	                                        ->orWhere('parent', 0);
	                                  })
	                                ->orderBy('sort'); 
	        }

	        if($resultMenu->count() > 0) // if has result
	        {
	            $resultMenu = $resultMenu->get();

	            foreach($resultMenu as $row)
	            {   
	                /*is have child*/
	                $isHaveChild = \App\Models\Menu::where("parent",$row->id)->count();

	                if($isHaveChild > 0)
	                {

	                    echo '<div class="each_menu m-5">
	                           <div class="row parent">
	                            <div class="col col-sm-10">
	                                <a href="#!" class="menu_link" data-toggle="collapse" data-target="#parent_'.$row->id.'">
	                                    <i class="fa fa-chevron-down"></i> '.$row->name.'
	                                </a>
	                            </div>
	                            <div class="col col-sm-2">';
	                                order($resultMenu,$row->id,$row->sort);
	                    echo       '</div>
	                              </div>

	                              <div class="row collapse" name="child" id="parent_'.$row->id.'" style="padding : 10px 30px 7px 20px">
	                                <div class="col-sm-12">';
	                                    menu_backend($row->id);
	                    echo        '</div>
	                              </div>
	                           </div>';

	                }else{

	                    echo '<div class="each_menu m-5">
	                           <div class="row parent">
	                             <div class="col col-sm-10">
	                                <i class="fa fa-circle-o"></i> '.$row->name.'
	                             </div>
	                             <div class="col col-sm-2">';
	                                order($resultMenu,$row->id,$row->sort);
	                    echo       '</div>
	                              </div>
	                           </div>';

	                }
	                
	            }
	        }
	    }
	}


?>