<?php
class Simpsons {
   private $episodes = array();
   public function __construct() {
      $xmlDoc = new DOMDocument();
      $xmlDoc->load("simpsons.xml");
	  foreach ($xmlDoc->documentElement->childNodes as $episode)
	  {
		  if ( $episode->nodeType == 1 ) {
			$this->episodes []= array( 'episode' => $episode->getAttribute( 'episode' ),
			 	'season' => $episode->getAttribute( 'season' ),
				'title' => $episode->getAttribute( 'title' ),
				'aired' => $episode->getAttribute( 'aired' ),
				'summary' => $episode->nodeValue,
				'xmlNode' => $episode );
		}
	  }
   }
   public function find( $q ) {
	 $found = array();
	 foreach( $this->episodes as $episode ) {
       $re = "/".$q."/i";
       if ( preg_match( $re, $episode['summary'] ) || preg_match( $re, $episode['title'] ) ) {
         $found []= $episode;
       }
	 }
	 return $found;
   }
}
?>