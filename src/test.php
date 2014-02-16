<?php
include 'Simpsons.php';

$s = new Simpsons();
$episodes = $s->find( 'treehouse' );
var_export( $episodes );
?>