<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Audit Logs</title>
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
                 <h3>Audit Logs</h3>
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
                      <option value="user_agent">Agent</option>
                      <option value="created_at">Date</option>
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
                  <th scope="col" style="width: 55%;">Action</th>
                  <th scope="col" style="width: 25%;">User Agent</th>
                  <th scope="col" style="width: 20%;">Date</th>
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


<?php include 'footer.php'; ?>
<script src="../static/js/read-audit.js"></script>

  </body>
</html>
