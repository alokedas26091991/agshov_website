<?php
if($_display_meta){
    ?>
   <?php
   if($meta_title)
   {
   ?>
<title><?=$meta_title?></title>
<?php
}
else
{
?>
<title>Welcome to Daujii</title>
<?php
}
?>
<meta name="keywords" content="<?=$meta_keywords?>" />
<meta name="description" content="<?=$meta_desc?>" />
<meta name="robots" content="<?=rtrim($robot,',')?>" />
<link rel="canonical" href="<?=  str_replace('http://','https://',$canonical)?>" />

<meta property="og:title" content="<?=$title?>">
<meta property="og:description" content="">
<meta property="og:image" content="">
<meta property="og:url" content="">



<?php }else{
?><title>Welcome to Daujii</title>
<?php }
	?>
