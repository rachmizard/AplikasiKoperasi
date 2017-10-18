<?php $__env->startSection('dashboard'); ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('index.anggota')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php echo e(route('index.anggota')); ?></li>
      </ol>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('simpanan.create')); ?>">Tambah simpanan</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo e(route('home')); ?>">Kembali</a>
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
                <div class="table-responsive">
                <?php $__currentLoopData = $simpanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $got): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('simpanan.destroy', $got->id)); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Simpanan</th>
                        <th>Anggota</th>
                        <th>Tanggal Simpanan</th>
                        <th>Besar Simpanan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        <th>Select</th>
                        </tr>
                    </thead>
                        <tbody> 
                        <tr>
                        <?php if($simpanan->count() > 0): ?>
                        <?php $__currentLoopData = $simpanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e((($simpanan->currentPage() -1) * $simpanan->perPage()) + $loop->iteration); ?></td>
                        <td><?php echo e($in->nm_simpanan); ?></td>
                        <td><?php echo e($in->anggota['nama']); ?></td>
                        <td><?php echo e($in->tgl_simpanan); ?></td>
                        <td><?php echo e($in->besar_simpanan); ?></td>
                        <td><?php echo e($in->ket); ?></td>
                        <td>
                            <a href="<?php echo e(route('simpanan.edit', $in->id)); ?>">Edit</a>
                        </td>
                        <td>
                            <input style="margin-left:10px;" class="form-check-input" type="checkbox" value="<?php echo e($in->id); ?>" name="checked[]">
                        </td>
                    	</tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

							<button class="btn btn-danger" type="submit">Hapus</button>
							</form>
                        <div class="text-center"><?php echo e($simpanan->render()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>