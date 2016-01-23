       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stock <?php echo __get_inventory_type($type); ?> Update</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Stock <?php echo __get_inventory_type($type); ?> Update</h5>
        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Code</th>
          <th>Product</th>
          <th>Stock Begining</th>
          <th>Stock In</th>
          <th>Stock Out</th>
          <th>Stock Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
          <td><?php echo ($type == 2 ? $items[0] -> scode : $items[0] -> pcode); ?></td>
          <td><?php echo ($type == 2 ? $items[0] -> sname : $items[0] -> pname); ?></td>
          <td style="text-align:right;"><?php echo $detail[0] -> istockbegining; ?></td>
          <td style="text-align:right;"><?php echo $detail[0] -> istockin; ?></td>
          <td style="text-align:right;"><?php echo $detail[0] -> istockout; ?></td>
          <td style="text-align:right;"><?php echo $detail[0] -> istock; ?></td>
										</tr>
                                    </tbody>
                                </table>
                                </div>
                                </div>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('opname/opname_update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="type" value="<?php echo $type; ?>">
<input type="hidden" name="stockin2" value="<?php echo $detail[0] -> istockin; ?>">
<input type="hidden" name="stock2" value="<?php echo $detail[0] -> istock; ?>">
<input type="hidden" name="stockout2" value="<?php echo $detail[0] -> istockout; ?>">
<input type="hidden" name="stockbegining2" value="<?php echo $detail[0] -> istockbegining; ?>">
                <div class="form-group" id="pbranch">
                    <label for="text1" class="control-label col-lg-4">Branch</label>

                    <div class="col-lg-4">
						<select name="branch"  class="form-control chzn-select"><?php echo $branch; ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Adjust Min (-)</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Adjust Plus (-)" name="amin" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Adjust Plus (+)</label>

                    <div class="col-lg-4">
                        <input type="text" placeholder="Adjust Plus (+)" name="aplus" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<button class="btn text-muted text-center btn-danger" type="submit">Submit</button>
				<button class="btn text-muted text-center btn-primary" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
    </div>
                    </div>
                  </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
<?php if (__get_roles('ExecuteAllBranchOpname') <> 1) : ?>
<script type="text/javascript">
$('select[name="branch"]').val(<?php echo $this -> memcachedlib -> sesresult['ubid']; ?>);
$('#pbranch').css('display','none');
</script>
<?php endif; ?>
