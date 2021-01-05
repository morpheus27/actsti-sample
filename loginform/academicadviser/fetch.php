<?php
include("include/connection.php");

if (isset($_POST['view'])) {
	

$isread = 0;
$query = "SELECT tblprojects.id as lid,csgname.firstname,csgname.file,csgname.usertype,tblprojects.ProjectType,tblprojects.PostingDate 
          FROM tblprojects JOIN csgname ON tblprojects.empid = csgname.id 
          WHERE tblprojects.IsRead = '$isread' ORDER BY lid DESC ";
$result = mysqli_query($conn, $query);

$output = '';
$output .= '<div style ="text-align:left;padding:10px;display:flex;cursor:default;border-bottom:2px solid rgba(0,0,0,0.2);"><h4>Notifications</h4>
<i style="color:#005baa;font-size:20px;margin-left:120px;"class="fas fa-exclamation-triangle"></i></div>';

if(mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_array($result)) {  
   $datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["PostingDate"]);
   $datetime =  $datetime->format("F j, Y, g:i a");
   $images = $row['file'] ? $row['file'] : 'default.png';
   $output .='
   <div class="con-list ml-1 mt-2 mr-1">                        
   <li style ="padding-bottom:25px;" class = "noti-list">
   <a style = "display:flex;" href="events-details.php?eventid='.$row["lid"].'">
   <img class="ml-2 mt-3" style="height:50px;border-radius:50%;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.3);border:1px solid #000;" src="../academicadviser/csg-profile-photos/'.$images.'" />
   <p style ="padding:3px;text-align:left;color:#000;font-size:14px;"class="ml-2">The <strong>'.$row["usertype"].'</strong> notify you to review their event proposal.</p>
   <p style ="position:absolute;margin-top:70px;margin-left:70px;font-size:13px;color:#005baa;">'.$datetime.'</p>
   </a>
   </div>
   </li>';
 } 
} 
else{
  $output .= '
  <li style = "text-align:center;margin-top:15px;font-size:15px;font-weight:500;"><p>No Notification Found</p></li>';
}


$status = "SELECT * FROM tblprojects WHERE IsRead = 0 ";
$result = mysqli_query($conn, $status);
$count = mysqli_num_rows($result);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);
}
?>