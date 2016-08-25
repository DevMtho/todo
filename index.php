<?php $pageTitle ="Create Event"; ?>


<?php require_once ('partials/header.php'); ?>


<div class="container-fluid">
    <section class="col .col-xs-12 .col-sm-6 .col-md-8 col-lg-6">
        <h3 class="text-primary">Create new event </h3><hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Event Name</label>
                <div class="col-md-10">
                    <input name="name" class="form-control" id="name" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="vname" class="col-md-2 control-label">Venue Name</label>
                <div class="col-md-10">
                    <input name="vname" class="form-control" id="vname" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="city" class="col-md-2 control-label">City</label>
                <div class="col-md-10">
                    <input name="city" class="form-control" id="city" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="creator" class="col-md-2 control-label">Event Planner</label>
                <div class="col-md-10">
                    <input name="creator" class="form-control" id="creator" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="drink" class="col-md-2 control-label">Complementary Drink</label>
                <div class="col-md-10">
                    <input name="drink" class="form-control" id="drink" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="sponsor" class="col-md-2 control-label">Event Sponsor</label>
                <div class="col-md-10">
                    <input name="sponsor" class="form-control" id="sponsor" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Description</label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                </div>
            </div>
            <button type="submit" name="createBtn" class="btn btn-success pull-right">
                Create Event <i class="fa fa-plus"></i></button>
        </form>
    </section>
</div>




<?php require_once ('partials/footer.php'); ?>






