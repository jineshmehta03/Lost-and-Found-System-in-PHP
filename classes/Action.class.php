<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require "../classes/config.php";
$categoriesTble = "categories";
$itemsTble = "items";
/**
* Handle all the action requersts and insert or update into db
**/
class Action extends DB
{
    public $response;
	function __construct( $Tble, $Arr )
    {
        parent::__construct( $this->host, $this->usernme, $this->password, $this->database );
        
        $this->response = $this->action($Tble, $Arr);
        
        return $this->response;
    }
    
    public function action($table, $data)
    {
        $this->response = $this->insertData( $table, $data );
        return $this->response;
    }
}


if( isset($_POST['add_category'] ) )
{
    $category_Arr = array();
    $category_Arr['name'] = $_POST['name'];
    $category_Arr['parent'] = isset( $_POST['parent'] ) ? $_POST['parent'] : "-1";
    $obj = new Action( $categoriesTble, $category_Arr );
    if( $obj->response )
    {
        header("Location: " . BASE_URL_ADMIN . "/categories.php");
    }else{
        die("Category not saved! Back to the <a href='" . BASE_URL_ADMIN . "'/categories.php'>Category Page</a>");
    }
}
?>