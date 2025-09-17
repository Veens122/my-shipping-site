  <div class="main-content">
      <header class="sticky-top bg-white border-bottom">
          <div class="container-fluid">
              <div class="d-flex align-items-center justify-content-between py-2">
                  <div class="d-flex align-items-center">
                      <button id="mobile-menu-button" class="btn d-md-none me-2">
                          <i class="fas fa-bars"></i>
                      </button>
                      <div class="input-group" style="width: 200px;">
                          <span class="input-group-text bg-transparent border-end-0">
                              <i class="fas fa-search"></i>
                          </span>
                          <input type="text" class="form-control border-start-0" placeholder="Search shipments...">
                      </div>
                  </div>
                  <div class="d-flex align-items-center gap-3">
                      <button class="btn position-relative">
                          <i class="fas fa-bell text-muted"></i>
                          <span
                              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                      </button>

                      <div class="dropdown">
                          <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown"
                              data-bs-toggle="dropdown">
                              <!-- <img class="rounded-circle me-2" src="https://randomuser.me/api/portraits/men/1.jpg"
                                  width="32" height="32" alt="User"> -->
                              <span class="d-none d-md-inline">Admin</span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><a class="dropdown-item" href="#">Settings</a></li>


                              <form action="{{ route('admin.logout') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="dropdown-item logout-btn ">
                                      Logout
                                  </button>
                              </form>

                          </ul>
                      </div>


                  </div>
              </div>
          </div>
      </header>