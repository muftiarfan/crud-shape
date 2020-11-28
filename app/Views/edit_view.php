<!DOCTYPE html>
<html>

<head>
  <title>Zenonco - CRUD Example - Edit patient</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="update_patient" name="update_patient" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="ID" id="id" value="<?php echo $patient_obj['ID']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $patient_obj['name']; ?>">
      </div>

      <div class="form-group">
        <label>Medical ID</label>
        <input type="text" name="medical_id" class="form-control" value="<?php echo $patient_obj['medical_id']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_patient").length > 0) {
      $("#update_patient").validate({
        rules: {
          name: {
            required: true,
          },
          medical_id: {
            required: true,
            maxlength: 60,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          medical_id: {
            required: "medical id is required.",
            maxlength: "The medical id should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>