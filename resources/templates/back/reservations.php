<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Reservations

</h1>
<h4 class="bg-success text-center"><?php display_message(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>id</th>
           <th>Property Title</th>
           <th>Reservation fee</th>
           <th>Units</th>
           <th>Monthly Rent</th>
      </tr>
    </thead>
    <tbody>
       <?php display_reservations(); ?>

    </tbody>
</table>
</div>
