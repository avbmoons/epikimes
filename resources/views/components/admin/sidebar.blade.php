<div class="sidebar">
  <div class="sidebar-menu-block">
    <div class="sidebar-menu-box" id="menuStart">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 20V4" stroke="#295173" stroke-width="2.8" />
        <path d="M17 20L17 13" stroke="#295173" stroke-width="2.8"/>
        <path d="M7 20L7 9" stroke="#295173" stroke-width="2.8" />
      </svg>
      <a href="{{ route('admin.index') }}" class="btn-menu-item @if(request()->routeIs('admin.index')) active @endif" >Start</a>
    </div>
    <div class="sidebar-menu-box" id="menuCategories">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 4V18C3 18.5304 3.21071 19.0391 3.58579 19.4142C3.96086 19.7893 4.46957 20 5 20H19C19.5304 20 20.0391 19.7893 20.4142 19.4142C20.7893 19.0391 21 18.5304 21 18V8H17" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M3 4H17V18C17 18.5304 17.2107 19.0391 17.5858 19.4142C17.9609 19.7893 18.4696 20 19 20M13 8H7M13 12H9" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="{{ route('admin.categories.index') }}" class="btn-menu-item @if(request()->routeIs('admin.categories.index')) active @endif">Categories</a>
    </div>
    <div class="sidebar-menu-box" id="menuColors">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 2H20C21.103 2 22 2.897 22 4V16C22 17.103 21.103 18 20 18H17V21.767L10.723 18H4C2.897 18 2 17.103 2 16V4C2 2.897 2.897 2 4 2ZM4 16H11.277L15 18.233V16H20V4H4V16Z" fill="#295173"/>
        <line x1="11.5" y1="14.5" x2="11.5" y2="10.5" stroke="#1B1357" stroke-width="2" stroke-linecap="round"/>
        <circle cx="11.5" cy="6.5" r="1.5" fill="#295173"/>
      </svg>
      <a href="{{ route('admin.colors.index') }}" class="btn-menu-item @if(request()->routeIs('admin.colors.index')) active @endif">Colors</a>
    </div> 
    <div class="sidebar-menu-box" id="menuCatalog">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H20C21.1 21 22 20.1 22 19V5C22 3.9 21.1 3 20 3ZM4 19V5H20V19H4Z" fill="#1B1357"/>
        <path d="M13 8.00004H18V10H13V8.00004ZM8.00004 8.59004L6.96004 7.54004L5.54004 8.96004L8.00004 11.41L11.46 7.96004L10.04 6.54004L8.00004 8.59004ZM13 14H18V16H13V14ZM8.00004 14.59L6.96004 13.54L5.54004 14.96L8.00004 17.41L11.46 13.96L10.04 12.54L8.00004 14.59Z" fill="#295173"/>
      </svg>
      <a href="{{ route('admin.catalog.index') }}" class="btn-menu-item @if(request()->routeIs('admin.catalog.index')) active @endif">Catalog</a>
    </div>           
    <div class="sidebar-menu-box" id="menuPageElements">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 8.22222L11 2L19 8.22222V18C19 18.4715 18.8127 18.9237 18.4793 19.2571C18.1459 19.5905 17.6937 19.7778 17.2222 19.7778H4.77778C4.30628 19.7778 3.8541 19.5905 3.5207 19.2571C3.1873 18.9237 3 18.4715 3 18V8.22222Z" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M8.33331 19.7778V10.8889H13.6666V19.7778" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="{{ route('admin.elements.index') }}" class="btn-menu-item @if(request()->routeIs('admin.elements.index')) active @endif">Page elements</a>
    </div>
    <div class="sidebar-menu-box" id="menuImagesCleaner">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 6.74997V17.25C22 18.25 21.46 19.12 20.66 19.6L21.78 20.72L20.72 21.78L2.22 3.27997L3.28 2.21997L5.05999 3.99997H19.25C19.9789 4.00129 20.6776 4.29145 21.1931 4.80689C21.7085 5.32233 21.9987 6.02103 22 6.74997ZM20.5 6.74997C20.5 6.05997 19.94 5.49997 19.25 5.49997H6.55999L13.25 12.19L15.115 10.325C15.3508 10.0923 15.6687 9.96184 16 9.96184C16.3313 9.96184 16.6492 10.0923 16.885 10.325L20.5 13.94V6.74997ZM16 11.56L14.31 13.25L19.525 18.465C20.085 18.34 20.5 17.845 20.5 17.25V16.06L16 11.56ZM4.63299 18.49C4.67033 18.496 4.70933 18.4993 4.74999 18.5H15.315L16.815 20H4.74499C4.01606 19.9987 3.31735 19.7085 2.80191 19.1931C2.28647 18.6776 1.99632 17.9789 1.995 17.25V6.74997C1.995 6.29497 2.11 5.86997 2.305 5.48997L3.505 6.68997C3.505 6.70997 3.49999 6.74997 3.49999 6.74997V17.26C3.49999 17.315 3.505 17.375 3.515 17.43L7.865 13.08C8.10079 12.8473 8.41873 12.7168 8.74999 12.7168C9.08126 12.7168 9.3992 12.8473 9.635 13.08L12.06 15.505L11 16.565L8.74999 14.315L4.57999 18.485L4.63299 18.49Z" fill-rule="evenodd" clip-rule="evenodd" fill="#295173"/>
      </svg>
      {{-- <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 2H20C21.103 2 22 2.897 22 4V16C22 17.103 21.103 18 20 18H17V21.767L10.723 18H4C2.897 18 2 17.103 2 16V4C2 2.897 2.897 2 4 2ZM4 16H11.277L15 18.233V16H20V4H4V16Z" fill="#295173"/>
        <line x1="6.75" y1="8.25" x2="14.25" y2="8.25" stroke="#295173" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="9.75" y1="11.25" x2="14.25" y2="11.25" stroke="#295173" stroke-width="1.5" stroke-linecap="round"/>
      </svg> --}}
      <a href="{{ route('admin.images-cleaner.index') }}" class="btn-menu-item @if(request()->routeIs('admin.images-cleaner.index')) active @endif">Images cleaner</a>
    </div>
    <div class="sidebar-menu-box" id="menuUsers">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 13C11.2091 13 13 11.2091 13 9C13 6.79086 11.2091 5 9 5C6.79086 5 5 6.79086 5 9C5 11.2091 6.79086 13 9 13Z" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M16 19C16 15.686 12.866 13 9 13C5.134 13 2 15.686 2 19M15 13C15.6684 13 16.3261 12.8324 16.9131 12.5127C17.5 12.193 17.9975 11.7313 18.3601 11.1698C18.7227 10.6083 18.9388 9.96494 18.9886 9.29841C19.0385 8.63189 18.9205 7.9635 18.6456 7.3543C18.3706 6.7451 17.9473 6.21453 17.4144 5.81105C16.8816 5.40757 16.2561 5.14404 15.5952 5.04456C14.9342 4.94507 14.2589 5.01279 13.6309 5.24154C13.0028 5.47028 12.4421 5.85275 12 6.354" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M22 19C22 15.686 18.866 13 15 13C14.193 13 12.897 12.707 12 11.765" stroke="#295173" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="{{ route('admin.users.index') }}" class="btn-menu-item @if(request()->routeIs('admin.users.index')) active @endif">Users</a>
    </div>
    <div class="sidebar-menu-box" id="menuMails">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="#295173"/>
      </svg>
      <a href="{{ route('admin.mails.index') }}" class="btn-menu-item @if(request()->routeIs('admin.mails.index')) active @endif">Mails</a>
    </div>
    <div class="sidebar-menu-box" id="menuNotifications">
      <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 2H20C21.103 2 22 2.897 22 4V16C22 17.103 21.103 18 20 18H17V21.767L10.723 18H4C2.897 18 2 17.103 2 16V4C2 2.897 2.897 2 4 2ZM4 16H11.277L15 18.233V16H20V4H4V16Z" fill="#295173"/>
        <line x1="11.5" y1="14.5" x2="11.5" y2="10.5" stroke="#1B1357" stroke-width="2" stroke-linecap="round"/>
        <circle cx="11.5" cy="6.5" r="1.5" fill="#295173"/>
      </svg>
      <a href="{{ route('admin.notifications.index') }}" class="btn-menu-item @if(request()->routeIs('admin.notifications.index')) active @endif">Notifications</a>
    </div>
  </div>
</div>