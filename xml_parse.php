<?php
  $xml_files = ['defe.xml', 'doom.xml', 'hard.xml', 'moon.xml', 'orig.xml'];
  foreach ([0,1,2,3,4] as $v) {
    // Load contents of XML file
    $xml_file_contents = file_get_contents($xml_files[$v], FILE_USE_INCLUDE_PATH);
    // Create parser handle
    $xml_p = xml_parser_create();
    // Parse XML file
    xml_parse_into_struct($xml_p, $xml_file_contents, $values[$v], $index[$v]);
    // Free parser handle resources
    xml_parser_free($xml_p);
  }
?>
