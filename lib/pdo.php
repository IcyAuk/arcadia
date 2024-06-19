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
function PDOEcho()
{
    echo "ECHO PDO";
}

//sanitize - you can't trust the user
function sanitizeInput($input)
{
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

    if ($role !== 'mod' && $role !== 'vet') { //render inspect element USELESS
        die("Only Machine and Root can create an Admin");
    }

    $stmt = $pdo->prepare('INSERT INTO staff (name, email, password, role)
                                VALUES (:name, :email, :password, :role)
                            ');

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMEssage();
    }

    $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
}

//DELETE
function deleteStaff(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM staff WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}

function deleteService(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM services WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}

function deleteHabitat(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM habitats WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}

function deleteAnimal(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM animals WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}

function deleteDietLog(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM AnimalDietLog WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}

function deleteVetLog(PDO $pdo, int $deleteId)
{
    try {
        $stmt = $pdo->prepare('DELETE FROM AnimalVetLog WHERE id = :id');
        $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
        $stmt->execute();

        $currentUrl = strtok($_SERVER["REQUEST_URI"], '?'); //REMOVE GET FROM URL
        header('Location: ' . $currentUrl);
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        die();
    }
}


//image handler
function imageHandler(PDO $pdo, $image)
{
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "../uploads/";
        $imageName = uniqid() . '_' . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        return $targetFile;
    } else {
        echo "img err";
    }
}

//create service
function createService(PDO $pdo, string $title, string $description, $image)
{
    $title = sanitizeInput($title);
    $description = htmlspecialchars($description);
    $description = stripslashes($description);
    $imagePath = imageHandler($pdo, $image);

    $stmt = $pdo->prepare('INSERT INTO services (title, description, imagePath)
                                VALUES (:title, :description, :imagePath)
                            ');

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':imagePath', $imagePath);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }

    $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
}

function createHabitat(PDO $pdo, string $name, string $description, $image)
{
    $name = sanitizeInput($name);
    $description = htmlspecialchars($description);
    $description = stripslashes($description);
    $imagePath = imageHandler($pdo, $image);

    $stmt = $pdo->prepare('INSERT INTO habitats (name, description, imagePath)
                                VALUES (:name, :description, :imagePath)
                            ');

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':imagePath', $imagePath);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }

    $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
}

function createAnimal(PDO $pdo, string $name, string $species, int $habitat_id, string $description, $image){

    $pdo->beginTransaction(); //transaction: if this function fails, rolls back changes

    $name = sanitizeInput($name);
    $species = sanitizeInput($species);
    $description = htmlspecialchars($description);
    $description = stripslashes($description);
    $imagePath = imageHandler($pdo, $image);

    $stmt = $pdo->prepare('INSERT INTO animals (name, species, habitat_id, description, imagePath)
                                VALUES (:name, :species, :habitat_id, :description, :imagePath)
                            ');

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':species', $species);
    $stmt->bindParam(':habitat_id', $habitat_id);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':imagePath', $imagePath);
    $stmt->execute();

    $animal_id = $pdo->lastInsertId(); //fetch id of inserted row, animals table

    $stmt2 = $pdo->prepare('INSERT INTO animalImpressionCounter (animal_id)
                                VALUES (:animal_id)
                            ');
    $stmt2->bindParam(':animal_id',$animal_id);
    $stmt2->execute();

    $pdo->commit(); //commit. if anything goes wrong, roll back



    $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
}

function createDietLog(PDO $pdo, int $animal_id, string $food, int $kilo){
    $food = sanitizeInput($food);

    $stmt = $pdo->prepare('INSERT INTO animalDietLog (animal_id, food, food_kilogram)
                                VALUES (:animal_id, :food, :food_kilogram)
                            ');

    $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
    $stmt->bindParam(':food', $food);
    $stmt->bindParam(':food_kilogram', $kilo, PDO::PARAM_INT);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }

    $_POST = array(); //xhr doesn't reload page. machine purges $_POST manually.
}

function createVetLog(PDO $pdo, int $vet_id, int $animal_id, string $proposed_food, int $proposed_food_kilogram, ?string $detail) {
    $proposed_food = sanitizeInput($proposed_food);
    $detail = sanitizeInput($detail); // Ensure to sanitize detail if it's not null

    $stmt = $pdo->prepare('INSERT INTO AnimalVetLog (vet_id, animal_id, proposed_food, proposed_food_kilogram, detail) 
                            VALUES (:vet_id, :animal_id, :proposed_food, :proposed_food_kilogram, :detail)');
    
    $stmt->bindParam(':vet_id', $vet_id, PDO::PARAM_INT);
    $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
    $stmt->bindParam(':proposed_food', $proposed_food, PDO::PARAM_STR);
    $stmt->bindParam(':proposed_food_kilogram', $proposed_food_kilogram, PDO::PARAM_INT);
    $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);

    try {
        $stmt->execute();
        echo "Vet log successfully created.";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

    $_POST = array(); // Clear POST data if needed
}

// UPDATE
//services
function updateService(){
    return null;
}