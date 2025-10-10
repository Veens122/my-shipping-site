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
                     <!-- <div class="dropdown">
                         <button class="btn position-relative notification-btn" type="button" id="notificationDropdown"
                             data-bs-toggle="dropdown">
                             <i class="fas fa-bell text-muted"></i>
                             <span
                                 class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                         </button>
                         <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                             aria-labelledby="notificationDropdown">
                             <li class="dropdown-item-text fw-bold px-3 py-2 border-bottom">Notifications</li>
                             <li>
                                 <div class="notification-item notification-unread">
                                     <div class="d-flex justify-content-between align-items-start">
                                         <div class="me-3">
                                             <i class="fas fa-shipping-fast text-primary"></i>
                                         </div>
                                         <div class="flex-grow-1">
                                             <p class="mb-1">Shipment #12345 has been delivered</p>
                                             <small class="notification-time">10 minutes ago</small>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="notification-item notification-unread">
                                     <div class="d-flex justify-content-between align-items-start">
                                         <div class="me-3">
                                             <i class="fas fa-exclamation-triangle text-warning"></i>
                                         </div>
                                         <div class="flex-grow-1">
                                             <p class="mb-1">Delay reported for shipment #67890</p>
                                             <small class="notification-time">1 hour ago</small>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="notification-item">
                                     <div class="d-flex justify-content-between align-items-start">
                                         <div class="me-3">
                                             <i class="fas fa-check-circle text-success"></i>
                                         </div>
                                         <div class="flex-grow-1">
                                             <p class="mb-1">New user registration approved</p>
                                             <small class="notification-time">2 hours ago</small>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="notification-item">
                                     <div class="d-flex justify-content-between align-items-start">
                                         <div class="me-3">
                                             <i class="fas fa-info-circle text-info"></i>
                                         </div>
                                         <div class="flex-grow-1">
                                             <p class="mb-1">System maintenance scheduled</p>
                                             <small class="notification-time">Yesterday</small>
                                         </div>
                                     </div>
                                 </div>
                             </li>
                             <li class="dropdown-item-text text-center py-2 border-top">
                                 <a href="#" class="text-primary">View all notifications</a>
                             </li>
                         </ul>
                     </div> -->

                     <div class="dropdown">
                         <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown"
                             data-bs-toggle="dropdown">
                             <div class="user-avatar me-2">A</div>
                             <span class="d-none d-md-inline">Admin</span>
                         </button>
                         <ul class="dropdown-menu dropdown-menu-end">
                             <li><a class="dropdown-item" href="{{ route('admin.profile.my-profile') }}"><i
                                         class="fas fa-user me-2"></i>Profile</a></li>
                             <li><a class="dropdown-item" href="{{ route('admin.profile.profile-edit') }}"><i
                                         class="fas fa-cog me-2"></i>Settings</a></li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li>
                                 <form action="{{ route('admin.logout')}}" method="POST">
                                     @csrf
                                     <button type="submit" class="dropdown-item logout-btn">
                                         <i class="fas fa-sign-out-alt me-2"></i>Logout
                                     </button>
                                 </form>
                             </li>

                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </header>