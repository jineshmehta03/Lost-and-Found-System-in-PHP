<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
define('DB_HOST', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "lostandfound");
define('DB_USER_TBL', 'users');

/**
* Configration class
*/

class DB
{
    public $db;
    public $host = DB_HOST; // hostname
    public $usernme = DB_USERNAME; // database username
    public $password = DB_PASSWORD; // database password
    public $database = DB_NAME; // database name
    /**
    * construct method called by default when object created of this /**
    */
    function __construct( $host, $usernme, $password, $database )
    {
          // setup credentials to variables
          $this->host = $host;
          $this->username = $usernme;
          $this->password = $password;
          $this->database = $database;

          // mysqli db method call
          $conn = mysqli_connect( $this->host, $this->username, $this->password, $this->database );

          // Check connection
          if ( $conn->connect_error )
          {
            echo "Failed to connect to MySQL: " . $conn->connect_error; exit();
          }else{
            $this->db = $conn;
            return $this->db;
          }
    }

    function checkSession($user_sesison)
    {
        if( isset( $user_sesison['admin'] ) || isset( $user_sesison['id'] ) )
        {
            return "true";
        }else{
            return "false";
        }
    }

    // This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
    function lf_breadcrumbs($separator = ' / ', $home = 'Home') 
    {
        // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
        $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

        // This will build our "base URL" ... Also accounts for HTTPS :)
        $base = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

        // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
        $breadcrumbs = Array("<a href=".BASE_URL_ADMIN.">$home</a> <span>/</span> ");

        // Find out the index for the last value in our path array
        $ak = array_keys($path);
        $last = end($ak);
        $breadcrumbs[] = '<ul class="list-unstyled list-inline au-breadcrumb__list">';
        // Build the rest of the breadcrumbs
        foreach ($path AS $x => $crumb) 
        {
            // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
            $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

            // If we are not on the last index, then display an <a> tag
            if ($x != $last)
                $breadcrumbs[] = "<li class='list-inline-item'><a href='".BASE_URL_ADMIN."'>".$title." </a> <span>/</span> </li>";
                // Otherwise, just display the title (minus)
            else
                $breadcrumbs[] = "<li class='list-inline-item'>".$title." <span>/</span> </li>";
        }
        $breadcrumbs[] = '</ul>';
        // Build our temporary array (pieces of bread) into one big string :)
        return join($breadcrumbs);
    }
    
    function getRows( $tableName, $orderby = "", $condition = "" )
    {
        $rows = array();
        $query = "SELECT * FROM " . $tableName . $condition . " ORDER BY id ". $orderby;
        $res = mysqli_query( $this->db, $query ) or die( mysqli_error( $this->db ) );
        if ( $res->num_rows > 0 )
        {
            while( $row = mysqli_fetch_assoc( $res ) ) 
            {
               $rows[] = $row;
            }
            return $rows;
        } else {
            return $res->num_rows;
        }
    }
    
    function getRow( $tableName, $where )
    {
        $query = "SELECT * FROM $tableName " . $where;
        $res = mysqli_query( $this->db, $query ) or die( mysqli_error( $this->db ) );
        if ( $res->num_rows > 0 )
        {
            $row = mysqli_fetch_assoc( $res );
            return $row;
        }else{
            return 0;
        }
    }
    
    function insertData( $tableName, $formData )
    {
        // retrieve the keys of the array (column titles)
        $fields = array_keys( $formData );

        // build the query
        $query = "INSERT INTO ".$tableName."
        (".implode(",", $fields).")
        VALUES('".implode("','", $formData)."')";
        echo $query;
        // run and return the query result resource
        $res = mysqli_query( $this->db, $query ) or die( mysqli_error( $this->db ) );
        mysqli_close( $this->db );
        return $res;
    }
    
    function updateData( $tableName, $insData, $where )
    {
        $cols = array();
        foreach( $data as $key=>$val )
        {
            $cols[] = "$key = '$val'";
        }
        $query = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE $where";
        $res = mysqli_query( $this->conn, $query ) or die( mysqli_error( $this->db ) );
        mysqli_close( $this->db );
        return $res;
    }
    
    function fileupload($ten_anh)
    {
        
        if(isset($ten_anh))
        {
             $errors= array();
             $file_name = $ten_anh['name'];
             $file_size =$ten_anh['size'];
             $file_tmp =$ten_anh['tmp_name'];
             $file_type=$ten_anh['type'];
             $tt = explode('.',$ten_anh['name']);
             $file_ext=strtolower(end($tt));
        
             $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Only allowed JPEG and PNG.";
            }

             if($file_size > 2097152){
                    $errors[]='File could not be more then 2 MB';
             }

             if(empty($errors)==true){
                    move_uploaded_file($file_tmp,FCPATH."uploads/".$file_name);
                    return BASE_URL . "uploads/".$file_name;
             }
             else{
                    return $errors;
             }
        }
    }
}

// Google API configuration
define('GOOGLE_CLIENT_ID', '781663175395-5d6l65cj2vpgeguef8s1mbbljpg64av4.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 's4h-W2yks1a2j3q6ownzz6xp');
define('GOOGLE_REDIRECT_URL', 'http://localhost/landf/account.php');
define('BASE_URL_ADMIN', 'http://localhost/landf/admin');
define('BASE_URL', 'http://localhost/landf/');
$get_current_path_to_front = str_replace('\\', '/', realpath(dirname(__FILE__))) . '/';

$set_new_path_to_front = str_replace('\\', '/', realpath($get_current_path_to_front . '../')) . '/';

//echo $set_new_path_to_front;

// Path to the front controller (this file)
define('FCPATH', $set_new_path_to_front);

// Start session
if(!session_id())
{
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login To Lost & Found');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);

$db = new DB( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME );
?>
