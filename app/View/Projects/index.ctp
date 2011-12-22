<?php
	//echo 'ProjectCode: ' . $ProjectCode . '<br />';
	//echo 'Project Details:';pr($Project);echo '<br />';
	//echo 'Company: ';pr($Company);
$P = $Project['Project'];
$C = $Company['Company'];
$W = $Project['Workflow'];

$projectTitle = $P['code'] . ' | ' . $P['name'];
$projectUrl = $Wadudu->buildUrl(null, $P['code']);
?>

<?=$this->element('page_title', array('title' => $projectTitle, 'subtitle' => $P['description']))?>

<!--
Company: <?=$C['name']?><br />
Project Code: <?=$ProjectCode?><br />
Project Name: <?=$P['name']?><br />
Description: <?=$P['description']?><br />
-->
<br />


<div class="left">
	<div class="box no_margin">
		<div class="box_t">
			<div class="box_b">
				<h2>Actions</h2>
				<ul>
					<li><a href="<?=$projectUrl?>/edit">Edit Project</a></li>
					<li><a href="<?=$projectUrl?>/ticket">Create Ticket</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

Issues:<br />
<?php
foreach($Tickets as $Ticket){
	$t = $Ticket['Ticket'];
	$ticketCode = $t['id'];
	$ticketName = $t['name'];
	$ticketUrl = $Wadudu->buildTicketUrl($t['id']);
?>
<div class="ticket">
	<a href="<?=$ticketUrl?>">
		<?=$ticketCode?> - <?=$ticketName?>
	</a>
</div>
<?php
}