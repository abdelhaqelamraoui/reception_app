
<div class="container-fluid d-flex align-items-center justify-content-center" id="form-container">
  <form method="post" class="border border-info p-5 pb-4 rounded">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <label for="first-name" class="col-sm form-label ps-0 m-0">First name</label>
      <input type="text" name="first-name" id="first-name" class="col-sm form-control" pattern="(\w| ){4,}" required>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
      <label for="first-name" class="col-sm form-label ps-0 m-0">Last name</label>
      <input type="text" name="last-name" id="last-name" class="col-sm form-control" pattern="(\w| ){4,}" required>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <label for="first-name" class="col-sm form-label ps-0 m-0">Username</label>
      <input type="text" name="username" id="username" class="col-sm form-control" pattern=".{4,}" required>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <label for="first-name" class="col-sm form-label ps-0 m-0">Password</label>
      <input type="text" name="password" id="password" class="col-sm form-control" pattern="\S{4,}" required>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <label for="first-name" class="col-sm form-label ps-0 m-0">Confirm Password</label>
      <input type="text" name="confirm" id="confirm" class="col-sm form-control" pattern="\S{4,}" required>
    </div>
    
    <div class="text-center mt-4">
      <button type="submit" name="submit" id="submit" class="btn btn-success px-5">Submit</button>
    </div>
  </form>
</div>