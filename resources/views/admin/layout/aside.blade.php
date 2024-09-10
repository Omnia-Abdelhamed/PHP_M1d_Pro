<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav" class="pt-4">
          <li class="sidebar-item">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href="{{ route('home') }}"
              aria-expanded="false"
              ><i class="mdi mdi-view-dashboard"></i
              ><span class="hide-menu">Home</span></a
            >
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link has-arrow waves-effect waves-dark"
              href="javascript:void(0)"
              aria-expanded="false"
              ><i class="mdi mdi-receipt"></i
              ><span class="hide-menu">Students </span></a
            >
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="{{ route('students.index') }}" class="sidebar-link"
                  ><i class="mdi mdi-note-outline"></i
                  ><span class="hide-menu"> All Students </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{ route('students.create') }}" class="sidebar-link"
                  ><i class="mdi mdi-note-plus"></i
                  ><span class="hide-menu"> Add Student </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{ route('students.archive') }}" class="sidebar-link"
                  ><i class="mdi mdi-note-plus"></i
                  ><span class="hide-menu"> Archive </span></a
                >
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
