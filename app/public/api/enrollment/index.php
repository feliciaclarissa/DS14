<?php

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
if (isset($_GET['guid'])) {
  $stmt = $db->prepare('SELECT *
  FROM receive
  WHERE enrollmentID =?'
);
  );
  $stmt->execute([$_GET['guid']]);
} else {
  $stmt = $db->prepare('SELECT * FROM receive');
  $stmt->execute();
}

$receive = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($receive, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
