<!-- Tüm User'ları Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">User First Name</th>
            <th scope="col">User Email</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $num=1;
         foreach ($user as $row) : ?>
        <tr>
            <th scope="row"><?= $num ?></th>
            <td><?= $row['user_firstname'] ?></td>
            <td><?= $row['user_email'] ?></td>
            <?php $num++ ?>
            <td>
                <a href="#" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>