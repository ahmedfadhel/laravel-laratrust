<div class="admin-menu" id="admin-side-menu">
  <div class="admin-menu-header">
    <h3 class="is-pulled-left">Dashboard</h3>
    <span class="is-pulled-right">
      <i class="fa fa-exchange fa-fw fa-lg" style="padding-right:10px"></i>
    </span>
  </div>
  <aside class="menu p-t-45">
    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}">Users Settings</a></li>
      <li>
        <a >Manage ACL</a>
        <ul>
          <li><a  href="{{route('roles.index')}}">Roles</a></li>
          <li><a href="{{route('permissions.index')}}">Permissions</a></li>
        </ul>
        <li>
            <a >Manage Resources</a>
            <ul>
              <li><a>Images</a></li>
              <li><a>Videos</a></li>
              <li><a>Documens</a></li>
            </ul>
      </li>

    </ul>
   
  </aside>
</div>