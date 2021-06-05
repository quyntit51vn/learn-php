
<?php 
session_start(); 
include_once "../Model/Student.php";
include_once "../Model/Class.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php try { ?>
        
    <?php $list_student = isset($_SESSION['list_student'])?$_SESSION['list_student']:[]; ?>
    <?php $list_class = isset($_SESSION['list_class'])?$_SESSION['list_class']:[]; 
        ?>
    <div class="container mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#student">
            Add Student
        </button>
        <!-- Modal -->
        <div class="modal fade" id="student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="studentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form method="POST" action="../Handle/add-student.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Major</label>
                            <input type="text" class="form-control" name="major">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">age</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#class">
            Add class
        </button>
        <!-- Modal -->
        <div class="modal fade" id="class" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="classLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form method="POST" action="../Handle/add-class.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="classLabel">Add Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h1>List student</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Major</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_student as $student){ 
                            $student = unserialize( $student);
                            $info_student = $student->getInfo();
                            
                        ?>
                        <tr>
                            <th scope="row"><?=$info_student['id']?></th>
                            <td><?=$info_student['name']?></td>
                            <td><?=$info_student['major']?></td>
                            <td><?=$info_student['age']?></td>
                            <td>
                            <a href="./join-class.php?id=<?=$info_student['id']?>">
                                <button class="btn btn-primary">join class</button>
                            </a>
                                <a href="./detail-student.php?id=<?=$info_student['id']?>">
                                <button class="btn btn-info">detail</button>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>
            </div>
                            
            <div class="col-6">
                <h1>List class</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_class as $class){ 
                            $class = unserialize($class);
                            $info_class = $class->getInfo();
                        ?>
                        <tr>
                            <th scope="row"><?=$info_class['id']?></th>
                            <td><?=$info_class['name']?></td>
                            <td><?=$info_class['subject']?></td>
                            <td>
                                <a href="./detail-class.php?id=<?=$info_class['id']?>">
                                    <button class="btn btn-info">detail</button>
                                    </a>
                            </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
        //code...
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
        echo "</br>-------------";
        echo "</br>Line: ".$th->getLine();
        echo "</br>Line: ".$th->getMessage();
        } 
        ?>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>


