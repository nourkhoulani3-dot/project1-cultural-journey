<?php
//Starts the session and tracks which cultural artifacts (destinations) a visitor has "collected" so far. This powers the passport page.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['visited_artifacts'])) {
    $_SESSION['visited_artifacts'] = [];
}

//Mark one destination ID as visited (adds a stamp)
function markVisited(string $destinationId): void {
    if (!in_array($destinationId, $_SESSION['visited_artifacts'], true)) {
        $_SESSION['visited_artifacts'][] = $destinationId;
    }
}

//Check if a destination has already been visited
function isVisited(string $destinationId): bool {
    return in_array($destinationId, $_SESSION['visited_artifacts'], true);
}

//How many current destination stamps collected (ignores old/orphan session IDs)
function visitedCount(?array $validIds = null): int {
    $visited = $_SESSION['visited_artifacts'];
    if ($validIds !== null) {
        $visited = array_values(array_intersect($visited, $validIds));
    }
    return count($visited);
}