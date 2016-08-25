<?php $pageTitle = "Event Manager" ?>

<?php require_once ('partials/header.php'); ?>

    <div class="container-fluid">
        <section class="col .col-xs-12 .col-sm-6 .col-md-8 col-lg-12 main">
            <h3 class="text-primary">Manage Event </h3><hr>

            <table class="table table-striped table-bordered table-responsive">
                <thead>
                <tr><th>Event Name</th>
                    <th>Venue</th>
                    <th>City</th>
                    <th>Planner</th>
                    <th>Drink</th>
                    <th>Sponsor</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody id="event-list">
                <tr>
                    <td><div>Year End Party</div></td>
                    <td> <div>Casino</div> </td>
                    <td> <div>Jozi</div> </td>
                    <td>Nicole</td>
                    <td>Caviar</td>
                    <td>GTC</td>
                    <td>Year End Party of 2016</td>
                    <td style="width: 5%; "><button><i class="btn-danger fa fa-times"></i></button></td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>


<?php require_once ('partials/footer.php'); ?>