

<style></style>

<?php $__env->startSection('content'); ?>
<h1>Pasien</h1>
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pasien->no_rm); ?></td>
                        <td class="text-secondary">
                            <?php echo e($pasien->nama); ?>

                        </td>
                        <td class="text-secondary"><a href="#" class="text-reset"><?php echo e($pasien->alamat); ?></a></td>
                        <td class="text-secondary">
                            <?php echo e($pasien->nomor_telp); ?>

                        </td>
                        <td>
                            <a href="#">Edit</a>
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