<?php require_once VIEW_DIR . '/layout/admin_header.php'; ?>
<?php require_once VIEW_DIR . '/admin/admin_filter.php'; ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название категории</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //                    var_dump($objects);
                        foreach ($objects as $object) : ?>
                            <tr>
                                <th scope="row"><?= $object->id ?></th>
                                <td><?= $object->name ?></td>
                                <td><a href="/admin/category/update/<?= $object->id  ?>">Изменить</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require_once VIEW_DIR . '/pagination.php'; ?>
<?php require_once VIEW_DIR . '/layout/admin_footer.php'; ?>