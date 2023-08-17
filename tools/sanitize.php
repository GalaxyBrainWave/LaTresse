<?php
function sanitize(string $input): string {
  if ($input == null) {
      return "";
  }
  $output = trim($input);
  $output = strip_tags($output);
  // $output = htmlspecialchars($output);
  // characters affected by htmlspecialchars: <, >, ", ', &
  return $output;
}