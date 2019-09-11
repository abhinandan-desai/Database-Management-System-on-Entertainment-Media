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
                <th scope="col">Name of the Artist</th>
                <th scope="col">Birth Year</th>
            </tr>
        </thead>
        <tbody>
        
        <?php include 'validation.php';

            $person = $_POST["Enter"];



            $query = "Select primary_name, birthYear from person where primary_name = '$person' group by primary_name";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                echo '<tr>
                            <td>' .$row["primary_name"]. '</td>
                            <td>'.$row["birthYear"].'</td>
                            </tr>';

                }
            }

        ?>



        </tbody>
        
        <thead>
            <tr>
                <th scope="col">Primary Profession</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        
        <?php include 'validation.php';

            $person = $_POST["Enter"];



            $query = "Select P.profession from primaryprofession as P where P.person_id = 
            (Select T.person_id from person as T where 
            T.primary_name = '$person' group by T.primary_name);";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr>
                            <td>' .$row["profession"]. '</td>
                            </tr>';

                }
            }


            $conn->close();


        ?>



        </tbody>

        <thead>
            <tr>
                <th scope="col">Known For Movies</th>
                <th scope="col">Release Year</th>
            </tr>
        </thead>
        <tbody>
        
        <?php include 'validation.php';

            $person = $_POST["Enter"];



            $query = "Select T.title_name, M.releaseYear from movie as M, title as T where M.title_id in 
            (Select title_id from knownForTitles where person_id = 
            (Select person_id from person where primary_name = '$person' group by primary_name)) 
            and T.title_id = M.title_id;";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr>
                            <td><a href="./details.php?data1='.$row["releaseYear"].'&data2='.$row["title_name"].' ">' .$row["title_name"]. '</td>
                            <td>'.$row["releaseYear"].'</td>
                            </tr>';

                }
            }

        ?>



        </tbody>



    </div>
</table>
</div>
</html>
    

