<?php require_once('student_header.php'); ?>
<body style="margin:auto;padding:auto;width:100%;height:100%;     background: linear-gradient(to bottom, #33ccff 0%, #ccffff 100%);">
    <div class="container" style="margin:auto;padding:auto;  ">
        <div class="card">
            <div class="row"> 
                <div class="col-12">                     
                    <div class="container" style="padding:15px;">                         
                            <div class="row">
                                <!-- <div class="col-10">
                                </div>
                                <div class="col-2">
                                <br><button class="btn" type="button"  class="btn btn-primary"style="background-color:#ff007f;color:white;" onclick="addressaddfun();" >Add new </button>
                                </div> -->
                                <div class="col-12">
                                <p style="text-align:center;">Your gonna edit Roll No: <?php echo $_POST['rollno']; ?></p>
                                </div>
                            </div><br>
                            <div class="container" id="editdiv" >
                                <div class="card">
                                    <div class="row">
                                                    
                                    <form action="student_list.php" method="post" > 
                                        <div class="row" style="margin:auto;padding:20px;">
                                            <div class="col-2">
                                                <label >Roll NO</label>
                                                <input type="text" required class="form-control"value="<?php echo$_POST['rollno']; ?>" name="std_rollno" placeholder="Roll No">
                                            </div>
                                            <div class="col-2">
                                                <label > Name</label>
                                                <input type="text" required class="form-control"value="<?php echo $_POST['name']; ?>" name="std_name" placeholder="First Name">
                                            </div>
                                            <div class="col-2">
                                                <label >Email</label>
                                                <input type="text" required class="form-control" value="<?php echo $_POST['email']; ?>"name="std_email" placeholder="Email">
                                            </div>
                                            <div class="col-2">
                                                <label >Mobile</label>
                                                <input type="text" required class="form-control"value="<?php echo $_POST['mobile']; ?>" name="std_mobile" placeholder="Mobile">
                                            </div>
                                            <div class="col-2">
                                                <label >Dept</label>
                                                <input type="text" required class="form-control"value="<?php echo $_POST['dept']; ?>" name="std_dept" placeholder="Dept">
                                            </div>  
                                            <div class="col-2">
                                                <label >Subject</label>
                                                <input type="text" required class="form-control" value="<?php echo $_POST['subject']; ?>" name="std_subject" placeholder="Subject">
                                            </div>  
                                            <div class="col-2">
                                                <label >Marks</label>
                                                <input type="text" required style="background-color:white;" readonly class="form-control"value="<?php echo $_POST['total_mark']; ?>" name="total_mark" placeholder="Marks">
                                            </div>  
                                            <div class="col-2">
                                                <label >Marks</label>
                                                <input type="number" min ="0" max="100"  onkeyup="this.value=this.value.replace(/[^\d]/,'')" required  class="form-control" name="markobtain" value="<?php echo $_POST['markobtain']; ?>" placeholder="Results">
                                            </div>  
                                            <div class="col-2">
                                                <label >Result</label>
                                                <input type="text" required style="background-color:white;" readonly class="form-control" name="result" value="<?php echo $_POST['result']; ?>" placeholder="Results">
                                            </div> 
                                            <div class="col-2">
                                                <label >Grade</label>
                                                <input type="text" required style="background-color:white;" readonly class="form-control" name="grade" value="<?php echo $_POST['grade']; ?>"  placeholder="Grade">
                                            </div> 
                                                                                        
                                        </div>
                                        <div class="row" style="padding:20px;">
                                            <div class="col-9">
                                                <button class="btn btn-success" style="float:right;" name="edit_submit_button" type="submit" > Edit </button> 
                                            </div>
                                            <div class="col-1">
                                                <form action="student_list.php" method="post">
                                                    <input type="text" style="display:none;"  class="form-control"value=" <?php $_POST['rollno']; ?>" name="rollno" >
                                                    <button class="btn btn-primary"  name="delete_submit_button" type="submit" > Delete </button> 
                                                </form>
                                            </div>
                                            <div class="col-1">
                                               <button class="btn btn-danger" style="float:left;" type="reset" > <a href="/student_list.php" style="color:white;"   >Cancel </a> </button> 
                                            </div>
                                        </div>
                                    </form>
                                                   
                                    </div>
                                </div>
                            </div>    <br>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

