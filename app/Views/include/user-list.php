<!-- Tüm User'ları Listele -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">User First Name</th>
            <th scope="col">User Last Name</th>
            <th scope="col">User Register Date</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>11/12/2021</td>
            <td>
                <a href="#" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>