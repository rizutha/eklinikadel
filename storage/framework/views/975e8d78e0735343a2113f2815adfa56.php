

<?php
    $title = "Pasien Pendaftaran";
    $preTitle = "Data";
?>

<?php $__env->startPush('page-action'); ?>
    <a href="<?php echo e(route ('pasien.create')); ?>" class="btn btn-primary mb-3">Tambah Data</a>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 ">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pasien->id); ?></td>
                            <td class="text-secondary">
                                <?php echo e($pasien->nama); ?>

                            </td>
                            <td class="text-secondary">
                                <?php echo e($pasien->alamat); ?>

                            </td>
                            <td class="text-secondary">
                                <?php echo e($pasien->nomor_telp); ?>

                            </td>
                            <td>
                                <div class="row">
                                    <a href="<?php echo e(route('pasien.edit', $pasien->id)); ?>" class="col">Edit</a>
                                    <form action="<?php echo e(route('pasien.destroy', $pasien->id)); ?>" method="post" class="col">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input type="submit" value="Hapus" class="btn btn-danger">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\R'Boys\example-test\resources\views/pasien/index.blade.php ENDPATH**/ ?>