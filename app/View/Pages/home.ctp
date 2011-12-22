
<?=$this->element('page_title', array('title' => 'Home', 'subtitle' => ''))?>


<div class="left">
	<div class="box no_margin">
		<div class="box_t">
			<div class="box_b">
				<h2>Projects</h2>
				<ul>
<?php
if($Projects){
	// Display projects
	foreach($Projects as $project){
		$code = $project['Project']['code'];
		$name = $project['Project']['name'];
	?>
				<li><a href="/<?=$code?>">[<?=$code?>] <?=$name?></a></li>
	<?php
	}
}else{
	// Display companies
	
}
?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="big_center no_margin">
Content
</div>

