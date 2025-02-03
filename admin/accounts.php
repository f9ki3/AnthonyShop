<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <?php include 'header.php'; ?>    
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">

        <div class="container g-3 p-3">
          <div id="accounts-table-div" class="col-12">
            <div class="row">
              <div class="col-12 col-md-6">
                 <h3>Employee Accounts</h3>
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center gap-2">
                  <div class="input-group flex-grow-1">
                      <input type="text" id="search-input" placeholder="Search account" class="form-control">
                      <button class="btn btn-dark border" id="search-btn">
                          <i class="bi bi-search"></i> Search
                      </button>
                  </div>
                  
                  <button class="btn border d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add-account">
                      <i class="bi bi-plus"></i> Create
                  </button>

                  <select class="form-select w-auto" id="sortTypeAccount">
                      <option selected value="id">Sort Type</option>
                      <option value="name">Name</option>
                      <option value="email">Email</option>
                      <option value="address">Address</option>
                  </select>

                  <select class="form-select w-auto" id="sortOrderAccount">
                      <option selected value="DESC">Order By</option>
                      <option value="ASC">Asc</option>
                      <option value="DESC">Desc</option>
                  </select>

              </div>

            </div>

            <table class="table table-hover mt-3">
              <thead>
                <tr>
                  <th scope="col" style="width: 20%;">Name</th>
                  <th scope="col" style="width: 20%;">Email</th>
                  <th scope="col" style="width: 5%;">Contact</th>
                  <th scope="col" style="width: 20%;">Address</th>
                  <th scope="col" class="text-end" style="width: 40%;">Action</th>
                </tr>
              </thead>
              <tbody id="account-table">
                <!-- Dynamically populated rows will go here -->
              </tbody>
            </table>

            <div>
              <button id="previous" class="btn btn-outline-dark" disabled>Previous</button>
              <button id="next" class="btn btn-outline-dark">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Account Modal -->
    <div class="modal fade" id="add-account" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addAccountModalLabel">Create New Account</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="accountForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter first name">
                <div id="fnameError" class="text-danger"></div>
              </div>
              <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter last name">
                <div id="lnameError" class="text-danger"></div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
                <div id="emailError" class="text-danger"></div>
              </div>
              <div class="col-md-6">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter contact number">
                <div id="contactError" class="text-danger"></div>
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address">
                <div id="addressError" class="text-danger"></div>
              </div>
              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
                <div id="passwordError" class="text-danger"></div>
              </div>
            </div>
          </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-dark" id="saveAccountBtn">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Account Modal -->
    <div class="modal fade" id="edit-employee" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="editAccountModalLabel">Edit Account</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="edit-accountForm">
                      <input type="hidden" name="" id="edit-employee-id">
                      <div class="row g-3">
                          <div class="col-md-6">
                              <label for="edit-fname" class="form-label">First Name</label>
                              <input type="text" class="form-control" id="edit-fname" placeholder="Enter first name">
                              <div id="edit-fnameError" class="text-danger"></div>
                          </div>
                          <div class="col-md-6">
                              <label for="edit-lname" class="form-label">Last Name</label>
                              <input type="text" class="form-control" id="edit-lname" placeholder="Enter last name">
                              <div id="edit-lnameError" class="text-danger"></div>
                          </div>
                          <div class="col-md-6">
                              <label for="edit-email" class="form-label">Email</label>
                              <input type="email" class="form-control" id="edit-email" placeholder="Enter email">
                              <div id="edit-emailError" class="text-danger"></div>
                          </div>
                          <div class="col-md-6">
                              <label for="edit-contact" class="form-label">Contact</label>
                              <input type="text" class="form-control" id="edit-contact" placeholder="Enter contact number">
                              <div id="edit-contactError" class="text-danger"></div>
                          </div>
                          <div class="col-md-6">
                              <label for="edit-address" class="form-label">Address</label>
                              <input type="text" class="form-control" id="edit-address" placeholder="Enter address">
                              <div id="edit-addressError" class="text-danger"></div>
                          </div>
                          <div class="col-md-6">
                              <label for="edit-username" class="form-label">Username</label>
                              <input type="text" class="form-control" id="edit-username" placeholder="Enter username">
                              <div id="edit-usernameError" class="text-danger"></div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-dark" onclick="saveEditEmployee()">Save changes</button>
              </div>
          </div>
      </div>
  </div>


    <!-- Delete Account Modal -->
    <div class="modal fade" id="delete-employee" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="del-id-employee">
                    <h5>Are you sure you want to delete this account?</h5>
                </div>
                <div class="row g-3 p-3 pb-3">
                  <div class="col-6">
                      <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">No</button>
                  </div>
                  <div class="col-6">
                      <button type="button" class="btn btn-dark w-100" onclick="delete_employee_yes()">Yes</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="change-password" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changePasswordModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="change-password-form">
                    <input type="text" name="id" id="edit-employee-id-update" hidden>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="new-password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new-password" placeholder="Enter new password" required>
                            <div id="new-passwordError" class="text-danger"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="admin-password" class="form-label">Admin Password</label>
                            <input type="password" class="form-control" id="admin-password" placeholder="Enter admin password" required>
                            <div id="admin-passwordError" class="text-danger"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark" onclick="saveChangePassword()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<script src="../static/js/add-employee.js"></script>
<script src="../static/js/read-employee.js"></script>

  </body>
</html>
