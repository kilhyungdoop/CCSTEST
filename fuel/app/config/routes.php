<?php
return array(
	//'_root_'  => 'welcome/index',  // The default route
	//'_404_'   => 'welcome/404',    // The main 404 route
	'_root_'  => 'auth/login',  // The default route
	'_404_'   => 'auth/login',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
