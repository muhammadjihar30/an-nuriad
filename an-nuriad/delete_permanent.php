<?php
include 'koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $id = intval($id); 


    $sqlDelete = "DELETE FROM pendaftaran_siswa  WHERE id = ?";

   
    if ($stmt = $conn->prepare($sqlDelete)) {
        $stmt->bind_param("i", $id); 
        if ($stmt->execute()) {
          
            $resetQuery = "
                SET @count = 0;
                UPDATE pendaftaran_siswa SET id = (@count := @count + 1);
                ALTER TABLE pendaftaran_siswa AUTO_INCREMENT = 1;
            ";

         
            if ($conn->multi_query($resetQuery)) {
                
                header('Location: sampah.php');
                exit();
            } else {
                echo "Error resetting IDs: " . $conn->error;
            }
        } else {
            echo "Error executing delete statement: " . $stmt->error;
        }
    } else {
       
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan!";
}
