<?php $__env->startSection('dashboard'); ?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('home')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php echo e(route('index.pinjaman')); ?></li>
      </ol>

                <a class="btn btn-secondary btn-sm mb-3" href="<?php echo e(route('home')); ?>">Kembali</a>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('messageedit')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('messageedit')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('messagehapus')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('messagehapus')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('messagehapusgagal')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('messagehapusgagal')); ?>

                    </div>
                <?php endif; ?>
      <div class="row">
        <div class="col-12">
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Menu</div>
        <div class="card-body">
         <div class="table-responsive">
            <?php $__currentLoopData = $pinjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $got): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('pinjaman.destroy', $got->id)); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Pinjaman</th>
                  <th>Anggota</th>
                  <th>Besar Pinjaman</th>
                  <th>Tgl Pinjaman</th>
                  <th>Tgl Pelunasan</th>
                  <th>Angsuran</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $pinjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($in->nama_pinjaman); ?></td>
                <td><?php echo e($in->anggota['nama']); ?></td>
                <td><?php echo e($in->besar_pinjaman); ?></td>
                <td><?php echo e($in->tgl_pinjaman); ?></td>
                <td><?php echo e($in->tgl_pelunasan); ?></td>
                <td><?php echo e($in->id_angsuran); ?></td>
                <td>
                    <a href="<?php echo e(route('pinjaman.edit', $in->id)); ?>">Edit</a>
                    <a href="<?php echo e(route('pinjaman.edit', $in->id)); ?>">Detail</a>
                </td>
                <td>
                    <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="<?php echo e($in->id); ?>" name="checked[]">
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
              </tbody>
            </table>
        <div class="card-footer small text-muted">Table Petugas
            <i class="fa fa-area-chart"></i>
            <a href="<?php echo e(route('pinjaman.create')); ?>" class="btn btn-primary">Tambah data</a>
            <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
        </form>
        </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

            <button class="btn btn-secondary" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>