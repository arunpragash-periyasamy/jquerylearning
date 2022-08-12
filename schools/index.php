<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="stylesheet" type="" href="index.css">

        <script>
            $(document).ready(function(){
                

                // page load data

                $("#loginForm").show();
                $("#adminContainer").hide();
                $("#userContainer").hide();
                $(".userRegistrationForm").hide();
                $(".studentRegistrationForm").hide();
                $(".studentMarks").hide();
                $("#studentMarkListTable").hide();
                $(".userstudentMarks").hide();
                

                // session part


                // check the session is set or not
                if(sessionStorage.getItem("user")=="admin"){
                    $("#adminContainer").show();
                    $("#userContainer").hide();
                    $("#loginForm").hide();
                    $("#mainmsg").html(sessionStorage.getItem("user"));
                }
                else if(sessionStorage.getItem("user")=="user"){
                    $("#adminContainer").hide();
                    $("#userContainer").show();
                    $("#loginForm").hide();
                    // $("#mainmsg").html(sessionStorage.getItem("user"));
                }
                else{
                    
                $("#loginForm").show();
                $("#adminContainer").hide();
                $("#userContainer").hide();
                $(".userRegistrationForm").hide();
                $(".studentRegistrationForm").hide();
                $(".studentMarks").hide();
                $("#studentMarkListTable").hide();
                $(".userstudentMarks").hide();
                }


                // login credential validation
                $("#btn").click(function(){
                    $.post("./indexdb.php",$(".loginForm").serialize(),function(data){
                        if(data=="admin"){
                            $("#loginForm").hide();
                            $("#adminContainer").show();
                            sessionStorage.setItem("user", "admin");
                        }
                        else if(data=="user"){
                            $("#loginForm").hide();
                            $("#userContainer").show();
                            sessionStorage.setItem("user", "user");
                        }
                        else{
                            $("#msg").html(data);
                        }
                    });
                });


                // logout section

                // admin logout
                $("#adminlogout").click(function(){
                  alert("Successfully Logged out");
                  sessionStorage.removeItem("user");
                  location.reload();
                });

                // user logout
                $("#userlogout").click(function(){
                  alert("Successfully Logged out");
                  sessionStorage.removeItem("user");
                  location.reload();
                });


                // Form pages


                // user registration 
                $("#userRegistration").click(function(){
                    loadUserDetails();
                    $(".userRegistrationForm").show();
                    $("#studentRegistrationContent").hide();
                    $(".studentRegistrationForm").hide();
                    $(".studentMarks").hide();
                    $("#studentMarkListTable").hide();
                });

                // student registration
                $("#studentRegistration").click(function(){
                    loadStudentDetails();
                    $(".studentRegistrationForm").show();
                    $(".userRegistrationForm").hide();
                    $(".studentMarks").hide();
                    $("#studentMarkListTable").hide();
                    $("#userstudentDetailsTable").hide();
                });


                // student Marks Form
                $("#studentMarks").click(function(){
                    $(".studentMarks").show();
                    $(".studentRegistrationForm").hide();
                    $(".userRegistrationForm").hide();
                    $("#studentMarkListTable").hide();
                    $("#userstudentDetailsTable").hide();
                    loadStudentMarks();
                });

                // student marks form for user
                $("#studentMark").click(function(){
                    $(".userstudentMarks").show();
                    loadStudentMarks();
                    $(".studentRegistrationForm").hide();
                    $(".userRegistrationForm").hide();
                    $("#studentMarkListTable").hide();
                    $("#userstudentDetailsTable").hide();
                    loadStudentMarks();
                });
                

                $("#studentDetails").click(function(){
                    $(".studentMarks").hide();
                    $(".studentRegistrationForm").hide();
                    $(".userRegistrationForm").hide();
                    $("#studentMarkListTable").hide();
                    $("#userstudentDetailsTable").hide();
                    loadStudentMarks();
                });


                // Data insertion in Database 

                // userRegistration data post 
                $("#userRegisterButton").click(function(){
                    $.post("./userRegistration.php",$("#userRegistrationForm").serialize(),function(data){
                    $("#regerror").html(data);
                    if(data==""){
                        $("#studentRegistrationForm").trigger("reset");
                        loadUserDetails();
                    }
                    });
                });


                // student registration data inserted in database
                $("#studentRegisterButton").click(function(){

                    $.post("./studentRegistrationDb.php",$("#studentRegistrationForm").serialize(),function(data){
                        if(data=='inserted'){
                            $("#studentregistrationerror").html("Data inserted successfully");
                            $("#studentRegistrationForm").trigger("reset");
                            loadStudentDetails();
                        }
                        else{
                            $("#studentregistrationerror").html(data);
                        }
                    });
                });


                // student mark details data inserted in database
                $("#studentMarksButton").click(function(){
                    $.post("./studentMarkDetails.php",$("#studentMarksForm").serialize(),function(data){
                        $("#studentmarkserror").html(data);
                        if(data==""){
                            $("#studentRegistrationForm").trigger("reset");
                            loadStudentMarks();
                        }
                    });
                });

                // student mark details data inserted in database
                $("#userstudentMarksButton").click(function(){
                    $.post("./studentMarkDetails.php",$("#studentMarksForm").serialize(),function(data){
                        $("#studentmarkserror").html(data);
                        if(data==""){
                            $("#studentRegistrationForm").trigger("reset");
                            loadStudentMarks();
                        }
                    });
                });


                // validation section

                
                
                // student registration form validation

                $("#studentnamereg").keypress(function(){
                    var _val = $("#studentnamereg").val();
                    var _txt = _val.charAt(0).toUpperCase() + _val.slice(1);
                    $("#studentnamereg").val(_txt);
                });

                
                $("#fathernamereg").keypress(function(){
                    var _val = $("#fathernamereg").val();
                    var _txt = _val.charAt(0).toUpperCase() + _val.slice(1);
                    $("#fathernamereg").val(_txt);
                });

                
                $("#mothernamereg").keypress(function(){
                    var _val = $("#mothernamereg").val();
                    var _txt = _val.charAt(0).toUpperCase() + _val.slice(1);
                    $("#mothernamereg").val(_txt);
                });


                // mark calculation
                $("#total").click(function(){
                    mark1=parseFloat($("#Mark1").val());
                    mark2=parseFloat($("#Mark2").val());
                    mark3=parseFloat($("#Mark3").val());
                    mark4=parseFloat($("#Mark4").val());
                    mark5=parseFloat($("#Mark5").val());
                    total=mark1+mark2+mark3+mark4+mark5;
                    if(isNaN(total)){
                    $("#total").val("Absent");
                    }
                    else{
                        $("#total").val(total.toFixed(2));
                    }
                });


                // update the existing data
                 // on click on the row then edit the data
                //  user details table
                 $("#userDetailsTable").on('click','.value',function(){
		            var currentRow=$(this).closest("tr");
		            var userid=currentRow.find("td:eq(0)").html();
		            var username=currentRow.find("td:eq(1)").html();
		            var password=currentRow.find("td:eq(2)").html();
		            var usertype=currentRow.find("td:eq(3)").html();
                    $("#useridreg").val(userid);
                    $("#usernamereg").val(username);
                    $("#inputPasswordreg").val(password);
                    $("#usertype:select").val(usertype);
	            });


                // student details table
                 $("#studentDetailsTable").on('click','.value',function(){
		            var currentRow=$(this).closest("tr");
		            var studentid=currentRow.find("td:eq(0)").html();
		            var studentname=currentRow.find("td:eq(1)").html();
		            var fathername=currentRow.find("td:eq(2)").html();
		            var fathernumber=currentRow.find("td:eq(3)").html();
		            var mothername=currentRow.find("td:eq(4)").html();
		            var mothernumber=currentRow.find("td:eq(5)").html();
                    $("#studentidreg").val(studentid);
                    $("#studentnamereg").val(studentname);
                    $("#fatherreg").val(fathername);
                    $("#fathernumber").val(fathernumber);
                    $("#mothernamereg").val(mothername);
                    $("#mothernumber").val(mothernumber);
            });


                // student mark table
                 $("#studentMarkTable").on('click','.value',function(){
		            var currentRow=$(this).closest("tr");
		            var studentid=currentRow.find("td:eq(0)").html();
		            var mark1=currentRow.find("td:eq(2)").html();
		            var mark2=currentRow.find("td:eq(3)").html();
		            var mark3=currentRow.find("td:eq(4)").html();
		            var mark4=currentRow.find("td:eq(5)").html();
		            var mark5=currentRow.find("td:eq(6)").html();
		            var total=currentRow.find("td:eq(7)").html();
                    $("#studentidmark").val(studentid);
                    $("#Mark1").val(mark1);
                    $("#Mark2").val(mark2);
                    $("#Mark3").val(mark3);
                    $("#Mark4").val(mark4);
                    $("#Mark5").val(mark5);
                    $("#total").val(total);
            });


                // user student mark table
                 $("#userstudentMarkTable").on('click','.value',function(){
		            var currentRow=$(this).closest("tr");
		            var studentid=currentRow.find("td:eq(0)").html();
		            var mark1=currentRow.find("td:eq(1)").html();
		            var mark2=currentRow.find("td:eq(2)").html();
		            var mark3=currentRow.find("td:eq(3)").html();
		            var mark4=currentRow.find("td:eq(4)").html();
		            var mark5=currentRow.find("td:eq(5)").html();
		            var total=currentRow.find("td:eq(6)").html();
                    $("#userstudentidmark").val(studentid);
                    $("#userMark1").val(mark1);
                    $("#userMark2").val(mark2);
                    $("#userMark3").val(mark3);
                    $("#userMark4").val(mark4);
                    $("#userMark5").val(mark5);
                    $("#usertotal").val(total);
            });

        });

            // normal function 

            // load user details table
            function loadUserDetails(){
                $( "#userDetailsTable" ).load( "./userdetailstable.php");
            }
            // load Student details table
            function loadStudentDetails(){
                $( "#studentDetailsTable" ).load( "./studentdetailstable.php");
                $( "#userstudentDetailsTable" ).load( "./studentdetailstable.php");
            }
            // load student mark list
            function loadStudentMarks(){
                $( "#studentMarkTable" ).load( "./studentMarkList.php");
                // $( "#userstudentMarkTable" ).load( "./studentMarkList.php");
            }
            
        </script>
    </head>
    
    
    
    <!-- body content -->
    
    <body>
<!-- <p id="mainmsg"></p> -->
  


    <!-- Login form starts -->
    <div id="loginForm">
        <form class="loginForm">
            <h1>Login</h1>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">User id</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="userid" name="userid" placeholder="User Id" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            </div>
        </div>
        <p id="msg"></p>
        <!-- <button type="button" class="btn">Login</button> -->
        <button type="button" id="btn" class="btn btn-primary mb-3">Login</button>
        </form>
    </div>
    <!-- Login form ends -->





    <!-- admin dashboard starts -->
    <div id="adminContainer">

    <!-- admin header starts -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="../school form/asserts/infogreenlogo.svg" alt="" width="80" height="30" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" id="userRegistration" href="#">User Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="studentRegistration" href="#">Student Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="studentMarks" href="#">Student Marks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="adminlogout" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
    <!-- admin header ends -->



    


    <!-- user registration -->
    <div class="userRegistrationForm">
        <form id="userRegistrationForm">
            <h1>User Registration</h1>
        <div class="form-group row">
            <label for="inputuserid" class="col-sm-2 col-form-label" >User id</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="useridreg" name="userid" placeholder="User Id" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputusername" class="col-sm-2 col-form-label" >User Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="usernamereg" name="username" placeholder="User Name"  required>
            </div>
        </div>
        <div class="form-group row">
        <label for="inputusername" class="col-sm-2 col-form-label" >User Type</label>
        <select class="form-select" id="usertype" name="usertype" aria-label="Default select example">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPasswordreg" name="password" placeholder="Password" required>
            </div>
        </div>
        <p id="regerror"></p>
        <!-- <button type="button" class="btn">Login</button> -->
        <button type="button" id="userRegisterButton" class="btn btn-primary mb-3">Add User</button>
        </form>
        

        <!-- for the user details table content -->
        <h1>User Details</h1>
        <div id="userDetailsTable">
        
        </div>
        
        <!-- user details table content ends -->
    </div>




        <!-- Student registration starts -->

        <div class="studentRegistrationForm">
            <form id="studentRegistrationForm">
                <h1>Student Registration</h1>
                <div class="form-group row">
                    <label for="inputstudentid" class="col-sm-2 col-form-label" >Student id</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentidreg" name="studentid" placeholder="Student Id" maxlength="5" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Student Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentnamereg" name="studentname" placeholder="Student Name"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Father Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fathernamereg" name="fathername" placeholder="Father Name"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Father Number</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fathernumber" name="fathernumber" placeholder="Father Number" maxlength="10"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mother Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="mothernamereg" name="mothername" placeholder="Mother Name"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mother Number</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="mothernumber" name="mothernumber" placeholder="Mother Number" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Blood Group</label>
                <select class="form-select" name="bloodgroup" aria-label="Default select example">
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="O+">O+</option>
                    <option value="AB+">AB+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="O-">O-</option>
                    <option value="AB-">AB-</option>
                </select>
                </div>
                <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Class</label>
                <select class="form-select" name="class" aria-label="Default select example">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                </div>
                <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Section</label>
                <select class="form-select" name="section" aria-label="Default select example">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                </div>
                
                <p id="studentregistrationerror"></p>
                <!-- <button type="button" class="btn">Login</button> -->
                <button type="button" id="studentRegisterButton" class="btn btn-primary mb-3">Add Student</button>
            </form>
            
        <!-- for the user details table content -->
        <h1>Student Details</h1>
        <div id="studentDetailsTable">
        
        </div>
        
        <!-- user details table content ends -->

        </div>
        </div>


        <!-- Student registration ends -->


        <!-- Student Marks updation list starts -->

        <div class="studentMarks">

            <form id="studentMarksForm">
                <h1>Student Mark Updation</h1>
                <div class="form-group row">
                    <label for="inputstudentid" class="col-sm-2 col-form-label" >Student id</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentidmark" name="studentid" placeholder="Student Id" maxlength="5" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Semester</label>
                <select class="form-select" name="semester" aria-label="Default select example">
                    <option value="Odd">Odd</option>
                    <option value="Even">Even</option>
                </select>
                </div>
                
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 1</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mark1" name="Mark1" placeholder="Mark 1" maxlength="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 2</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mark2" name="Mark2" placeholder="Mark 2" maxlength="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 3</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mark3" name="Mark3" placeholder="Mark 3" maxlength="4"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 4</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mark4" name="Mark4" placeholder="Mark 4" maxlength="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 5</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="Mark5" name="Mark5" placeholder="Mark 5" maxlength="4" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputstudentname" class="col-sm-2 col-form-label" >Total</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="total" name="total" placeholder="Total" maxlength="3" required>
                    </div>
                </div>

                <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Grade</label>
                <select class="form-select" id="grade" name="grade" aria-label="Default select example">
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="F">F</option>
                    <option value="AB">AB</option>
                </select>
                </div>
                
                <!-- student mark php error -->
                <p id="studentmarkserror"></p>
                <!-- <button type="button" class="btn">Login</button> -->
                <button type="button" class="studentMarksButton" id="userstudentMarksButton" class="btn btn-primary mb-3">Add Student Marks</button>
            </form>
        
            <center><h2>Student Mark List</h2>
            <div id="studentMarkTable">
            </div></center>
        </div>
         <!-- Student Marks updation list ends -->
       


    <!-- admin dashboard ends -->
   
   
    <div id="userContainer">
        
      <!-- user header starts -->
      <nav class="navbar navbar-expand-lg navbar-primary bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="../school form/asserts/infogreenlogo.svg" alt="" width="80" height="30" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" id="studentDetails" href="#">Student Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="studentMark" href="#">Student Marks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="userlogout" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>

    
    <!-- user header ends -->


    
    <div class="userstudentMarks">

        <form id="studentMarksForm">
            <h1>Student Mark Updation</h1>
            <div class="form-group row">
                <label for="inputstudentid" class="col-sm-2 col-form-label" >Student id</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userstudentidmark" name="studentid" placeholder="Student Id" maxlength="5" required>
                </div>
            </div>
            <div class="form-group row">
            <label for="inputstudentname" class="col-sm-2 col-form-label" >Semester</label>
            <select class="form-select" name="semester" aria-label="Default select example">
                <option value="Odd">Odd</option>
                <option value="Even">Even</option>
            </select>
            </div>
            
            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 1</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userMark1" name="Mark1" placeholder="Mark 1" maxlength="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 2</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userMark2" name="Mark2" placeholder="Mark 2" maxlength="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 3</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userMark3" name="Mark3" placeholder="Mark 3" maxlength="4"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 4</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userMark4" name="Mark4" placeholder="Mark 4" maxlength="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Mark 5</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="userMark5" name="Mark5" placeholder="Mark 5" maxlength="4" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputstudentname" class="col-sm-2 col-form-label" >Total</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="usertotal" name="total" placeholder="Total" maxlength="3" required>
                </div>
            </div>

            <div class="form-group row">
            <label for="inputstudentname" class="col-sm-2 col-form-label" >Grade</label>
            <select class="form-select" id="grade" name="grade" aria-label="Default select example">
                <option value="A+">A+</option>
                <option value="A">A</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="F">F</option>
                <option value="AB">AB</option>
            </select>
            </div>
            
            <!-- student mark php error -->
            <p id="studentmarkserror"></p>
            <!-- <button type="button" class="btn">Login</button> -->
            <button type="button" class="studentMarksButton" id="studentMarksButton" class="btn btn-primary mb-3">Add Student Marks</button>
        </form>

        <center><h2>Student Mark List</h2>
        <div id="userstudentMarkTable">
        </div></center>    
    </div>
        </div>
        <div id="userstudentDetailsTable">

        </div>
    </div>
    </body>
</html>