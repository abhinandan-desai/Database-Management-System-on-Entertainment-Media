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
                <th scope="col">Movie Name</th>
                <th scope="col">Release Year</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'validation.php';

            if(isset($_GET["data"])){
                $name = $_GET["data"];
            }

            echo "Movies by $name";
            $q = "Select person_id from person where primary_name = '$name' group by primary_name;";

            $result1 = $conn->query($q);

            if($result1->num_rows > 0){
                while($row = $result1->fetch_assoc()){
                    $r = $row["person_id"];
                }
            }

            $query = "Select T.title_name, M.releaseYear from title as T, movie as M where T.title_id in 
            (Select F.title_id from isPartOf as F where F.person_id = '$r') and T.title_id = M.title_id;";

            
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    

                    echo '<tr>
                            <td><a href="./details.php?data1='.$row["releaseYear"].'&data2='.$row["title_name"].' ">' .$row["title_name"]. '</a></td>
                            <td>'.$row["releaseYear"].'</td>
                            </tr>';
                }
            }else{
                echo "0 results";
            }
            $conn->close();
        ?>

        </tbody>

    </div>
</table>
</div>
</html>
    
