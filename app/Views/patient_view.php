<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zenonco - CRUD Example - View Patients</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="/assets/css/bootstrap-editable.css" rel="stylesheet"/>

</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/patient-form') ?>" class="btn btn-success mb-2">Add patient</a>
	</div>
  <div class="mt-3">
     <table class="table table-bordered" id="patients-list">
       <thead>
          <tr>
             <th>Patient ID</th>
             <th>Name</th>
             <th>Medical ID</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($patients): ?>
          <?php foreach($patients as $patient): ?>
          <tr>
             <td><?php echo $patient['ID']; ?></td>
             <td><a class="x-edit" id="name" data-type="text" data-pk="<?php echo $patient['ID']; ?>" data-entity='name' data-url="<?= site_url('/PatientCrud/ajax_editable');?>" data-title="Enter Full Name"><?php echo $patient['name']; ?></a></td>
             <td><a class="x-edit" id="medical_id" data-type="text" data-pk="<?php echo $patient['ID']; ?>" data-entity='medical_id' data-url="<?= site_url('/PatientCrud/ajax_editable');?>" data-title="Enter Medical ID"><?php echo $patient['medical_id']; ?></a></td>
             <td>
              <a href="<?php echo base_url('edit-view/'.$patient['ID']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete/'.$patient['ID']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/bootstrap-editable.min.js"></script>
<script>
    $(document).ready( function () {
      $('#patients-list').DataTable();
      $('.x-edit').editable();

  } );
</script>
</body>
</html>