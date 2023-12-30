<li class="menu-item {{ (request()->is('dashboard/search-members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/search-members') }}" class="menu-link"><i class="menu-icon fas fa-search"></i><span class="menu-text"> Search Members </span></a></li>

<li class="menu-section ">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
@role('master-administrator|administrator|user-event')
<li class="menu-item {{ (request()->is('dashboard/events*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/events') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Events </span></a></li>
@endrole
@role('master-administrator')
<li class="menu-item {{ (request()->is('dashboard/e-commerce*')) ? 'menu-item-active' : '' }}"><a href="javascript:void(0);" onClick="alert('Maintenance!')" class="menu-link"><i class="menu-icon fas fa-balance-scale"></i><span class="menu-text"> E-Commerce </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/invoices*')) ? 'menu-item-active' : '' }}"><a href="javascript:void(0);" onClick="alert('Maintenance!')" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Invoices </span></a></li>
@endrole

@role('master-administrator|administrator|administrator-family')
<li class="menu-section ">
  <h4 class="menu-text"> FAMILY </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/family/members*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/family/members') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Members </span></a></li>
@endrole

@role('master-administrator|administrator-agency')
<li class="menu-section ">
  <h4 class="menu-text"> AGENCY </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/agency/broadcasters*')) ? 'menu-item-active' : '' }}"><a href="javascript:void(0);" onClick="alert('Maintenance!')" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Broadcasters </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/agency/reports*')) ? 'menu-item-active' : '' }}"><a href="javascript:void(0);" onClick="alert('Maintenance!')" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Reports </span></a></li>
@endrole
