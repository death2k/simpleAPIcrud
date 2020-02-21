<?php 

require_once('app/modules/reqres.api.php');

// Pega os Usuarios da page 1 sem fazer merge nos arrays 
// Refatorar para deixar 1 elemento só 
$listuser = json_decode(pullAPI('GET','https://reqres.in/api/users?page=1', false) , true);
$listuser2 = json_decode(pullAPI('GET','https://reqres.in/api/users?page=2', false) , true);
$mergeusers = array_merge_recursive($listuser, $listuser2);
$data_users = $mergeusers['data'];

foreach ($data_users as $usr ) {
    echo $usr['first_name'] . "<br>";
}

 // Metodo POST , Gera o array com os dados a ser enviado p API ..
$data_array = array(
    'id' => '16',
    'first_name' => 'Teste1',
    'last_name' => 'flavo',
    'email' => 'flavo',
);

$adduser = json_decode(pullAPI('POST', 'https://reqres.in/api/users', json_encode($data_array)), true);

//print_r($adduser);

 // Passando parametros de UPDATE com metodo PUT 
  
$id = '6';
$email = 'flavio@odara.com.br';
$first_name = 'Flavio';
$last_name  = 'Ribeiro'; 
$avatar = 'http://odara.com.br/img.jpg'; 

$data_array =  array(
    'id' => $id,
    'email' => $email,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'avatar' => $avatar
 );

$update_user = json_decode(pullAPI('PUT', 'https://reqres.in/api/users/' . $id, json_encode($data_array)), true);

//print_r($update_user);

// Metodo DELETE , passando qual $id vai ser deletao pela URL 
$id = '4';
$delete_user = pullAPI('DELETE', 'https://reqres.in/api/users/' . $id, false);
$usuariodeletado = json_decode($delete_user, true);

if(isset($delete_user)){
    echo "O Usuário " . $usuariodeletado['data']['first_name'] . " Foi deletado" . "<br>";
}else {
    echo "Usuário não encontrado";
}

?>


