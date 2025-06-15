<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if (!isset($_GET['url'])) {
  echo json_encode(['error' => 'Missing URL']);
  exit;
}

$url = $_GET['url'];
$html = file_get_contents($url);

preg_match('/"(https:\\/\\/media\.pixverse\.ai[^"]+\.mp4)"/', $html, $matches);

if (isset($matches[1])) {
  $mp4 = stripslashes($matches[1]);
  echo json_encode(['mp4' => $mp4]);
} else {
  echo json_encode(['error' => 'Video not found']);
}
?>
