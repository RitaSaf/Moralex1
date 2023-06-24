


<?php $__env->startSection('pageTitle'); ?>
<?php echo e(config('app.name')); ?>

Shopping Cart
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo e(route('index')); ?>"><?php echo e(config('app.name')); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo e(route('index')); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('about')); ?>">About</a></li>
                </ul>
                <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo e($cart->count()); ?></span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shopping Cart</h1>
            </div>
        </div>
    </header>
    <!-- Section-->

    <section class="py-5">

        <div class="container">
            <div class="col-md-4">
                <?php if(Session::has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(Session::get('success')); ?> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                 <?php endif; ?>
            </div>
    
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Size</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row"><?php echo e($loop->index + 1); ?></th>
                    <td><?php echo e(App\Models\Product::where('id',$product->product)->value('title')); ?></td>
                    <td><?php echo e(App\Models\Product::where('id',$product->product)->value('price') - App\Models\Product::where('id',$product->product)->value('discount')); ?>₪</td>
                    <td>
                        <form action="<?php echo e(route('cart.update_qty',$product->id)); ?>" method="post"> 
                            <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                            <!--QTY-->
                                <input type="number" name="qty" class="form-control mt-2 mb-2" value="<?php echo e($product->qty); ?>" min="1" max="12">
                                <form action="<?php echo e(route('cart.update_qty',$product->id)); ?>" method="post"> 
                                    <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </div>
                        </div>
                    </td>
                    <td>
                     <?php echo e($product->size); ?>

                    </td>
                    
                    <td>
                        <form action="<?php echo e(route('cart.delete_product',$product->id)); ?>" method="post"> 
                            <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                  </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
        </div>
        <?php if($cart->count() > 0): ?>
        <div class="text-center">
            <form action="<?php echo e(route('cart.checkout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                 <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
        <?php endif; ?>
       
    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Laravel\Moralex\resources\views/cart.blade.php ENDPATH**/ ?>