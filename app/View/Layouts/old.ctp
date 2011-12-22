<?php 
$js = "/js/";
$ext = "/js/ext-4.0.2a/";
$bugz = '/js/wadudu/';
?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title id="page-title"><?=$title_for_layout;?></title>

    <link rel="stylesheet" type="text/css" href="<?=$ext?>resources/css/ext-all.css" />
    <script type="text/javascript" src="<?=$ext?>ext-debug.js"></script>
    <script type="text/javascript" src="<?=$bugz?>app.js"></script>
</head>
<body>
<?=$content_for_layout; ?>
</body>
</html>