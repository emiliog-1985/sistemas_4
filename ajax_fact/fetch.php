<?php
//fetch.php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
$columns = array('nfac', 'prov', ' ord', 'det');

$query = "SELECT * FROM fact";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nfac LIKE "%'.$_POST["search"]["value"].'%" 
 OR prov LIKE "%'.$_POST["search"]["value"].'%"  
 OR ord LIKE "%'.$_POST["search"]["value"].'%"  
 OR det LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY nfac DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["nfac"] ;
 $sub_array[] = '<div contenteditable class="update" data-nfac="'.$row["nfac"].'" data-column="prov">' . $row["prov"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-nfac="'.$row["nfac"].'" data-column="ord">' . $row["ord"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-nfac="'.$row["nfac"].'" data-column="det">' . $row["det"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" nfac="'.$row["nfac"].'"><img src="../imagenes/delete.png" width="24" height="24" /></button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM fact";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
