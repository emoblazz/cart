<?php 
include '../dist/includes/dbcon.php';

if (isset($_REQUEST['status'])=="done")
{
     $order_id = $_REQUEST['order_id'];
 
    mysqli_query($con,"UPDATE `order` SET order_status='for pickup' where order_id='$order_id'")
	 or die(mysqli_error($con)); 

	 		    	  	$query=mysqli_query($con,"select * from `order` natural join customer where order_id='$order_id'")or die(mysqli_error($con));
				          $row=mysqli_fetch_array($query);
				            $name=$row['cust_name'];
				            $contact=$row['cust_contact'];
				            $order_date=$row['order_date'];

 				$date=date("M d, Y",strtotime($order_date));
                $message="Your order dated $date with Order No $order_id is ready for pickup at Cornel Store. Thank You";
                $message= str_replace(' ', '%20', $message);
                $ch = curl_init();
                $url="https://rest.nexmo.com/sms/json?api_key=b2e5ffdd&api_secret=Oj29OnRbkN9QhjMF&to=$contact&from=CornelStore&text=$message";
                // set URL and other appropriate options
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, 0);

                // grab URL and pass it to the browser
                curl_exec($ch);

                // close cURL resource, and free up system resources
                curl_close($ch);

				echo "<script>document.location='incoming.php'</script>";
     //echo '<script>alert("Category Successfully Saved")</script>';
     //echo  '<script>window.location = "incoming.php"</script>';
}

?>
