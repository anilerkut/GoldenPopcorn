<!-- Tüm Director'ları Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


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
                        <a href="<?= base_url('DirectorController/edit/'.$row['id'] ) ?>" class="btn btn-warning">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Movie Name</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" id="delete_id">
                                                    Are you sure you want to delete it?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>                                        
                                                    <a href="<?= base_url('DirectorController/delete/'.$row['id'] ) ?>" class="btn btn-primary">
                                                        Delete
                                                    </a>                                                                                   
                                                </div>
                                        </div>
                                    </div>
                                </div>
                    </td>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->include('data/admin-operation-bottom.php') ?>