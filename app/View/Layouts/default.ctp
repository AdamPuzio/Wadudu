<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title_for_layout?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?=FULL_BASE_URL?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=FULL_BASE_URL?>/css/wadudu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=FULL_BASE_URL?>/js/jquery/jquery-1.7.1.min.js"></script>
<!--<script type="text/javascript" src="<?=FULL_BASE_URL?>/js/jquery/jquery.quicktag.min.js"></script>-->
</head>
<body>
<div class="main">
	<?=$this->element('header')?>
	<div class="body">
	<?=$content_for_layout?>
	</div>
	<div class="clr"></div>
</div>
<?=$this->element('footer')?>
</body>
</html>