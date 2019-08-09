 <footer class="footer" id="footer" role="contentinfo">
      <div class="site-width">
        <?php is_active_sidebar(dynamic_sidebar('bds_footer_1')); ?>
        <?php is_active_sidebar(dynamic_sidebar('bds_footer_2')); ?>
        <div class="footer-lower cols-row row">
        	<div class="col-md-12">
            	&copy; <?php echo date('Y'); ?> Hệ thống thông tin mua bán nhà HCM
            </div>
        </div>
      </div>
    </footer>
    <?php include('contactForm.php'); ?>
    <?php wp_footer(); ?>
  </body>
</html>