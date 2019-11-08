<?php
	if(!function_exists("limit_page")){
		function limit_page()
		{
        	$limit = ['10'=>'10','25'=>'25','50'=>'50','100'=>'100',''=>'All'];
        	return $limit;
		}
	}
?>