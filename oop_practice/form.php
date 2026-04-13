

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Form with Storage</title>
</head>
<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">User Information Form</h2>

<!-- ===== FORM ===== -->
<form class="row g-3 bg-white p-4 rounded shadow" method="POST">

  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>

  <div class="col-12">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" name="address" required>
  </div>

  <div class="col-12">
    <label class="form-label">Address 2</label>
    <input type="text" class="form-control" name="address2">
  </div>

  <div class="col-md-6">
    <label class="form-label">City</label>
    <input type="text" class="form-control" name="city" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">State</label>
    <select class="form-select" name="state" required>
      <option value="">Choose...</option>
      <option>Dhaka</option>
      <option>Chittagong</option>
      <option>Khulna</option>
    </select>
  </div>

  <div class="col-md-2">
    <label class="form-label">Zip</label>
    <input type="text" class="form-control" name="zip" required>
  </div>

  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
  </div>

</form>

<!-- ===== TABLE SHOW DATA ===== -->
<div class="mt-5">
<h3 class="text-center">Saved Data</h3>

<table class="table table-bordered table-striped mt-3 bg-white">
<tr>
    <th>Email</th>
    <th>Password</th>
    <th>Address</th>
    <th>Address2</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
</tr>

<?php
if(file_exists("data.txt")){
    $rows = file("data.txt");

    foreach($rows as $row){
        $col = explode(",", $row);

        echo "<tr>
            <td>$col[0]</td>
            <td>$col[1]</td>
            <td>$col[2]</td>
            <td>$col[3]</td>
            <td>$col[4]</td>
            <td>$col[5]</td>
            <td>$col[6]</td>
        </tr>";
    }
}
?>

</table>
</div>

</div>

</body>
</html>