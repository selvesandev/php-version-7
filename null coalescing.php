<?php

$a = ['fruit' => 'apple'];
$personName = 'Selvesan';
echo $a['not_found'] ?? $personName ?? 'Not Available';