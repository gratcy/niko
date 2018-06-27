        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Peticash </h2>
                    </div>
                </div>

                <hr />
  <?php echo __get_error_msg(); ?>
  <form class="form-horizontal" action="<?php echo site_url('peticash/sortpeticash'); ?>" method="post">
    <div class="row">
      <div class="col-lg-8">
        <div class="form-group">
        <div class="col-lg-4">From <input type="text" data-date-format="dd/mm/yyyy" name="dfrom" autocomplete="off" class="form-control" value="<?php echo $from; ?>" /></div>
        <div class="col-lg-4">To <input type="text" data-date-format="dd/mm/yyyy" name="dto" autocomplete="off" class="form-control" value="<?php echo $to; ?>" /></div>
        <div class="col-lg-2"> <br /><button class="btn text-muted text-center btn-danger" type="submit">Search</button></div>
        </div>
      </div>
    </div>
  </form>
        <?php if (__get_roles('PetiCashExecute')) : ?>
                <a href="<?php echo site_url('peticash/peticash_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> New Transaction</a>
                <br />
                <br />
                <?php endif; ?>
                <a href="<?php echo site_url('peticash/export_peticash?from='.$from.'&to='.$to); ?>" class="btn btn-default btn-grad"><i class="icon-book"></i> Export Excel</a>
                <br />
                <br />
  <?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Peticash
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Date</th>
          <th>Category</th>
          <th>No. Reference</th>
          <th>Description</th>
          <th>Debit</th>
          <th>Credit</th>
          <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      <?php
      foreach($peticash as $k => $v) :
      ?>
                                        <tr>
          <td><?php echo __get_date($v -> pdate); ?></td>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo $v -> prefno; ?></td>
          <td><?php echo $v -> pdesc; ?></td>
          <td><?php echo ($v -> ptype == 1 ? __get_rupiah($v -> pnominal,2) : '-'); ?></td>
          <td><?php echo ($v -> ptype == 2 ? __get_rupiah($v -> pnominal,2) : '-'); ?></td>
          <td><?php echo __get_rupiah($v -> psaldo,2); ?></td>
                    </tr>
        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
       <!--END PAGE CONTENT -->

        <!-- END PAGE CONTENT -->
<script type="text/javascript">
  $('input[name="dfrom"],input[name="dto"]').datepicker({
    dateFormat: 'dd/mm/yy'
  });
</script>
