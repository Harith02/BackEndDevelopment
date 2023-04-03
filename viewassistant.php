<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Teaching Assistant</title>
</head>
<body class="body">
    <div class="navtop justify-content-center">
        <div class="logo">
            <a href="index.html">
            <img src="images/RAPS.png" alt="Logo" width="180" class="d-inline-block align-text-top">
            </a>
        </div>
        <div class="schoolname">
            <h1>RISHTON ACADEMY PRIMARY SCHOOL</h1>
        </div>
    </div>
            <nav class="navbar navbar-expand-sm ">
                <div class="container justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" id="link"aria-current="page" href="index.html">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Student
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addstudent.php">Add A Student</a></li>
                                <li><a class="dropdown-item" href="viewstudent.php">View Students</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Parent/Guardian
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addparent.php">Add A Parent/Guardian</a></li>
                                <li><a class="dropdown-item" href="viewparent.php">View Parents/Guardians</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Student&Parent
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addchildof.php">Student & Parent Relationship</a></li>
                                <li><a class="dropdown-item" href="viewchildof.php">View Student & Parent Relationship</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Class
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addclass.php">Add A Class</a></li>
                                <li><a class="dropdown-item" href="viewclass.php">View Classes</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Teacher
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addteacher.php">Add A Teacher</a></li>
                                <li><a class="dropdown-item" href="viewteacher.php">View Teachers</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Teaching Assistant
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addassistant.php">Add A Teaching Assistant</a></li>
                                <li><a class="dropdown-item" href="viewassistant.php">View Teaching Assistant</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <style>
        .container2{
            justify-content:center;
            align-items: center;
            background-color: aliceblue;
            max-width: 100%;
            width: 100%;
            background: aliceblue;
            margin: 20px auto;
            padding: 30px;
            box-shadow: 0px 0px 10px black;
        }

        table{
            text-align:center;
        }

        .view{
            text-align:center;
            margin-bottom:20px ;
            color:#273755;
        }

        .makeupdate{
            text-align:right;
        }

        .update{
            color:#273755;
            text-decoration:none;
        }

        .update:hover{
            color: #BC9C22;
        }
    </style>

    <main>
    <?php
        $link = mysqli_connect("localhost", "root", "", "raps");
        // Check connection
        if ($link === false) {
            die("Connection failed: ");
        }
    ?>

    <div class="container2">
        <div class="view">
            <h2>TEACHING ASSISTANT RECORD</h2>
        </div>
        <div class="content">
                <table> 
                    <tr>
                        <th width="150px">Assistant ID<br><hr></th>
                        <th width="250px">First Name<br><hr></th>
                        <th width="250px">Last Name<br><hr></th>
                        <th width="350px">Address<br><hr></th>
                        <th width="250px">Phone Number<br><hr></th>
                        <th width="150px">Email<br><hr></th>
                        <th width="150px">Teacher ID<br><hr></th>
                        <th width="250px">Teacher Name<br><hr></th>
                    </tr>
                        
                    <?php    
                        $sql = mysqli_query($link, "SELECT a.teachasst_id, a.firstname, a.surname, a.Aaddress, a.phone_number, 
                        a.email, a.teacher_id, t.firstname AS teacher_name 
                        FROM assistant a
                        INNER JOIN teachers t ON a.teacher_id = t.teacher_id
                        ORDER BY teachasst_id ASC;");
                        while ($row = $sql->fetch_assoc()){
                        echo "
                            <tr>
                                <th>{$row['teachasst_id']}</th>
                                <th>{$row['firstname']}</th>
                                <th>{$row['surname']}</th>
                                <th>{$row['Aaddress']}</th>
                                <th>{$row['phone_number']}</th>
                                <th>{$row['email']}</th>
                                <th>{$row['teacher_id']}</th>
                                <th>{$row['teacher_name']}</th>
                            </tr>";
                        }
                    ?>
                </table>
        </div>
        <br>
        <div class="makeupdate">
            <a class="update" href="updateassistant.php">Update Teaching Assistant Record</a>
            <label>/</label>
            <a class="update" href="deleteassistant.php">Delete Teaching Assistant Record</a>
        </div>
    </div>
    </main>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
