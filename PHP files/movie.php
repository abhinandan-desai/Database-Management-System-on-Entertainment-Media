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
                <th scope="col">Genre</th>
                <th scope="col">Ratings</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'validation.php';

            $movie = $_POST["Title"];

            $query = "Select T.title_name, M.releaseYear, G.genre, T.average_rating from title as T, Movie as M, Genre as G where 
            T.title_name = '$movie' and M.title_id = T.title_id and 
            G.title_id = T.title_id group by T.title_name;";

            
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   

                    echo '<tr>
                            <td><a href="./details.php?data1='.$row["releaseYear"].'&data2='.$row["title_name"].'">' .$row["title_name"]. '</a></td>
                            <td>'.$row["releaseYear"].'</td>
                            <td>'.$row["genre"].'</td>
                            <td>'.$row["average_rating"].'</td>
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
    
