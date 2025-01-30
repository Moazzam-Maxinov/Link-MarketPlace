<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b-2">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-6 px-12">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lucide-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-primary']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            <h6 class="text-3xl font-semibold whitespace-nowrap text-primary-dark dark:text-white">GetSEOLinks</h6>
        </a>
        
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Link Insertions</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Guest Posts</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Packages</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Contact</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-x-3">
            <a href=""></a>

        </div>
    </div>
</nav>
<?php /**PATH D:\Projects\React JS\linkbuildingmarketplace\resources\views/layouts/common/common-header.blade.php ENDPATH**/ ?>