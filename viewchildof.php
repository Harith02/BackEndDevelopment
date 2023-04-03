<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Class</title>
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
    </div>  

    <style>
        .container2{
            justify-content:center;
            align-items: center;
            background-color: aliceblue;
            max-width: 1000px;
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
            <h2>STUDENT & PARENT</h2>
        </div>
        <div class="content">
                <table> 
                    <tr>
                        <th width="50px">No.<br><hr></th> 
                        <th width="150px">Student ID<br><hr></th>
                        <th width="250px">Student Name<br><hr></th>
                        <th width="250px">Year of Study<br><hr></th>
                        <th width="150px">Parent ID<br><hr></th>
                        <th width="250px">Parent Name<br><hr></th>
                        <th width="250px">Family Name<br><hr></th>
                    </tr>
                        
                    <?php                            
                        $sql = mysqli_query($link, "SELECT childof.relation AS relation, childof.pupil_id, pupils.firstname AS student_firstname, 
                        childof.parent_id, parents.firstname AS parent_firstname, parents.surname AS parent_surname, childof.pupil_id, pupils.class_id,
                         classes.class_name AS year_of_study 
                        FROM childof 
                        INNER JOIN pupils ON childof.pupil_id = pupils.pupil_id 
                        INNER JOIN parents ON childof.parent_id = parents.parent_id
                        INNER JOIN classes ON pupils.class_id = classes.class_id");
                        while ($row = $sql->fetch_assoc()){
                            echo "
                                <tr>
                                    <th>{$row['relation']}</th>
                                    <th>{$row['pupil_id']}</th>
                                    <th>{$row['student_firstname']}</th>
                                    <th>{$row['year_of_study']}</th>
                                    <th>{$row['parent_id']}</th>
                                    <th>{$row['parent_firstname']}</th>
                                    <th>{$row['parent_surname']}</th>

                                </tr>";
                        }
                    ?>

                </table>
        </div>
        <br>
        <div class="makeupdate">
            <a class="update" href="updatechildof.php">Update Relation Record</a>
            <label>/</label>
            <a class="update" href="deletechildof.php">Delete Relation Record</a>
        </div>
    </div>
    
    </main>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>