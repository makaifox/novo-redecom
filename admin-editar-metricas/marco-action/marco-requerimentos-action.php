<?php

require '../../config.php';
require '../../classes/Marco.php';

$marco = new Marco($pdo);

$requerimentos = filter_input_array(INPUT_POST, FILTER_SANITIZE_NUMBER_FLOAT);

$marco->editMarcoRequerimentos($requerimentos);
header("Location: ../marco-editar.php");


