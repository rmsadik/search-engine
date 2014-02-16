<?php
include 'Simpsons.php';

header( 'Content-type: application/json' );

$s = new Simpsons();
print json_encode( $s->find( $_REQUEST['q'] ) );
?>
