<?php
//fetch.php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
$columns = array('nme', 'fsol', 'nre', 'nrep', 'deta');

$query = "SELECT * FROM soli";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nme LIKE "%'.$_POST["search"]["value"].'%" 
 OR fsol LIKE "%'.$_POST["search"]["value"].'%" 
 OR nre LIKE "%'.$_POST["search"]["value"].'%" 
 OR nrep LIKE "%'.$_POST["search"]["value"].'%" 
 OR deta LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY nme DESC ';
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
 $sub_array[] = $row["nme"] ;
 $sub_array[] = '<div contenteditable class="update" data-nme="'.$row["nme"].'" data-column="fsol">' . $row["fsol"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-nme="'.$row["nme"].'" data-column="nre">' . $row["nre"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-nme="'.$row["nme"].'" data-column="nrep">' . $row["nrep"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-nme="'.$row["nme"].'" data-column="deta">' . $row["deta"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" nme="'.$row["nme"].'"><img src="../imagenes/delete.png" width="24" height="24" /></button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM soli";
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
