<!-- Tüm Actor'ları Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <a href="<?= base_url('movie-category-add') ?>" class="btn btn-primary mt-3 btn-lg" >
                            <i class="fas fa-plus"></i>
    </a>

    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Category ID</th>
            <th scope="col">Movie ID</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $num=1;
         foreach ($categories as $row) : ?>
        <tr>
            <th scope="row"><?= $num ?></th>
            <td><?= $row['category_id'] ?></td>
            <td><?= $row['movie_id'] ?></td>
            <?php $num++ ?>
            <td>
                <table>
                    <td>
                        <a href="<?= base_url('MovieCategoryController/edit/'.$row['id'] ) ?>" class="btn btn-warning">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal-<?=$row['id']?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-<?=$row['id']?>" tabindex="-1"  
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Movie Category </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete it?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('MovieCategoryController/delete/'.$row['id'] ) ?>" class="btn btn-primary">
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

<?= $this->include('data/admin-operation-bottom.php')?>