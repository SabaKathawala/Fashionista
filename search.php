<!-- ***********************************   autosuggest  ********************************************* -->
<?php

if(isset($_REQUEST['act']) && $_REQUEST['act'] =='autoSuggestUser' && isset($_REQUEST['queryString'])) {
// $db_host = 'localhost';
// $db_user = 'root';
// $db_password = '';
// $db_name = 'yourdatabase';

// $connect = mysql_connect($db_host, $db_user ,$db_password);
// $db = mysql_select_db($db_name,$connect);
// if($db){

require_once('dbconnection.php');
$obj = new DBConnect();
$query="";
$arr=array();
$new_arr=array();
$string = '';
$queryString = $_REQUEST['queryString'];
// $query = "SELECT * FROM countries WHERE country like'" .$queryString . "%' ORDER BY country"; 
// $resource = mysql_query($query);

$query = " Select `search_keyword`
           from `product`
           where `search_keyword` LIKE '" .$queryString. "%' ";
if($result= $obj->sql_select($query))
{
    if(mysqli_num_rows($result) > 0) 
    {
        $string.= '<ul>';
        while($row = mysqli_fetch_assoc($result))
        {
            // $string.= '<li onClick="fill(\''.addslashes($row['search_keyword']).'\');">'.$row['search_keyword'].'</li>';
            $arr=explode(',',$row['search_keyword']);
            for($i=0;$i<count($arr);$i++)
            {
                if(strpos($arr[$i], $queryString)===0)
                    $new_arr[]=$arr[$i];
            }
        }
        $new_arr=array_unique($new_arr);
        // $c=0;
        foreach ($new_arr as $new) 
        {
            // $string.= '<li class="list-item" tabindex=$c onLoad="key_down();" onClick=" fill(\''.addslashes($new).'\');">'.$new.'</li>'."<br/>\n";
            // $c=$c+1;
            $string.= '<li onClick=" fill(\''.addslashes($new).'\');">'.$new.'</li>'."<br/>\n";
        }
        $string.= '</ul>';
    }
    else 
    {
        $string.= '<li>No Product found</li>';
    }
    echo $string;
    exit;
} 

// if($resource && mysql_num_rows($resource) > 0) 
// {
// $string.= '<ul>';
// while($result = mysql_fetch_object($resource)){
// $string.= '<li onClick="fillId(\''.addslashes($result->id).'\');fill(\''.addslashes($result->country).'\');">'.$result->country.'</li>';

// $string.= '<li onClick="fill(\''.addslashes($result->country).'\');">'.$result->country.'</li>';


// }
// $string.= '</ul>';

// } else {
// $string.= '<li>No Record found</li>';
// }
// echo $string;
// exit;

// }
// exit;
}

?>
<!-- ***********************************   autosuggest  ********************************************* -->