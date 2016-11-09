
<h2>Admin</h2>
<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, unde, tenetur, consequuntur eaque ipsum sint aliquid sapiente cumque ab nisi non vel architecto praesentium et accusantium impedit numquam! Qui, placeat.</p>-->

<?php
 $verb = $_SERVER['REQUEST_METHOD'];

// echo $verb;
// var_dump($_SERVER);
switch ($verb) {
	case 'PUT':
		// echo 'PUT';
		// echo file_get_contents("php://input");
		parse_str(file_get_contents("php://input"),$post_vars);
		echo "Der Datensatz mit der ID={$post_vars['id']} wird geändert auf:<br>Name: {$post_vars['name']}<br>Email: {$post_vars['email']}";
		break;
	case 'PATCH':
		// echo 'PATCH';
		parse_str(file_get_contents("php://input"),$post_vars);
		echo "Der Datensatz mit der ID={$post_vars['id']} wird geändert auf:<br>Name: {$post_vars['name']}<br>Email: {$post_vars['email']}";
		break;
	case 'DELETE':
		// echo 'DELETE';
		parse_str(file_get_contents("php://input"),$post_vars);
		echo "Datensatz id= {$post_vars['id']} wird gelöscht";
		break;
	case 'POST':
		echo 'Name: '.$_POST['name'].'<br>';
		echo 'Email: '.$_POST['email'].'<br>';
		// var_dump($_SERVER);
		break;
	case 'GET':
	default:
		$id = $include->getKeyValue('id') ?? 0;
		if ($id == 0) {
			echo 'Kein User angegeben';
		} elseif ($id == 1) {
			echo 'Name: Person 1<br>';
			echo 'Email: Email 1<br>';
		} elseif ($id == 2) {
			echo 'Name: Person 2<br>';
			echo 'Email: Email 2<br>';
		}
		// var_dump($_SERVER);
		
		break;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

