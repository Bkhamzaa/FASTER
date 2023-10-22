
<h1>
<?php
////echo $_SERVER["REQUEST_uri"];
?>
</h1>

<?php

session_start();

$ROOT = __DIR__ ;

$DS=DIRECTORY_SEPARATOR;
$controleur_default='user';
$action_default='';


if(!isset($_REQUEST['controller'])){
    $controller=$controleur_default;
    require("{$ROOT}{$DS}views{$DS}home.php");

}
else {
    $controller = $_REQUEST['controller'];
}
if(!isset($_REQUEST['action'])){
    $action=$action_default;}
else {
        $action = $_REQUEST['action'];
}


require("{$ROOT}{$DS}controller{$DS}Controller_{$controller}.php");



?>