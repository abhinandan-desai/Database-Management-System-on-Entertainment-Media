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
                <th scope="col">Season</th>
                <th scope="col">No. of Episodes</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'validation.php';

            $tvseries = $_POST["TVseries"];
            
            echo $tvseries;
            $query = "Select season_number, count(episode_number) from episodes where episode_id in 
            (Select distinct(episode_id) from has_episode where title_id = 
            (Select title_id from title where title_name like '$tvseries' and type = 'tvSeries' group by type)) 
            group by season_number order by season_number, episode_number;";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    

                    echo '<tr>
                            <td>' .$row["season_number"]. '</td>
                            <td>' .$row["count(episode_number)"]. '</td>
                            </tr>';
                }
            }else{
                echo '<tr>
                        <td>' ."No records". '</td>
                        <td>' ."No records". '</td>
                        </tr>';
            }
            $conn->close();
        ?>

        </tbody>

    </div>
</table>
</div>
</html>
    
