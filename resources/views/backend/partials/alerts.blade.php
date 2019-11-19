<style>
    #alertSuccess, #alertError {
        position: fixed;
        left: 40%;
        width: 25%;
        z-index: 1000;
        /*display: none;*/
    }
</style>

@if ($message = Session::get('success'))

    <div id="alertError" class="alert alert-primary icons-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled"></i>
        </button>
        <p><strong>Success!</strong> Save data success...</p>
    </div>

@endif

@if ($message = Session::get('error'))

    <div id="alertSuccess" class="alert alert-danger icons-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled"></i>
        </button>
        <p><strong>Error!</strong> Error save data...</p>
    </div>

@endif
