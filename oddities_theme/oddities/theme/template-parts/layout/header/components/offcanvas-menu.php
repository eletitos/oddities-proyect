<?php

$icon_width_offset = 'w-[63px] md:w-[85px]';
$text_icon_offset = "font-cool text-yellow md:text-[40px] block leading-[0.6] text-center sm:group-hover:visible invisible absolute top-05";
$icon_class = "flex flex-col items-center cursor-pointer group relative";
?>
<div class="offcanvas bg-blue top-0 bottom-0 w-full fixed z-100 overflow-auto" id="offcanvas">
	<div class="w-full flex min-h-screen items-stretch justify-center ">
		<div role="navigation flex flex-col justify-center" class="m-auto">
		<?php
				wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
						'menu_id'        => 'primary-menu',
						'container_class' => 'flex text-pink uppercase',
						'items_wrap'     => '<ul id="%1$s" class="%2$s flex flex-col items-center" aria-label="submenu">%3$s</ul>',
						'link_before' => '<span class="sm:hover:text-yellow pr-5 pl-5 font-display text-[25px] md:text-[85px]">',
						'link_after' => '</span>'
					)
				);
		?>


<div class="icons-menu flex items-center justify-center mt-8 md:mt-16">

				<div class="login-icon icon mr-2 <?php echo $icon_class  ?>">
					<div class="<?php echo $icon_width_offset ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" xml:space="preserve" class="<?php echo $color_class?>"><path  d="M175.889 158.991h-16.998v16.797h-33.593v16.797H74.501v-16.797H40.908v-16.797H24.111v-33.593H7.314V74.602h16.797V41.009h16.797V24.212h33.593V7.415h50.796v16.797h33.593v16.797h16.998v33.593h16.797v50.796h-16.797v33.593zM74.501 91.4V58.211h-16.39V91.4h16.39zm0 33.593v-16.392h-16.39v16.392h16.39zm50.39 16.797v-16.392H74.907v16.392h49.984zm16.797-50.39V58.211h-16.39V91.4h16.39zm0 33.593v-16.392h-16.39v16.392h16.39z"/></svg>
					</div>
					<span class="<?php echo $text_icon_offset?> w-[85px] -left-24"><?php esc_attr_e( 'Log in to your account', 'oddities'  ); ?></span>
				</div>

				<div class="bag-icon ml-2 icon <?php echo $icon_class  ?>">
					<div class="<?php echo $icon_width_offset  ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" xml:space="preserve" class="<?php echo $color_class?>"><path fill="none" d="M146.987 39.274h-19.288V19.988l-18.11-.006v.007l-17.224-.006v.006l-19.659-.007v18.426l-19.287.843v16.883h93.568v-16.86z"/><path  d="M60.039 135.077H43.735v5.127h16.304c1.755 0 3.463 0 3.463-2.586.001-2.541-1.708-2.541-3.463-2.541zM96.606 134.154h10.207l-5.08-11.592zM61.332 124.917c0-2.54-1.709-2.54-3.464-2.54H43.735v5.08h14.133c1.755 0 3.464 0 3.464-2.54z"/><path  d="M166.794 75.778s-.14-30.369-.14-36.882h-19.288V19.61h-18.868V1.282H72.706v18.315H53.034v19.287H33.747l-.549 36.858-19.036-.013v116.758c6.546.383 165.352.575 171.676.575V75.77l-19.044.008zM53.418 39.252l19.287-.055V19.983l19.659.007v-.006l17.224.006v-.007l18.11.006v19.286h19.288v16.86H53.418V39.252zm9.716 108.526H33.575v-32.329h28.311c7.344 0 9.606 3.511 9.606 8.36 0 2.171-.969 4.341-2.54 6.143 2.817 1.847 4.711 4.711 4.711 8.313.001 5.403-3.186 9.513-10.529 9.513zm49.683 0-2.772-6.327H93.373l-2.771 6.327H79.379l15.056-32.329h14.548l15.01 32.329h-11.176zm35.873-7.112c6.327 0 9.375-2.125 9.698-4.434h-10.391v-5.911h20.736v17.457h-6.512l-.6-4.849c-2.91 3.232-7.482 5.311-14.318 5.311-11.915 0-19.074-5.634-19.074-16.673 0-10.946 7.159-16.579 20.46-16.579 12.932 0 19.536 4.802 20.044 13.208h-10.345c-.462-2.032-2.771-4.619-9.698-4.619-8.96 0-10.3 4.433-10.3 8.313 0 3.927 1.386 8.776 10.3 8.776z"/></svg>
					</div>
					<span class="<?php echo $text_icon_offset?> md:w-[75px] -right-20"><?php esc_attr_e( 'Your bag Awaits', 'oddities'  ); ?></span>
				</div>
			</div>



			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'bottom-offcanvas-menu',
						'menu_id'        => 'bottom-offcanvas-menu',
						'container_class' => 'flex justify-center  text-pink uppercase mt-12 md:mt-20 pb-11',
						'items_wrap'     => '<ul id="%1$s" class="%2$s flex flex-col md:flex-row items-center" aria-label="submenu">%3$s</ul>',
						'link_before' => '<span class="sm:hover:text-yellow pr-5 pl-5 font-display text-[17px] md:text-[25px]">',
						'link_after' => '</span>'
					)
				);
		?>



		</div>
	</div>

</div>

