<?php
include('../dist/includes/dbcon.php');
  //require('db_config.php');


  /* Getting demo_viewer table data */
  //$sql = "select SUM(amount_due) from sales natural join sales_details natural join product group by MONTH(date_added)+'-'+YEAR(date_added)";
//  $sql = "SELECT SUM(numberofview) as count FROM demo_viewer 
//      GROUP BY YEAR(created_at) ORDER BY created_at";
//  $viewer = mysqli_query($mysqli,$sql);
//  $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
//  $viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


  /* Getting demo_click table data */
 /* $year=$_REQUEST['year'];
  $sql = "SELECT SUM(order_total) as total,DATE_FORMAT(order_date,'%Y/%m') as date FROM `order` where year(order_date)='$year' and payment_status='paid' group by date";
                  $click = mysqli_query($con,$sql);
                  $click = mysqli_fetch_all($click,MYSQLI_ASSOC);
                  $date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
                  $click = json_encode(array_column($click, 'total'),JSON_NUMERIC_CHECK);
                
*/

?>


<!DOCTYPE html>
<html>
<head>
  <title>Monthly Sales Report</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
  <script src="../dist/js/highcharts.js"></script>
  <style type="text/css">
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
</head>
<body>


<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Yearly Sales Report'
        },
        colors:'#FF530D',
        xAxis: {
            categories: data
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [{
            name: 'Monthly Sales',
            data: data_click
        },]
    });
});


</script>


<div class="container">
  <br/>
  <?php
      $date=$_POST['date'];
      $date=explode('-',$date);
      $start=date("Y-m-d",strtotime($date[0]));
      $end=date("Y-m-d",strtotime($date[1]));
  ?>
  <h2 class="text-center">Daily/Weekly Sales Report <br> for <?php echo $start." to ".$end;?>
   <input class="btn-print btn-warning" type="button" name="print" value="Print" onclick="window.print();window.location.href='reports.php';">            </h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div id="container"></div>
                    <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Product</th>
                      <th>Sales</th>
                    </tr>
<?php

      $grand=0;
    $query=mysqli_query($con,"SELECT *,SUM(total) as total from order_details natural join `order` natural join product where CAST(order_date as DATE) between '$start' and '$end' and payment_status='paid' GROUP BY prod_id ORDER BY prod_name")or die(mysqli_error($con));

    while($row=mysqli_fetch_array($query)){
      $grand=$grand+$row['total'];
?>                  <tr>
                       <td><?php echo $row['prod_name'];?></td> 
                       <td>Php <?php echo $row['total'];?></td> 
                    </tr>  
<?php }?>
                    <tr>
                       <th>Total</th> 
                       <th>Php <?php echo number_format($grand,2);?></th> 
                    </tr> 
                  </table>       
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
