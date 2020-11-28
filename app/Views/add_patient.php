<!DOCTYPE html>
<html>

<head>
  <title>Zenonco - CRUD Example - Add Patient</title>
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
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/submit-form') ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Medical ID</label>
        <input type="text" name="medical_id" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Add Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
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
            required: "Medical ID is required.",
            maxlength: "The medical id should not exceed 60 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>