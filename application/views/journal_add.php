
       <!--PAGE CONTENT -->
        <div id="content">
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Journal Add</h1>
                </div>
            </div>
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Journal Add</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
	<?php echo __get_error_msg(); ?>
            <form class="form-horizontal" action="<?php echo site_url('journal/journal_add'); ?>" method="post">

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Type</label>

                    <div class="col-lg-4">
                        <select name="type" class="form-control" /><?php echo __get_transaction_type(0,2); ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Title</label>

                    <div class="col-lg-4">
                        <input type="text"  name="title" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Document Reff</label>

                    <div class="col-lg-4">
                        <input type="text"  name="docref" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Description</label>

                    <div class="col-lg-4">
                        <textarea name="desc" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Status</label>
                    <div class="col-lg-4">
						
                            <div class="make-switch has-switch" data-on="danger" data-off="default">
                                <?php echo __get_status(0,2); ?>
                            </div>
					</div>
				</div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4">Account</label>
                    <div class="col-lg-4">
						<button class="btn text-muted text-center btn-success" type="button" id="AddAcc">Add Account</button>
						<input type="hidden" name="numrows" id="numrows" value="0">
					</div>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
                    <div class="col-lg-10" style="float:none!important;margin:0 auto;">
						<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>COA</th>
          <th>Debit</th>
          <th>Credit</th>
          <th>Description</th>
          <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="glchild">
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                <td style="text-align: right;">Total :</td>
                                <td style="text-align: right;"><span id="totalDebit">0</span></td>
                                <td style="text-align: right;"><span id="totalCredit">0</span></td>
                                <td></td>
                                <td></td>
												</tr>
                                            </tfoot>
                                </table>
                                </div>
					</div>
				</div>
                <div class="form-group">
							<label for="status" class="control-label col-lg-4"></label>
                    <div class="col-lg-4">
				<button class="btn text-muted text-center btn-danger" id="post" type="button">Post</button>
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
<script type="text/javascript">
$('#AddAcc').click(function(){
	var numrows = $('#numrows').val();
	numrows++;
	$('#numrows').val(numrows);
	res = '';
	res += '<tr id="row_' + numrows + '">';
	res += '<td><select name="coas[]" class="form-control"><?php echo str_replace(array("\n", "\r"), '', $coa); ?></select></td>';
	res += '<td><input class="form-control" type="text" name="debit[]" style="text-align: right;" id="debit_' + numrows + '" value="0" onchange="debitChanged(' + numrows + ')"></td>';
	res += '<td><input class="form-control" type="text" name="credit[]" style="text-align: right;" id="credit_' + numrows + '" value="0" onchange="creditChanged(' + numrows + ')"></td>';
	res += '<td><input class="form-control" type="text" name="descc[]" id="desc_' + numrows + '" value=""></td>';
	res += '<td><button type="button" id="btn_remove_coa_' + numrows + '" onclick="removeRow(' + numrows + ');" class="btn btn-primary" style="margin-top: 2px;"><i class="icon-minus"></i></button></td>';
	res += '</tr>';
	$('#glchild').append(res);
});
var removeRow = function(numrow){
	$('#glchild #row_' + numrow).detach();
	$('#numrows').val($('#numrows').val() - 1);
	totalDebit();
	totalCredit();
	return true;
}

var debitChanged = function(numrow) {
	$('#credit_' + numrow).val(0);
	totalDebit();
	totalCredit();
}

var creditChanged = function(numrow) {
	$('#debit_' + numrow).val(0);
	totalDebit();
	totalCredit();
}

var totalDebit = function() {
	numrows = $('#numrows').val();
	var totaldebit = 0;
	for(i=1; i<=numrows; i++){
		if($('#debit_' + i).length > 0 && $('#debit_' + i).val() != '' && $('#debit_' + i).val() != 0){
			totaldebit += parseInt($('#debit_' + i).val());
		}
	}
	$('#totalDebit').html(totaldebit);
}
var totalCredit = function() {
	numrows = $('#numrows').val();
	var totalcredit = 0;
	for(i=1; i<=numrows; i++){
		if($('#credit_' + i).length > 0 && $('#credit_' + i).val() != ''){
			totalcredit += parseInt($('#credit_' + i).val());
		}
	}
	$('#totalCredit').html(totalcredit);
}
$('#post').click(function(){
	$('form.form-horizontal').append('<input type="hidden" name="ispost" value="1">');
	$('form.form-horizontal').submit();
});
</script>
        <!-- END PAGE CONTENT -->
