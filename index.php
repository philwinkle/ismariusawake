<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

require('vendor/autoload.php');

$feed = Zend\Feed\Reader\Reader::import('http://magento.stackexchange.com/feeds/user/146');
$now = new DateTime();

foreach($feed as $entry){
  $lastSeen = $now->diff($entry->getDateModified());
  break;
}

$output = sprintf('%s days, %s hours, %s minutes and %s seconds',
$lastSeen->d,
$lastSeen->h,
$lastSeen->i,
$lastSeen->s
);

$isSleeping = $lastSeen->h > 3 ? 'is sleeping' : 'is awake';
?>
<h1>
Marius was last seen <?php echo $output; ?> ago
</h1>
<h2>
Therefore it is likely that Marius <?php echo $isSleeping; ?>
</h2>