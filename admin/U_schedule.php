<?php
require_once "./template/header.php";
?>

<div class="container column">
    <form class="list-container" action="u_schedule.php" method="post">
        <label for="day">Day:</label>
        <select name="day" id="day">
            <option value="lundi">Lundi</option>
            <option value="mardi">Mardi</option>
            <option value="mercredi">Mercredi</option>
            <option value="jeudi">Jeudi</option>
            <option value="vendredi">Vendredi</option>
            <option value="samedi">Samedi</option>
            <option value="dimanche">Dimanche</option>
        </select>

        <label for="ouverture">Opening Time:</label>
        <input type="time" id="ouverture" name="ouverture">

        <label for="fermeture">Closing Time:</label>
        <input type="time" id="fermeture" name="fermeture">

        <label for="is_closed">Closed:</label>
        <input type="checkbox" id="is_closed" name="is_closed" value="1">

        <input type="hidden" name="u_schedule" value="u_schedule">
        <input type="submit" value="Update Schedule">
    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];
    $is_closed = isset($_POST['is_closed']) ? 1 : 0;

    try {

        $sql = "UPDATE schedule SET ouverture = :ouverture, fermeture = :fermeture, is_closed = :is_closed WHERE day = :day";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':ouverture', $ouverture);
        $stmt->bindParam(':fermeture', $fermeture);
        $stmt->bindParam(':is_closed', $is_closed);

        $stmt->execute();

        header('Location: dashboard.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

require_once "./template/footer.php"; ?>