<?php 
$t = $Ticket['Ticket'];
$projectCode = $Ticket['Project']['code'];
$projectUrl = $Wadudu->buildUrl(null, $projectCode);
$ticketUrl = $Wadudu->buildUrl(null, $projectCode, $t['id']);

$ticketStateId = $t['ticket_state_id'];
$ticketTypeId = $t['ticket_type_id'];
$ticketType = $Workflow[$ticketTypeId];
//$ticketStates = $ticketType['states'];
$ticketState = $ticketType['states'][$ticketStateId];
//pr($ticketState);die();

$ticketTitle = $t['id'] . ' - ' . $t['name'];

$transList = array();
foreach($ticketState['transitions'] as $transition){
	$transList[] = $transition['transition_to_id'];
}
?>

<?=$this->element('page_title', array('title' => $ticketTitle, 'subtitle' => ''))?>

<h2><a href="<?=$projectUrl?>"><?=$projectCode?></a></h2>
<div class="big_center">
	<ul class="ticket_states">
	<?php
	foreach($ticketType['states'] as $tstate){
		$class = $tstate['id'] == $ticketStateId ? 'current' : '';
	?>
		<li class="<?=$class?>"><?=$tstate['name']?></li>
	<?php
	}
	?>
	</ul>
	<div class="clr"></div>
	
	<!--Status: <?=$ticketState['name']?>-->
	
	<?php
	
	foreach($ticketState['transitions'] as $transition){
	?>
	<input type="button" value="<?=$transition['name']?>" />
	<?php
	}
	?>
	<br /><hr /><br />
	
	<?=$t['description']?><br /><br />

	<br /><hr />
      <div class="box_b" name="tags">
        <h2>Tags</h2>
        <p>
			<?php
			$tags = array();
			$li = array();
			foreach($Ticket['Tag'] as $tag){
				$tg = ($tag['name'] != 'Tag' ? $tag['name'] . ':' : '') . $tag['value'];
				$tags[] = $tg;
				$deleteUrl = $ticketUrl . '/tag:' . $tag['id'];
				$li[] = '<li class="tag" name="tag-' . $tag['id'] . '"><a href="' . $deleteUrl . '" class="close">x</a> ' . $tg . '</li>';		
			}
			?>
			<form action="<?=$ticketUrl?>#tags" method="post">
			<input type="text" id="taginput" name="tags" />
			<div id="notice"></div>
			<div id="counter"></div>
			<div class="clr"></div>
			<ul id="taglist"><?=implode('', $li)?></ul>
			</form>
        </p>
      </div>
	<script type="text/javascript">
		/*$('#taginput').quickTag({
			allowedTags: 100
			, fade: 300
			, notice : $('#notice')
			, counter : $('#counter')
			, coloring: true
		});*/
		$('#taglist').on('click', 'li', function(){
			//console.log('clicked');
		});
		$('#taglist li .close').on('click', function(){
			var parent = $(this).parent();
			var tagId = parent.attr('name').substr(4);
			//console.log(tagId);
			//return false;
		});
	</script>
	<div class="clr"></div>

	
	<br /><hr />
	<div class="big_center no_margin">
		<h2>Comments:</h2>
		<div style="float:right;"><input type="button" id="commentToggle" value="Show/Hide Comments" /></div>
		<div id="commentBox">
		<?php 
		$dateFormat = Configure::read('App.date_format');
		foreach($Ticket['Comment'] as $comment){
			$ts = date($dateFormat, strtotime($comment['created']));
		?>
		<p>
		<?=$comment['comment']?>
		</p>
		<p class="spec">
		~ <strong><?=$comment['User']['first_name']?> <?=$comment['User']['last_name']?></strong> on <?=$ts?><br />
		</p>
		<br />
		<?php 
		}
		?>
		</div>
	</div>
	
	<!--<div id="commentAdd">Add Comment</div>-->
	<input type="button" id="commentAdd" value="Comment" />
	<div id="commentAddForm" style="display:none;">
	<form action="" method="post">
		<textarea name="comment" style="width:400px;height:200px;"></textarea><br />
		<input type="submit" value="Add Comment" />
		<input type="button" id="commentCancel" value="Cancel" />
	</form>
	</div>
	
	<script type="text/javascript">
		$('#commentToggle').on('click', function(){
			$('#commentBox').toggle();
		});
		$('#commentAdd').on('click', function(){
			$('#commentAddForm').show();
			$('#commentAdd').hide();
		});
		$('#commentCancel').on('click', function(){
			$('#commentAddForm').hide();
			$('#commentAdd').show();
		});
	</script>
	
	<hr />
</div>
<!-- Ticket: <?php pr($Ticket)?><br /> -->

<div class="right no_margin">
	<div class="box">
    <div class="box_t">
      <div class="box_b">
        <h2>Ticket Info</h2>
        <p>
			Company: <?=$Company['Company']['name']?><br />
			Project: <a href="<?=$projectUrl?>"><?=$Project['Project']['name']?></a><br />
			Ticket Type: <?=$Ticket['TicketType']['name']?><br />
        </p>
      </div>
    </div>
  </div>
	
	

	<div class="box">
    <div class="box_t">
      <div class="box_b">
        <h2>Users</h2>
        <p>
			Reporter: <?=$Ticket['Reporter']['first_name']?> <?=$Ticket['Reporter']['last_name']?><br />
			Assignee: <?=$Ticket['Assignee']['first_name']?> <?=$Ticket['Assignee']['last_name']?><br />
        </p>
      </div>
    </div>
  </div>

	

	<div class="box">
    <div class="box_t">
      <div class="box_b">
        <h2>Dates</h2>
        <p>
			Created: <?=$t['created']?><br />
			Modified: <?=$t['modified']?><br />
        </p>
      </div>
    </div>
  </div>

</div>

