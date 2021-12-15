<!-- Tüm Director'ları Listele -->
<div class="container" style="min-height : calc(100vh - 200px);">

    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Director Name</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($director as $row) : ?>
        <tr>
            <th scope="row">1</th>
            <td><?= $row['director_name'] ?></td>
            <td>
                <table>
                    <td>
                        <a href="<?= base_url('director/edit/'.$row['id'] ) ?>" class="btn btn-warning">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('director/delete/'.$row['id']) ?>" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
