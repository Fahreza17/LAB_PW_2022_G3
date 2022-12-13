<?php echo e($members->links('pagination::bootstrap-5')); ?>

<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($member->firstname); ?></td>
        <td><?php echo e($member->lastname); ?></td>
        <td><a href='#' class='btn btn-success edit' data-id='<?php echo e($member->id); ?>' data-first='<?php echo e($member->firstname); ?>' data-last='<?php echo e($member->lastname); ?>'> Edit</a> 
            <a href='#' class='btn btn-danger delete' data-id='<?php echo e($member->id); ?>'> Delete</a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\project-armory2\resources\views/memberlist.blade.php ENDPATH**/ ?>