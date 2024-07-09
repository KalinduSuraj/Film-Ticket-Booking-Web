<?php
    class Movie {
        //*--------------------------------------------------------|DONE|-------------------------------------------------------------
        private $db;
        public function __construct(){
            $this->db = new DBConnection();
            $this->db->connect();
        }
        //methods
        public function AddMovie($name,$releaseYear,$description,$language,$ticketPrice,$genre,$posterImg,$tempPosterImg,$bannerImg,$tempBannerImg){

            try{
                $q1 = "SELECT MAX(F_Id) from film";
                $r = mysqli_query($this->db->getConnection(),$q1);
                if ($row = mysqli_fetch_array($r)) {
                $maxId = $row[0];
                $numericPart = intval(substr($maxId, 1));
                $newNumericPart = $numericPart + 1;
                
                $filmId = 'F' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                } 
                else
                {
                $filmId = 'F001';
                }
                $queary = "insert into film(F_Id,Name,Relese_Year,Description,Language,Ticket_Price,poster,banner,Genre)
                        values('$filmId','$name','$releaseYear','$description','$language','$ticketPrice','$posterImg','$bannerImg','$genre');";

                $result = mysqli_query($this->db->getConnection(),$queary);

                if($result){
                    $posterPath = "posterImg/".$posterImg;
                    $bannerPath = "bannerImg/".$bannerImg;
                    if(move_uploaded_file($tempPosterImg,$posterPath) && move_uploaded_file($tempBannerImg,$bannerPath)){
                        echo "<script> console.log('Added'); </script>"; 
                    }
                    else{
                        echo "Failed to upload image!";
                    }
                }
                else{
                    echo "<script> console.log('not Added'); </script>"; 
                }
                return true;
            }
            catch(exception $e){
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;
            } 
            finally{
                $this->db->disconnect();
            }
        }
        public function RemoveMovie($filmId){

            try{
                $q = "select F_Id from film where F_Id = '$filmId';";
                $res = mysqli_query($this->db->getConnection(),$q);

                if (mysqli_num_rows($res) == 1) {

                    $queary = "delete from film where F_Id='$filmId';";

                    $result = mysqli_query($this->db->getConnection(),$queary);

                    if($result){
                        echo "<script> console.log('Deleted '); </script>"; 
                    }
                    else{
                        echo "<script> console.log('not Deleted'); </script>"; 
                    }
                    return true;
                } 
                else {
                    echo "<script> console.log('There is no Film in that $filmId'); </script>"; 
                    return false;
                } 
            }
            catch(exception $e){
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;
            } 
            finally{
                $this->db->disconnect();
            }
        }
        public function ViewMovieForIndex(){
            try{
                $queary = "Select Name,poster,F_Id from film ";
                $result = mysqli_query($this->db->getConnection(),$queary);

                $output = '<div class="row">';

                while($row = mysqli_fetch_array($result)){
                   $output .= '<div class=" col-sm-6 col-md-3 col-lg-3">';
                   $output .= '<a href="filmInterface.php?F_Id=' . $row[2] . '">';
                   $output .= '<div class="card-flyer">';
                   $output .= '<div class="text-box">';
                   $output .= '<div class="image-box">';
                   $output .= "<img src='../FrontEnd/posterImg/".$row[1]."'/>";
                   $output .= '</div>';
                   $output .= '<div class="text-container">';
                   $output .= '<h6>'.$row[0].'</h6>';
                   $output .= '</div>';
                   $output .= '</div>';
                   $output .= '</div>';
                   $output .= '</a>';
                   $output .= '</div>';
                } 
                $output .= '</div>';                
                return $output;
            }
            catch(exception $e){
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;
            } 
            finally{
                $this->db->disconnect();
            }
        }
        public function ViewMovieForFilmInterface($F_Id){
            try {
                $query = "SELECT * FROM film WHERE F_Id ='$F_Id'";
                $result = mysqli_query($this->db->getConnection(), $query);
        
                if (!$result) {
                    throw new Exception("Database Query Failed");
                }
        
                $row = mysqli_fetch_array($result);
                if (!$row) {
                    throw new Exception("No data found for F_Id: $F_Id");
                }
                
                return $row;
            } catch (Exception $e) {
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;
            } finally {
                $this->db->disconnect();
            }
        }
        

        public function ViewMovieForRemovePage(){
            try{
                $queary = "Select F_Id,Name,Relese_Year,Language from film ";
                $result = mysqli_query($this->db->getConnection(),$queary);
                $output = ""; // Initialize $output as an empty string
                while($row = mysqli_fetch_assoc($result)){
                    $output .= "<tr id='row-{$row['F_Id']}'>";
                    $output .= "  <td>". $row['F_Id']."</td>";
                    $output .= "  <td>". $row['Name']."</td>";
                    $output .= "  <td>". $row['Relese_Year']."</td>";
                    $output .= "  <td>". $row['Language']."</td>";
                    $output .= "<td><button data-number='filmId' class='rounded' style='background-color: red;border:none; color: white;text-decoration:none;' name='Remove' value='Remove' href='#' onclick='removeMovie(\"" . $row['F_Id'] . "\")'>Remove</button></td>";

                    $output .= "</tr>";
                }
                return $output;
            }
            catch(exception $e){
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </>";
                return null;
            } 
            finally{
                $this->db->disconnect();
            }
        }

    }
?>