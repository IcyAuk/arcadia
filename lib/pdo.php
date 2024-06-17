<?php

//do not forget to include config.php wherever you include pdo.php

//data source name
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

$options =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false, //let the database prepare the query
    ];


try {
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
} catch (PDOException $e) {
    die("PDO.PHP -> error" . $e->getMessage());
}

// BELOW ARE FUNCTIONS USED BY MACHINE
// BELOW ARE FUNCTIONS USED BY MACHINE
// BELOW ARE FUNCTIONS USED BY MACHINE

// simple echo
function PDOEcho(){
    echo "ECHO PDO";
}

//sanitize
function sanitizeInput($input) {
    $input = trim($input); // remove whe space
    $input = stripslashes($input); // remove backslashes
    $input = htmlspecialchars($input); // convert special characters to HTML entities
    return $input;
}

//create staff
function createStaff(PDO $pdo, string $name, string $email, string $password, string $role)
{
    
        $email = sanitizeInput($email);
        $name = sanitizeInput($name);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        if($role !== 'mod' && $role !== 'vet'){ //render inspect element USELESS
            die("Only Machine and Root can create an Admin");
        }

        $stmt = $pdo->prepare('INSERT INTO staff (name, email, password, role)
                                VALUES (:name, :email, :password, :role)
                            ');

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        
        try{
            $stmt->execute();
        }
        catch(PDOException $e) {
            $e->getMEssage();
        }
    
        $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
} 

function deleteStaff(PDO $pdo, int $deleteId)
{
    try
    {
        $stmt = $pdo->prepare('DELETE FROM staff WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();
        
        $currentUrl = strtok($_SERVER["REQUEST_URI"],'?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    }
    catch (PDOException $e)
    {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}