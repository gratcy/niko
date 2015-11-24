
   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  PT. Niko Elektronik Indonesia <?php date('Y'); ?></p>
    </div>
    <!--END FOOTER -->


       <script src="<?php echo site_url('application/views/assets/js/formsInit.js');?>"></script>
        <script>
			$( document ).ajaxComplete(function() {
				$('.form-group select').chosen({no_results_text: "Oops, nothing found!"}); 
			});
            $(function () {
			$('.form-group select').chosen({no_results_text: "Oops, nothing found!"}); 
			<?php if (!preg_match('/\/home\/sales_order_detail_add\/(\d+)\/(\d+)/i', $_SERVER['REQUEST_URI'])) : ?>
				$(this).postTMP('<?php echo __get_PTMP(); ?>');
				formInit(); 
			<?php endif; ?>
			});
        </script>
        
     <!--END PAGE LEVEL SCRIPT-->
     
</body>
     <!-- END BODY -->
</html>
