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
                <th scope="col">Rating</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'validation.php';

            $genre = $_POST["Genre"];
            $year = $_POST["Year"];
            $ratings = $_POST["ratings"];

            echo "$genre in $year";
            if($ratings == 'less than 3'){
                $avg_rating = 'T.average_rating between 0 and 2';
            }else if($ratings == '3 - 4'){
                $avg_rating = 'T.average_rating between 3 and 4';
            }else if($ratings == '5 - 7'){
                $avg_rating = 'T.average_rating between 5 and 7';
            }else{
                $avg_rating = 'T.average_rating between 7 and 10';
            }

            $query = "Select T.title_name, T.average_rating from title as T where T.title_id in (Select M.title_id from movie as M where releaseYear = '$year' and 
            M.title_id in (Select G.title_id from genre as G where genre = '$genre')) and $avg_rating limit 1000";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  

                    echo '<tr>
                            <td><a href="./details.php?data1='.$year.'&data2='.$row["title_name"].' ">' .$row["title_name"]. '</a></td>
                            <td>' .$row["average_rating"]. '</td>
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
    
