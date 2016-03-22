<style type="text/css">
div#txtHint{position: absolute;
width: 230px;
top: 40px;
max-height: 300px;
z-index: 9999;
border: 1px solid #999;
background: #fff;
cursor: default;
overflow: auto;
left:inherit!important;
}
</style>
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>komisi </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('SalesOrderExecute')) : ?>
           
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            KOMISI
                <div class="searchTable">
                <form action="<?php echo current_url();?>" method="post">
					
                        <span id="sg1"></span>
                </form>
                </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          
          <th>ID SALES</th>
    <th>NAMA SALES</th>
	<th>NO INVOICE</th>
          <th>TOTAL KOMISI</th>

		  <th style="width: 50px;">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($komisi as $k => $v) :
			  // echo "<pre>";
	// print_r($sales_order);
	 // echo "</pre>";
		  ?>
                                        <tr>
          <td><?php echo $v -> sssid; ?></td>
		  <td><?php echo $v -> sname; ?></td>
		  <td><?php echo $v -> sno_invoice; ?></td>
          <td><?php echo __get_rupiah($v -> tamount); ?></td>
		  <td><a href="<?php echo site_url('detail_komisi/home/index/'.$v -> sno_invoice) ?>" >View</a></td>
      
         
		
		
										</tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
    <?php echo $pages; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->

<script type="text/javascript">
$(function(){
	$('div.searchTable > form > div.sLeft > input[name="keyword"]').sSuggestion('span#sg1','<?php echo current_url();?>/get_suggestion', 'keyword');
});
</script>
