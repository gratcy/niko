
   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  PT. Niko Electronik Indonesia 2014</p>
    </div>
    <!--END FOOTER -->


       <script src="<?php echo site_url('application/views/assets/js/formsInit.js');?>"></script>
        <script>
            $(function () {
				$(this).postTMP('<?php echo __get_PTMP(); ?>');
				formInit(); 
			});
        </script>
        
     <!--END PAGE LEVEL SCRIPT-->
     
</body>
     <!-- END BODY -->
</html>
