<?php
//Put Routes Here, separator multiple method using /

$default = "login";

$routes = array(
	array(
		"method" => "get/post",
		"url" => "login",
		"src" => "AuthController/login"
	),
	array(
		"method" => "get",
		"url" => "logout",
		"src" => "AuthController/logout"
	),
	array(
		"method"=> "get",
		"url" => "main/index",
		"src" => "main/index"
	),
	array(
		"method"=> "get",
		"url" => "dashboard",
		"src" => "dashboard/index"
	),
	array(
		"method"=> "post",
		"url" => "request/get_count_patient",
		"src" => "dashboard/getCountPatient"
	),
	array(
		"method"=> "get",
		"url" => "main/list",
		"src" => "main/list"
	),
	array(
		"method"=> "get",
		"url" => "admin/index",
		"src" => "admin/index"
	),
	array(
		"method"=> "get/post",
		"url" => "admin/create",
		"src" => "admin/create"
	),
	array(
		"method" => "get",
		"url" => "main/detail",
		"src" => "main/detail"
	),
	array(
		"method" => "get/post",
		"url" => "main/create",
		"src" => "main/create"
	),
	array(
		"method" => "get/post",
		"url" => "main/update",
		"src" => "main/update"
	),
	array(
		"method" => "post",
		"url" => "main/delete",
		"src" => "main/delete"
	)
);

?>