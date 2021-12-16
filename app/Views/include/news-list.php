<!-- Tüm News'leri Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">News Content</th>
            <th scope="col">News Date</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid non veniam, vitae expedita est
                quaerat nemo, modi aperiam asperiores iure ducimus maxime omnis aliquam corrupti laborum itaque
                quidem quos possimus.</td>
            <td>11/12/2021</td>
            <td>
                <table>
                    <td>
                        <a href="#" class="btn btn-warning">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>