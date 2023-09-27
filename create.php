<?php
require_once 'connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ime = $data['ime'];
    $prezime = $data['prezime'];
    $ocena = $data['ocena'];

    $q = "INSERT INTO `studenti` (`ime`, `prezime`, `ocena`) VALUES
        ('" . $ime . "', '" . $prezime . "', '" . $ocena . "');";        
        
        $r = $conn->execute_query($q);
        if ($r) 
        {
            $response =
                [
                'id' => mysqli_insert_id($conn),
                'ime' => $ime,
                'prezime' => $prezime,
                'ocena' => $ocena
                ];
            
                echo json_encode($response);
            
        } 
        else 
        {
            //doslo je do greske
            echo json_encode(['error' => 'Doslo je do greske.']);
        }
}