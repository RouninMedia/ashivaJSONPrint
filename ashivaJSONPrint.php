<?php

function Custom_Pretty_Print_JSON($Data) {

  if (!is_null(json_decode($Data, TRUE))) {

    $Data = json_decode($Data, TRUE);
  }

  $String = json_encode($Data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

  $String = str_replace('    ', '  ', $String);

  $String = preg_replace("/(\:\s\{|\:\s\[|\,)\n([\s]+)(\"|\{|\[)/", "$1\n\n$2$3", $String);

  return $String;
}

?>
