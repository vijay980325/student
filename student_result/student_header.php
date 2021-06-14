<head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" >
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" >

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>






   

   
<script>
$(document).ready(function() {
    $('#usersTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script >
        $(document).ready(function() {
            $('#surv thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="'+title+'" />' );
            } );
                var table = $('#surv').DataTable({
                dom: 'lBrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5','pdfHtml5' ],
                pageLength : 5,
                lengthMenu: [[5, 10, 20, 50, 100, 200, 500, -1], [5, 10, 20, 50, 100, 200, 500,  'All']],
                "scrollX"   : true,
                "scrollY"   : false,
                "bScrollCollapse": true,
              
                initComplete: function () {

                    $('.dataTables_scrollHead').css('overflow', 'auto');
                    // Sync THEAD scrolling with TBODY
                    $('.dataTables_scrollHead').on('scroll', function () {
                        $('.dataTables_scrollBody').scrollLeft($(this).scrollLeft());
                    }); 
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;

                        $('input', this.header() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        } );
                    } );
                },
               

            });


        });
      </script>
<?php

require_once('student_database.php'); 
if(isset($_POST['submit_button'])){ 
$rollno = $_POST['std_rollno'];
$name = $_POST['std_name'];
$email = $_POST['std_email'];
$mobile = $_POST['std_mobile'];
$dept = $_POST['std_dept'];
$subject = $_POST['std_subject'];
$total_mark = '100';
$markobtain = $_POST['markobtain'];
// echo $markobtain;
// $result = '1';
// $grade = '2';

    if($markobtain < 49){
        $grade = 'U';
        $result = 'Fail';
    }
    else if($markobtain >= 50 && $markobtain < 60 ){
    $grade = 'C';
    $result = 'Pass';
    }
    else if($markobtain >= 60 && $markobtain < 70 ){
    $grade = 'B';
    $result = 'Pass';
    }
    else if($markobtain >= 70 && $markobtain < 80){
    $grade = 'A';
    $result = 'Pass';
    }
    else if($markobtain >= 80 && $markobtain < 90){
    $grade = 'A+';
    $result = 'Pass';
    }
    else if($markobtain >= 90 && $markobtain < 100){
    $grade = 'S';
    $result = 'Pass';
    }

$link = mysqli_connect("localhost", "root", "", "studentresult");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql =" INSERT INTO result  (rollno,subject, total_mark,markobtain, result,grade) VALUES ('$rollno', '$subject','$total_mark','$markobtain', '$result','$grade')";
$sql1 ="INSERT INTO student (rollno,name, email, mobile, dept) VALUES ('$rollno', '$name', '$email', '$mobile', '$dept')";
// $sql1 = "INSERT INTO result  (rollno,subject, markobtain, result,grade) VALUES ('$rollno', '$subject','$markobtain', '$result','$grade')";


if(mysqli_query($link, $sql)){
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql1)){
  
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}
mysqli_close($link);
}
  
if(isset($_POST['edit_submit_button'])){  
    
$rollno = $_POST['std_rollno'];
$name = $_POST['std_name'];
$email = $_POST['std_email'];
$mobile = $_POST['std_mobile'];
$dept = $_POST['std_dept'];
$subject = $_POST['std_subject'];
$total_mark ='100';
$markobtain = $_POST['markobtain'];
// $result = '1';
// $grade = '2'; 
if($markobtain < 49){
    $grade = 'U';
    $result = 'Fail';
}
else if($markobtain >= 60 && $markobtain < 70 ){
$grade = 'B';
$result = 'Pass';
}
else if($markobtain >= 70 && $markobtain < 80){
$grade = 'A';
$result = 'Pass';
}
else if($markobtain >= 80 && $markobtain < 90){
$grade = 'A+';
$result = 'Pass';
}
else if($markobtain >= 90 && $markobtain <= 100){
$grade = 'S';
$result = 'Pass'; 
}

else if($markobtain >= 50 && $markobtain < 60 ){
    $grade = 'C';
    $result = 'Pass';
    }
// echo $newvalue;
$link = mysqli_connect("localhost", "root", "", "studentresult");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// $sql = "INSERT INTO addressbook (name, firstname, email, street, zipcode,city) VALUES ('$name', '$firstname', '$email', '$street', '$zipcode','$city')";
$sql  = "UPDATE result SET subject='$subject',total_mark='$total_mark',markobtain='$markobtain',result='$result',grade= '$grade' WHERE rollno= '$rollno'";
$sql1 = "UPDATE student SET name='$name',email='$email',mobile='$mobile',dept='$dept' WHERE rollno= '$rollno'";

if(mysqli_query($link, $sql)){
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql1)){
  
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}
mysqli_close($link);
}

if(isset($_POST['delete_submit_button'])){ 
    $rollno = $_POST['std_rollno'];    
    
$link = mysqli_connect("localhost", "root", "", "studentresult");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql  =  "DELETE FROM result WHERE rollno= $rollno"; 
$sql1 =  "DELETE FROM student WHERE rollno= $rollno"; 
if(mysqli_query($link, $sql)){
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql1)){
  
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}
mysqli_close($link);

}

    ?>
    