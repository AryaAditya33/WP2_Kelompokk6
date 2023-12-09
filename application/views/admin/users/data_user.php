<div id="content-wrapper">

    <div class="container-fluid">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4 shadow-sm">
                    <li class="breadcrumb-item font-weight-bold active" aria-current="page">/DATA ADMIN</li>
                </ol>
            </nav>
        </div>  
                       
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                        <h3 class="font-weight-bold">DATA DIRI ADMIN</h3>
                        <hr>
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Created</th>
                                            <th class="text-center">Login</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        ?>
                                        <?php foreach ($user as $product): ?>
                                        <tr>
                                            <td width="100" class="text-center pt-4"><?php echo $no++ ?></td>
                                            <td width="220" class="text-center pt-4">
                                                <?php echo $product->name ?>
                                            </td>
                                            <td width="250" class="text-center pt-4">
                                                <?php echo $product->email ?>
                                            </td>
                                            <td width="120" class="text-center pt-4">
                                                <?php echo $product->username ?>
                                            </td>
                                            <td width="200" class="text-center pt-4">
                                                <?php echo $product->created_at ?>
                                            </td>
                                            <td width="190" class="text-center pt-3">
                                                <?php echo $product->last_login ?>
                                            </td>
                                            <td width="110">
											    <a href="<?php echo site_url('admin/user/edit/'.$product->id_user) ?>"
											 class="btn btn-small text-info"><i class="fas fa-edit"></i> Edit</a>
											    <a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$product->id_user) ?>')"
											href="#!" class="btn btn-small text-danger text-center"><i class="fas fa-trash"></i> Hapus</a>
										    </td>
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




