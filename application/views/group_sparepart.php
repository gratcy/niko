        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Groups Sparepart </h2>
                    </div>
                </div>

                <hr />
				<?php if (__get_roles('GroupSparepartAdd')) : ?>
                <a href="<?php echo site_url('group_sparepart/group_sparepart_add'); ?>" class="btn btn-default btn-grad"><i class="icon-plus"></i> Add Groups Product</a>
                <br />
                <br />
                <?php endif; ?>
	<?php echo __get_error_msg(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Groups Product
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
		  <?php
		  foreach($group_sparepart as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo $v -> cname; ?></td>
          <td><?php echo substr($v -> cdesc,0,150); ?></td>
          <td><?php echo __get_status($v -> cstatus,1); ?></td>
		  <td>
				<?php if (__get_roles('CategoriesSparepartUpdate')) : ?>
              <a href="<?php echo site_url('group_sparepart/group_sparepart_update/' . $v -> cid); ?>"><i class="icon-pencil"></i></a>
                <?php endif; ?>
				<?php if (__get_roles('CategoriesSparepartDelete')) : ?>
              <a href="<?php echo site_url('group_sparepart/group_sparepart_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>
                <?php endif; ?>
          </td>
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
