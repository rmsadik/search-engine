<?php
include 'Simpsons.php';

header( 'Content-type: text/xml' );

$s = new Simpsons();
$doc = new DOMDocument();
$root = $doc->createElement( 'episodes' );
$doc->appendChild( $root );
foreach( $s->find( $_REQUEST['q'] ) as $episode ) {
   $el = $doc->createElement( 'episode' );
   $el->setAttribute( 'title', $episode['title'] );
   $el->setAttribute( 'episode', $episode['episode'] );
   $el->setAttribute( 'season', $episode['season'] );
   $el->setAttribute( 'aired', $episode['aired'] );

   $tn = $doc->createTextNode( $episode['summary'] );
   $el->appendChild( $tn );

   $root->appendChild( $el );
}
print $doc->saveXML();
?>
