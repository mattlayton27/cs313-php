<?php
function get_work_days() {
    global $db;
    $query = 'SELECT * FROM work_days';
    $statement = $db->prepare($query);
    $statement->execute();
    $work_days = $statement->fetchAll();
    $statement->closeCursor();
    return $work_days;
}
?>
