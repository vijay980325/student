<?php require_once('student_header.php'); ?> 
        <div class="container" style="margin:auto;padding:auto;  ">
            <div class="card">
                <div class="row"> 
                    <div class="col-12">                     
                        <div class="container" style="padding:15px;">                         
                            <div class="row">
                                <div class="col-10">
                                </div>
                                <div class="col-2">
                                <br><button class="btn" type="button"  class="btn btn-primary"style="background-color:#ff007f;color:white;" onclick="studentaddfun();" >Add new </button>
                                </div>
                            </div><br>                                
                            <div class="container"  id="student_add_div" style="display:none;"> 
                                <div class="card">
                                    <form action="student_list.php" method="post" >
                                        <div class="row" style="margin:auto;padding:20px;">
                                            <div class="col-2">
                                                <label >Roll NO</label>
                                                <input type="text" required class="form-control" name="std_rollno" placeholder="Roll No">
                                            </div>
                                            <div class="col-2">
                                                <label >Student Name</label>
                                                <input type="text" required class="form-control" name="std_name" placeholder="First Name">
                                            </div>
                                            <div class="col-2">
                                                <label >Email</label>
                                                <input type="text" required class="form-control" name="std_email" placeholder="Email">
                                            </div>
                                            <div class="col-2">
                                                <label >Mobile</label>
                                                <input type="text" required class="form-control" name="std_mobile" placeholder="Mobile">
                                            </div>
                                            <div class="col-2">
                                                <label >Dept</label>
                                                <input type="text" required class="form-control" name="std_dept" placeholder="Dept">
                                            </div>  
                                            <div class="col-2">
                                                <label >Subject</label>
                                                <input type="text" required class="form-control" name="std_subject" placeholder="Subject">
                                            </div>  
                                            <div class="col-2">
                                                <label >Total Marks</label>
                                                <input type="text" required readonly style="background-color:white;" class="form-control" name="total_mark" value="100" placeholder="Marks">
                                            </div> 
                                            <div class="col-2">
                                                <label >Marks</label>
                                                <input type="number" min ="0" max="100"  onkeyup="this.value=this.value.replace(/[^\d]/,'')" required class="form-control" name="markobtain"  placeholder="Marks">
                                            </div>                                                                                            
                                        </div>
                                        <div class="row" style="padding:20px;">
                                            <div class="col-10">
                                                <button class="btn btn-primary" style="float:right;" name="submit_button" type="submit" > Submit </button> 
                                            </div>
                                            <div class="col-2">
                                               <button class="btn btn-danger" style="float:left;" type="reset" > <a href="/student_list.php" style="color:white;"   >Cancel </a> </button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                            </div><br>  
                            <div class="table-responsive">
                                <table class="table table-bordered" id="surv" width="100%" cellspacing="0">
                                    <!-- <table id="example" class="display nowrap" style="width:100%"> -->
                                        <thead>
                                        <tr>
                                        <th>roll no</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>mobile</th>
                                        <th>dept</th>
                                        <th>subject</th>
                                        <th>total mark</th>
                                        <th>mark</th>
                                        <th>result</th>
                                        <th>grade</th>  
                                    </tr>
                                    </thead>
                                    <tbody><?php
                                        $sql = "SELECT * FROM student RIGHT JOIN result ON student.rollno = result.rollno";
                                        $result = $conn->query($sql);                            
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                    <tr> 
                                        <td  >
                                            <form action="/student_edit.php" method="POST">
                                            <button class="btn btn-danger" name="editvalue" value="<?php "<br>   ". $row["rollno"]. "<br>"; ?>"  type="submit" >                                     
                                                <input type="text" hidden value="<?php echo   $row["name"]; ?>" name="name">
                                                <input type="text" hidden value="<?php echo   $row["email"]; ?>" name="email">
                                                <input type="text" hidden value="<?php echo   $row["mobile"]; ?>" name="mobile">
                                                <input type="text" hidden value="<?php echo   $row["dept"]; ?>" name="dept">
                                                <input type="text" hidden value="<?php echo   $row["subject"]; ?>" name="subject">
                                                <input type="text" hidden value="<?php echo   $row["total_mark"]; ?>" name="total_mark">
                                                <input type="text" hidden value="<?php echo   $row["markobtain"]; ?>" name="markobtain">
                                                <input type="text" hidden value="<?php echo   $row["result"]; ?>" name="result">
                                                <input type="text" hidden value="<?php echo   $row["grade"]; ?>" name="grade">
                                                <input type="text" hidden value="<?php echo   $row["rollno"]; ?>" name="rollno">


                                                <i class="fa fa-plus" aria-hidden="true" ><?php echo   $row["rollno"]; ?></i>
                                            </button>
                                            </form>
                                        </td>
                                        <td ><?php echo "<br>   ". $row["name"]. "<br>"; ?></td>
                                        <td ><?php echo "<br>   ". $row["email"]. "<br>"; ?></td>
                                        <td ><?php echo "<br>   ". $row["mobile"]. "<br>"; ?></td>
                                        <td ><?php echo "<br>   ". $row["dept"]. "<br>"; ?></td> 
                                        <td ><?php echo "<br>   ". $row["subject"]. "<br>"; ?></td> 
                                        <td ><?php echo "<br>   ". $row["total_mark"]. "<br>"; ?></td>  
                                        <td ><?php echo "<br>   ". $row["markobtain"]. "<br>"; ?></td> 
                                        <td ><?php echo "<br>   ". $row["result"]. "<br>"; ?></td> 
                                        <td ><?php echo "<br>   ". $row["grade"]. "<br>"; ?></td> 

                                    </tr>                                      
                                        <?php
                                        }
                                        } else {
                                            ?>
                                            <tr>                                    
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>  
                                   </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>roll no</th>
                                        <th>student Name</th>
                                        <th>Email</th>
                                        <th>mobile</th>
                                        <th>dept</th>
                                        <th>subject</th>
                                        <th>total mark</th>
                                        <th>mark</th>
                                        <th>result</th>
                                        <th>grade</th>  
                                    </tr>
                                   </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body> 
 
<script>
 function studentaddfun(){  
        //   document.getElementById('student_add_div').style.display = 'none';
      document.getElementById('student_add_div').style.display = "block"; 
}
</script>