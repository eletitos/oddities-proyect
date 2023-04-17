<?php
?>
<li class="post-container w-full md:w-1/2 lg:w-1/3">
	<a href="<?php echo get_permalink()?>" class="group">
	<div class="content m-6">
		<div class="relative image pt-[100%] border-2 border-blue">

		<?php
			echo oddities__post_thumbnail(true);
		?>

		</div>

		<div class="mt-5 flex">
			<h2 class="font-display sm:text-[25px] md:text-[17px] xl:text-[25px] shrink pr-5 md:group-hover:text-pink leading-[1.35]"><?php echo the_title(); ?></h2>
			<div class="arrow w-fit shrink-0">
			<img class="inline-block md:mr-5 md:group-hover:translate-x-5 ease-out duration-300" width="30px" height="30px" src="<?php echo get_template_directory_uri(); ?>/icons/arrow-blue.svg" alt="">
			</div>

		</div>
		</a>
	</div>
</li>
