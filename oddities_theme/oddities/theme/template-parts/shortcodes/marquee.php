<?php
	$text = explode('-', $args['text']);

?>
<div class="marquee px-0">
<ul class="marquee__content py-8">
	<?php

	foreach($text as $item){
		?>
		<li class="font-display uppercase text-[25px] leading-none list-none mx-0"><?php echo $item;?></li>
	<?php
	}
?>

</ul>

<ul class="marquee__content py-8" aria-hidden="true">
	<?php

	foreach($text as $item){
		?>
		<li class="font-display uppercase text-[25px] leading-none list-none"><?php echo $item;?></li>
	<?php
	}
?>

</ul>
</div>


