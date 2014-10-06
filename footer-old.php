<footer>
   <HR>
	<nav>
       <ul class="containsGrid G6 GS" id="footerOne">
           <li class="G2">
              <h4 class="implied"><?php _e('Search', 'ia3'); ?></h4>
               <?php get_search_form(); ?> 
           </li>
<li class="G2 GS" style="text-align:center">
<label class="HSC">Follow Us</label>
<a href="http://www.facebook.com/AStrangeObject" alt="A Strange Object Facebook Page" target="_blank"><img src="http://astrangeobject.com/img/facebook.png" border="0"></a> <a href="http://www.twitter.com/AStrangeObject" alt="A Strange Object Twitter Page" target="_blank"><img src="http://astrangeobject.com/img/twitter.png" border="0"></a> 
</li>
<li class="G2">
<label class="HSC">Mailing list</label>

<form action="http://astrangeobject.us2.list-manage1.com/subscribe/post?u=ff262c34d0d43607718e476da&amp;id=442a017de3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>


<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>

<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
</li>



         <!--  <li class="G1">
               <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-1-1', ''); ?></h2>
               <ul>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-1-2', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-1-3', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-1-4', ''); ?></li>
               </ul>
           </li>
            <li class="G1">
               <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-2-1', ''); ?></h2>
               <ul>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-2-2', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-2-3', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-2-4', ''); ?></li>
               </ul>
           </li> 
           <li class="G1">
               <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-3-1', ''); ?></h2>
               <ul>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-3-2', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-3-3', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-3-4', ''); ?></li>
               </ul>
           </li>
           <li class="G1">
               <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-4-1', ''); ?></h2>
               <ul>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-4-2', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-4-3', ''); ?></li>
                   <li><?php echo ia3_helpers::get_nav_cell('Contact-4-4', ''); ?></li>
               </ul>
           </li>-->
       </ul><!-- .containsGrid.G6GS#footerOne -->

       <ul class="G6 GS" id="footerTwo">
           <li><?php echo ia3_helpers::get_nav_cell('Footer-1-1', ''); ?></li>
           <li><?php echo ia3_helpers::get_nav_cell('Footer-2-1', ''); ?></li>
           <li><?php echo ia3_helpers::get_nav_cell('Footer-3-1', ''); ?></li>
           <li><?php echo ia3_helpers::get_nav_cell('Footer-4-1', ''); ?></li>
           
       </ul><!-- G6.GS#footerOne -->
   </nav>

</div>
<script>!window.$ && document.write('<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery-1.8.3.min.js"><\/script>');</script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.fancybox-1.3.4.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.timeago-0.9.3.min.js"></script>
<script>
   jQuery.noConflict();
   window.BASE_URL = '<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>';
window.TRANSLATION = {
Home: '<?php _e('Home', 'ia3'); ?>',
};
   
   jQuery(document).ready(function() {
       jQuery(document).trigger('CORE:HAS_INITIALIZED');
   });

   jQuery(window).resize(function() {
       jQuery(document).trigger('CORE:HAS_RESIZED');
   });
</script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/ia3.js?v=1"></script>
   <HR><HR width="60%">
<?php wp_footer(); ?>