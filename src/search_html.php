<?php
include 'Simpsons.php';

$s = new Simpsons();
$episodes = $s->find( $_REQUEST['q'] );
if ( count( $episodes ) == 0 ) {
?>
No results found
<?php	
} else {
?>
<table>
<?php foreach( $episodes as $e ) { ?>
<tr><td class="episode"><b><?php echo( $e['title'] ) ?></b> - 
 Season <?php echo( $e['season'] ) ?> 
 Episode <?php echo( $e['episode'] ) ?> - 
 Aired on <?php echo( $e['aired'] ) ?></td></tr>
<tr><td class="summary"><?php echo( $e['summary'] ) ?></td></tr>
<?php } ?>
</table>
<?php
}
?>