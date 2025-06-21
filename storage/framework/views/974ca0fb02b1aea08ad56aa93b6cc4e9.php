<?php if (! $__env->hasRenderedOnce('699e206b-c4ad-4d6a-bd1b-4546986f78d6')): $__env->markAsRenderedOnce('699e206b-c4ad-4d6a-bd1b-4546986f78d6');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        iframe {
            width: 100% !important;
            height: 100% !important;
        }
        .google_map{
            height: 200px;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="contacts_info mt-5">
    <p><?php echo pagesetting('google_map_editor'); ?></p>
    <div class="google_map w-100">
        <?php echo pagesetting('google_map_key'); ?>

    </div>
</div>
<?php /**PATH C:\xampp2\htdocs\InfixEdu_v8.2.8\resources\views/themes/edulia/pagebuilder/google-map/view.blade.php ENDPATH**/ ?>