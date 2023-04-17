<?php
	$form = '[contact-form-7 id="'. $args['form-id'] .'" title="'. $args['form-title'] .'"]';

?>

<div class="bg-lilac alignfull">
	<div class="content-box flex flex-col lg:flex-row pt-14 pb-8 lg:pt-24 xt:pt-32">
		<div class="text-container lg:w-1/3 flex flex-col items-end lg:mr-14 xl:mr-32 relative">
			<h2 class="font-header max-w-xs text-[45px] leading-tight text-right mt-3 mb-0"><?php echo __('Have a new question?', 'oddities') ?></h2>
			<div class="img-container absolute bottom-[-28px] left-0 lg:static rotate-90 lg:rotate-0">
				<img width="52" height="52" class="" src="<?php echo get_template_directory_uri() . '/icons/arrow-red.svg' ?>"  alt="arrow icon">
			</div>

			<span class="block font-cool-regular lg:max-w-[130px] text-right"><?php echo __("Let's hear it", 'oddities') ?></span>

		</div>
		<div class="form-container lg:w-2/3">
			<div class="wp-block-contact-form-7-contact-form-selector is-style-oddities-form"> <?php echo do_shortcode($form); ?> </div>
		</div>



	</div>
</div>

