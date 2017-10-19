<?php $__env->startSection('dashboard'); ?>
<div class="container">
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
                    <form method="POST" action="<?php echo e(route('simpanan.store')); ?>">
                        <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="nama">Nama Simpanan</label>
                        <input type="text" name='nm_simpanan' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Anggota</label>
                        <select class="form-control" name="id_anggota" id="alamat">
                          <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if(Auth::user()->role == 'ANGGOTA'): ?>
                          <option value="<?php echo e(Auth::user()->id); ?>" selected><?php echo e(Auth::user()->name); ?></option>
                          <?php endif; ?>
                          <option value="<?php echo e($in->id); ?>"><?php echo e($in->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Simpanan</label>
                        <input type="date" name='tgl_simpanan' class="form-control" id="tgl_lahir" aria-describedby="emailHelp" placeholder="Tanggal Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="tmp_lhr">Besar Simpanan</label>
                        <input type="text" name='besar_simpanan'  class="form-control" id="tmp_lhr" placeholder="Besar Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">Keterangan</label>
                        <input type="text" name="ket" class="form-control" id="no_tlp" placeholder="Keterangan">
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah Simpanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>