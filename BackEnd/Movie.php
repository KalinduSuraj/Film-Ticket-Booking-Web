<?php
    class Movie {

        private $db;
        public function __construct(){
            $this->db = new DBConnection();
            $this->db->connect();
        }
        //methods
        public function AddMovie($filmId,$name,$releaseYear,$description,$language,$ticketPrice,$posterImg,$tempPosterImg,$bannerImg,$tempBannerImg){

            try{
                $q = "select F_Id from film where F_Id = '$filmId';";
                $res = mysqli_query($this->db->getConnection(),$q);

                if (!(mysqli_num_rows($res) == 1)) {

                    $queary = "insert into film(F_Id,Name,Release_Year,Description,Language,Ticket_Price)
                            values('$filmId','$name','$releaseYear','$description','$language','$ticketPrice','$posterImg','$bannerImg);";

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
                else {
                    echo "<script> console.log('Already have a Movie in this $filmId Id!!'); </script>"; 
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
                $queary = "Select Name,poster from film ";
                $result = mysqli_query($this->db->getConnection(),$queary);

                $output = '<div class="row">';
                while($row = mysqli_fetch_array($result)){

                   $output .= '<div class=" col-sm-6 col-md-3 col-lg-3">';
                   $output .=     '<a href="filmInterface.php">';
                   $output .=         '<div class="card-flyer">';
                   $output .=             '<div class="text-box">';
                   $output .=                '<div class="image-box">';
                   $output .=                     "<img src='src/".$row['poster']."'/>";
                   $output .=                 '</div>';
                   $output .=                 '<div class="text-container">';
                   $output .=                     '<h6>'.$row['Name'].'</h6>';
                   $output .=                 '</div>';
                   $output .=             '</div>';
                   $output .=         '</div>';
                   $output .=     '</a>';
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
        public function ViewMovieForFilmInterface(){}

    }
?>