<!-- DataTales Example -->
<div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <h3 class="font-weight-bold">DATA BERKAS SISWA</h3>
                                    <hr>
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th width="40" class="text-center">No</th>
                                                    <th class="text-center">NISN</th>
                                                    <th class="text-center">Ijazah</th>
                                                    <th class="text-center">Nilai</th>
                                                    <th width="" class="text-center">SKHUN</th>
                                                    <th width="" class="text-center">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no=1;
                                                ?>
                                                <?php foreach ($siswa as $product): ?>
                                                <tr>
                                                    <td class="text-center pt-5"><?php echo $no++ ?></td>
                                                    <td width="" height="" class="text-center pt-5">
                                                        <?php echo $product->nisn ?>
                                                    </td>
                                                    <td width="" height="" class="text-center">
                                                        <img src="<?php echo base_url(); ?>./img/uploads/ijazah/<?php echo $product->ijazah; ?>" width="100" height="140"/>
                                                    </td>
                                                    <td width="" class="text-center">
                                                        <img src="<?php echo base_url(); ?>./img/uploads/nilai/<?php echo $product->nilai_siswa; ?>" width="100" height="140"/>
                                                    </td>
                                                    <td width="" class="text-center">
                                                        <img src="<?php echo base_url(); ?>./img/uploads/skhun/<?php echo $product->skhun; ?>" width="100" height="140"/>
                                                    </td>
                                                    <td width="150" class="pt-5 pl-3">
                                                    <a href="<?php echo site_url('admin/siswa/edit_data/'.$product->id_siswa) ?>"
											            class="btn btn-small btn-info font-weight-bold"></i>ACC</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('admin/siswa/delete/'.$product->id_siswa) ?>')"
                                                    href="#!" class="btn btn-small btn-danger font-weight-bold">TOLAK</a>
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

