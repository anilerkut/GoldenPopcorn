<!-- NEWS ADD -->
<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- Link or content ??? -->
                <label for="inputNewsLink">News Link</label>
                <input type="text" class="form-control" id="inputNewsLink">
            </div>
            <div class="form-group col-md-6">
                <label for="inputBirthdate">News Date</label>
                <input type="date" class="form-control" id="inputBirthdate">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputActor">Related Actor</label>
                <select id="inputActor" class="form-control">
                    <option selected>Choose An Actor</option>
                    <option>Actor - FirstName LastName</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDirector">Related Director</label>
                <select id="inputDirector" class="form-control">
                    <option selected>Choose An Director</option>
                    <option>Director - FullName</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>