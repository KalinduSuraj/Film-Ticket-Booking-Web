<?php
class Movie
{
    //*--------------------------------------------------------|DONE|-------------------------------------------------------------
    private $db;
    public function __construct()
    {
        $this->db = new DBConnection();
        $this->db->connect();
    }
    //methods
    public function AddMovie($name, $releaseYear, $description, $language, $ticketPrice, $genre, $posterImg, $tempPosterImg, $bannerImg, $tempBannerImg)
    {

        try {
            $q1 = "SELECT MAX(F_Id) from film";
            $r = mysqli_query($this->db->getConnection(), $q1);
            if ($row = mysqli_fetch_array($r)) {
                $maxId = $row[0];
                $numericPart = intval(substr($maxId, 1));
                $newNumericPart = $numericPart + 1;

                $filmId = 'F' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
            } else {
                $filmId = 'F001';
            }
            $queary = "insert into film(F_Id,Name,Relese_Year,Description,Language,Ticket_Price,poster,banner,Genre)
                        values('$filmId','$name','$releaseYear','$description','$language','$ticketPrice','$posterImg','$bannerImg','$genre');";

            $result = mysqli_query($this->db->getConnection(), $queary);

            if ($result) {
                $posterPath = "posterImg/" . $posterImg;
                $bannerPath = "bannerImg/" . $bannerImg;
                if (move_uploaded_file($tempPosterImg, $posterPath) && move_uploaded_file($tempBannerImg, $bannerPath)) {
                    echo "<script> console.log('Added'); </script>";
                } else {
                    echo "Failed to upload image!";
                }
            } else {
                echo "<script> console.log('not Added'); </script>";
            }
            return true;
        } catch (exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        } finally {
            $this->db->disconnect();
        }
    }
    public function EditMovie($filmId, $name, $releaseYear, $description, $language, $ticketPrice, $genre, $posterImg, $tempPosterImg, $bannerImg, $tempBannerImg)
    {
        try {
            // Check if the movie exists
            $checkQuery = "SELECT F_Id FROM film WHERE F_Id = '$filmId';";
            $checkResult = mysqli_query($this->db->getConnection(), $checkQuery);

            if (mysqli_num_rows($checkResult) == 1) {
                // Movie exists, proceed with update

                // Update query
                $updateQuery = "UPDATE film SET Name = '$name', Relese_Year = '$releaseYear', Description = '$description',
                                Language = '$language', Ticket_Price = '$ticketPrice', poster = '$posterImg', banner = '$bannerImg',
                                Genre = '$genre' WHERE F_Id = '$filmId';";

                $updateResult = mysqli_query($this->db->getConnection(), $updateQuery);

                if ($updateResult) {
                    // Successfully updated
                    $posterPath = "posterImg/" . $posterImg;
                    $bannerPath = "bannerImg/" . $bannerImg;

                    // Move uploaded images to destination folders
                    if (move_uploaded_file($tempPosterImg, $posterPath) && move_uploaded_file($tempBannerImg, $bannerPath)) {
                        echo "<script> console.log('Movie updated'); </script>";
                        return true;
                    } else {
                        echo "Failed to upload images!";
                        return false;
                    }
                } else {
                    // Update failed
                    echo "<script> console.log('Failed to update movie'); </script>";
                    return false;
                }
            } else {
                // Movie does not exist
                echo "<script> console.log('Movie with ID $filmId does not exist'); </script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        } finally {
            $this->db->disconnect(); // Ensure database connection is closed
        }
    }
    public function RemoveMovie($filmId)
    {
        try {
            $q = "select F_Id from film where F_Id = '$filmId';";
            $res = mysqli_query($this->db->getConnection(), $q);

            if (mysqli_num_rows($res) == 1) {

                $queary = "delete from film where F_Id='$filmId';";

                $result = mysqli_query($this->db->getConnection(), $queary);

                if ($result) {
                    echo "<script> console.log('Deleted '); </script>";
                } else {
                    echo "<script> console.log('not Deleted'); </script>";
                }
                return true;
            } else {
                echo "<script> console.log('There is no Film in that $filmId'); </script>";
                return false;
            }
        } catch (exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        } finally {
            $this->db->disconnect();
        }
    }

    public function ViewMovieForIndex()
    {
        try {
            $queary = "Select Name,poster,F_Id from film ";
            $result = mysqli_query($this->db->getConnection(), $queary);

            $output = '<div class="row">';

            while ($row = mysqli_fetch_array($result)) {
                $output .= '<div class=" col-sm-6 col-md-3 col-lg-3">';
                $output .= '<a href="filmInterface.php?F_Id=' . $row[2] . '">';
                $output .= '<div class="card-flyer">';
                $output .= '<div class="text-box">';
                $output .= '<div class="image-box">';
                $output .= "<img src='../FrontEnd/posterImg/" . $row[1] . "'/>";
                $output .= '</div>';
                $output .= '<div class="text-container">';
                $output .= '<h6>' . $row[0] . '</h6>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</a>';
                $output .= '</div>';
            }
            $output .= '</div>';
            return $output;
        } catch (exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        } finally {
            $this->db->disconnect();
        }
    }
    public function ViewMovieForFilmInterface($F_Id)
    {
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

    public function ViewMovieForRemoveEditPage()
    {
        try {
            $queary = "Select F_Id,Name,Relese_Year,Language from film ";
            $result = mysqli_query($this->db->getConnection(), $queary);
            $output = ""; // Initialize $output as an empty string
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr id='row-{$row['F_Id']}'>";
                $output .= "  <td>" . $row['F_Id'] . "</td>";
                $output .= "  <td>" . $row['Name'] . "</td>";
                $output .= "  <td>" . $row['Relese_Year'] . "</td>";
                $output .= "  <td>" . $row['Language'] . "</td>";
                $output .= "<td><button data-number='filmId' class='rounded' style='background-color: red;border:none; color: white;text-decoration:none;' name='Edit' value='Edit' href='#' onclick='editMovie(\"" . $row['F_Id'] . "\")'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/>
                                    </svg>
                                </button>
                                <button data-number='filmId' class='rounded' style='background-color: red;border:none; color: white;text-decoration:none;' name='Remove' value='Remove' href='#' onclick='removeMovie(\"" . $row['F_Id'] . "\")'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                    </svg>
                              </button>
                                
                            </td>";

                $output .= "</tr>";
            }
            return $output;
        } catch (exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </>";
            return null;
        } finally {
            $this->db->disconnect();
        }
    }
}
