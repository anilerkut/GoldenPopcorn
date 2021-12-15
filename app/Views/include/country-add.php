<!-- COUNTRY ADD -->
<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5" action="CountryController/addCountry">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCountryName">Country Name</label>
                <input type="text" class="form-control" id="inputCountryName" name="country_name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>