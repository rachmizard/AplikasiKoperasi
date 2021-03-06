<?php $__env->startSection('dashboard'); ?>
<?php if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'PETUGAS'): ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route('simpanan.update', $simpanan->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="nama">Nama Simpanan</label>
                        <input type="text" name='nm_simpanan' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Simpanan" value="<?php echo e($simpanan->nm_simpanan); ?>">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Anggota</label>
                        <select class="form-control" name="id_anggota">                        
                        <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($in->id); ?>" <?php if(($simpanan->id_anggota)==($in->id)): ?> selected <?php endif; ?>><?php echo e($in->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Simpanan</label>
                        <input type="date" name='tgl_simpanan' class="form-control" id="tgl_lahir" aria-describedby="emailHelp" placeholder="Tanggal Simpanan" value="<?php echo e($simpanan->tgl_simpanan); ?>">
                      </div>
                      <div class="form-group">
                        <label for="tmp_lhr">Besar Simpanan</label>
                        <input type="text" name='besar_simpanan'  class="form-control" id="tmp_lhr" placeholder="Besar Simpanan" value="<?php echo e($simpanan->besar_simpanan); ?>">
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">Keterangan</label>
                        <input type="text" name="ket" class="form-control" id="no_tlp" placeholder="Keterangan" value="<?php echo e($simpanan->ket); ?>">
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah Simpanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="cars card-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  You're not authorized to access this page!
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>