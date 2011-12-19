<?php 
$t = $Ticket['Ticket'];
$projectCode = $Ticket['Project']['code'];
?>
Ticket: <?=$t['id']?><br /><br />
<?=$t['name']?><br /><br />
<?=$t['description']?><br /><br />

Company: <?=$Company['Company']['name']?><br />
Project: <?=$Project['Project']['name']?><br />

Ticket Type: <?=$Ticket['TicketType']['name']?><br /><br />

Users:<br />
Reporter: <?=$Ticket['Reporter']['first_name']?> <?=$Ticket['Reporter']['last_name']?><br />
Assignee: <?=$Ticket['Assignee']['first_name']?> <?=$Ticket['Assignee']['last_name']?><br /><br />

Dates:<br />
Created: <?=$t['created']?><br />
Modified: <?=$t['modified']?><br />

<br /><hr />
Comments:<br />
<?php foreach($Ticket['Comment'] as $comment){?>
<?=$comment['User']['first_name']?> <?=$comment['User']['last_name']?>:<br />
<?=$comment['comment']?>

<?php }?>
<br /><hr />
<!-- Ticket: <?php pr($Ticket)?><br /> -->

