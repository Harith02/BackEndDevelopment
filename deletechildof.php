<!DOCTYPE html>
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
    <main>
        <div class="student">
            <h2>DELETE STUDENT & PARENT</h2>
            <form method="post" action="deletechildof.php" id="form2">
                <div class="input_field">
                    <label>No.</label>
                    <input type="text" name="id" class="details" required>
                </div>
                <div class="input_field">
                    <input type="submit" name="submit" class="submit" value="Delete">
                </div>  
            </form>
        </div>

        <?php
        $link = mysqli_connect("localhost", "root", "", "raps");
        // Check connection
        if ($link === false) {
            die("Connection failed: ");
        }

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            
            $sql = " DELETE FROM childof WHERE relation = '$id'";

            if (mysqli_query($link, $sql)) {
                echo "Record deleted successfully";
                } else {
                echo "Error deleting record ";
                }
        }
        ?>
    </main>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>