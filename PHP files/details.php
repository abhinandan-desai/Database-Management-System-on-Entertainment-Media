<!DOCTYPE html>
<html>
<head>
<title>LIST OF MOVIES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<div class="container">
<table class="table table-striped">
    <div class="table responsive">
        <thead>
            <tr>
                <th scope="row">Directors</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'validation.php';

            if(isset($_GET["data1"]) && isset($_GET["data2"])){
                $data1 = $_GET["data1"];
                $data2 = $_GET["data2"];
            }

            
            echo "$data2($data1)";
            
            $query = "Select P.primary_name from person as P where P.person_id in (Select distinct(director) from
            directors where title_id in (Select T.title_id from Title as T where 
            T.title_name = '$data2' and T.title_id in (Select title_id from movie where releaseYear = $data1)));";

            

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td><a href="./WorkByPerson.php?data='.$row["primary_name"].' ">'.$row["primary_name"]. '</a></td>
                            </tr>';
                 

                }
            }

        ?>

        </tbody>

        <thead>
            <tr>
                <th scope="row">Writers</th>
            </tr>
        </thead>
        <tbody>
        <?php

            if(isset($_GET["data1"]) && isset($_GET["data2"])){
                $data1 = $_GET["data1"];
                $data2 = $_GET["data2"];
            }

            
            $query = "Select P.primary_name from person as P where P.person_id in (Select distinct(writer) from
            writer where title_id in (Select T.title_id from Title as T where 
            T.title_name = '$data2' and T.title_id in (Select title_id from movie where releaseYear = $data1)));";

            

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td><a href="./WorkByPerson.php?data='.$row["primary_name"].' ">'.$row["primary_name"]. '</a></td>
                            </tr>';
                 

                }
            }

        ?>

        </tbody>

        <thead>
            <tr>
                <th scope="row">Cast</th>
            </tr>
        </thead>
        <tbody>
        <?php

            if(isset($_GET["data1"]) && isset($_GET["data2"])){
                $data1 = $_GET["data1"];
                $data2 = $_GET["data2"];
            }

            
            $query = "Select title_id from title where title_id in (Select title_id 
            from movie where releaseYear = $data1) and title_name = '$data2';";

            $result1 = $conn->query($query);

            if($result1->num_rows > 0){
                while($row = $result1->fetch_assoc()){
                    $r = $row["title_id"];
                }
            }

            

            $q2 = "Select primary_name from person where person_id in (Select person_id
             from isPartOf where title_id = '$r' and job like '%act%');";

            

            $result = $conn->query($q2);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td><a href="./WorkByPerson.php?data='.$row["primary_name"].' ">'.$row["primary_name"]. '</a></td>
                            </tr>';
                 

                }
            }

            $conn->close();
        ?>

        </tbody>




    </div>
</table>
</div>
</html>
    




