<?php $__env->startSection('dashboard'); ?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('index.anggota')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php echo e(route('index.anggota')); ?></li>
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
            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $got): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('anggota.destroy', $got->id)); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($in->name); ?></td>
                <td><?php echo e($in->email); ?></td>
                <td><?php echo e($in->password); ?></td>
                <td><?php echo e($in->role); ?></td>
                <td>
                    <a href="<?php echo e(route('anggota.edit', $in->id)); ?>">Edit</a>
                </td>
                <td>
                    <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="<?php echo e($in->id); ?>" name="checked[]">
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
              </tbody>
            </table>
        <div class="card-footer small text-muted">Table Anggota
            <i class="fa fa-area-chart"></i>
            <a href="<?php echo e(route('anggota.create')); ?>" class="btn btn-primary">Tambah data</a>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>