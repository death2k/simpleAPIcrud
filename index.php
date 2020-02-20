<?php 

require_once('app/modules/reqres.api.php');
$get_users = callAPI('GET','https://reqres.in/api/users?page=2', false);

$listuser = json_decode($get_users, true);





?>