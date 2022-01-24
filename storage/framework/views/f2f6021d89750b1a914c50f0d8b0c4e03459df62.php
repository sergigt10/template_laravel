

<?php $__env->startSection('content'); ?>

    <!-- <h2 class="text-center mb-5">Administrar tus noticias</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Título</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($noticia->titulo); ?></td>
                        <td>
                            <eliminar-noticia
                                noticia-id=<?php echo e($noticia->id); ?>

                            ></eliminar-noticia>
                            <a href="<?php echo e(route('noticias.edit', ['noticia' => $noticia->id])); ?>" class="btn btn-dark d-block mb-2">Editar</a>
                            <a href="<?php echo e(route('noticias.show', ['noticia' => $noticia->id])); ?>" class="btn btn-success d-block mb-2">Ver</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="col-12 mt-4 justify-content-center d-flex">
            <?php echo e($noticias->links()); ?>

        </div>

    </div> -->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <!-- Missatges enviats desde el controller -->
                    <?php if(session('estado')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('estado')); ?>

                        </div>
                    <?php endif; ?>
                    <br>
                    <h2>Blog</h2>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Títol</th>
                                            <th data-orderable="false">Editar</th>
                                            <th data-orderable="false">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('noticias.edit', ['noticia' => $noticia->id])); ?>" style="color: black;">
                                                        <?php echo e($noticia->titulo); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('noticias.edit', ['noticia' => $noticia->id])); ?>" style="color: black;">
                                                        <i class="mdi mdi-pencil menu-icon"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" style="color: black;" data-toggle="modal" data-target="#exampleModalCenter<?php echo e($noticia->id); ?>">
                                                        <i class="mdi mdi-close-circle menu-icon"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModalCenter<?php echo e($noticia->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                        Segur que vols esborrar: <?php echo e($noticia->titulo); ?>

                                                    </div>
                                                        <div class="modal-footer">
                                                            <form class="pull-right" action="<?php echo e(route('noticias.destroy', ['noticia' => $noticia->id])); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <input type="submit" value="Esborrar" class="btn btn-danger">
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel·lar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/data-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sergi\Desktop\codi\laravel\LARAVEL UDEMY\practica\noticias\resources\views/noticias/index.blade.php ENDPATH**/ ?>