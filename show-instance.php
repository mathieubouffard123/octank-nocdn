<?php
  #The URL root is the AWS meta data service URL where metadata
  # requests regarding the running instance can be made
  $urlRoot="http://169.254.169.254/latest/meta-data/";

  # Get the instance ID from meta-data and print to the screen
  $instance = file_get_contents($urlRoot . 'instance-id');
  $hostname = file_get_contents($urlRoot . 'hostname');
  $lifecycle = file_get_contents($urlRoot . 'instance-life-cycle');
  $instancetype = file_get_contents($urlRoot . 'instance-type');
  $ip = file_get_contents($urlRoot . 'local-ipv4');
  $mac = file_get_contents($urlRoot . 'mac');
  $secGroup = file_get_contents($urlRoot . 'network/interfaces/macs/' . $mac .'/security-groups');
  $subnet = file_get_contents($urlRoot . 'network/interfaces/macs/' . $mac .'/subnet-id');
  $vpc = file_get_contents($urlRoot . 'network/interfaces/macs/' . $mac .'/vpc-id');

  # Availability Zone
  $az = file_get_contents($urlRoot . 'placement/availability-zone');
?>

<center>This page was generated by instance <b><?= $instance ?></b> in Availability Zone <b><?= $az ?></b>.</center>
<center>IP Address is <b><?= $ip ?></b></center>
<center>Security Group is <b><?= $secGroup ?></b></center>
<br><br>

<center>
<?php 
#    echo "<img src='https://bouffam-octank-images.s3.amazonaws.com/images/pexels-pixabay-358457.jpg' width=200 alt='test' />"; 
    echo "<img src='/images/pexels-pixabay-358457.jpg' width=200 alt='test' />"; 
#    echo "<img src='https://bouffam-octank-images.s3.amazonaws.com/images/john-fowler-EgLPw5LE6aQ-unsplash.jpg' width=200 alt='test' />"; 
    echo "<img src='/images/john-fowler-EgLPw5LE6aQ-unsplash.jpg' width=200 alt='test' />"; 
#    echo "<img src='https://bouffam-octank-images.s3.amazonaws.com/images/scarlet-ellis-T-hmCH6excw-unsplash.jpg' width=200 alt='test' />"; 
    echo "<img src='/images/scarlet-ellis-T-hmCH6excw-unsplash.jpg' width=200 alt='test' />"; 
?> 
</center>

<br>
<center><u>UserData</u><b><?= $theData ?></b></center>
<br>

<?php
$filename = "user-data.txt";
$fp = fopen($filename, "r");

while(! feof($fp))
  {
  echo fgets($fp). "<br />";
  }

fclose($fp);
?>
<br><br>