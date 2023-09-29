<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
  <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

    <div class="d-flex align-items-baseline flex-wrap mr-5">
      <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        @if (!empty($page) && $page == 'dashboard')
        <li class="breadcrumb-item"><a href="/dashboard"><i class="menu-icon fas fa-desktop"></i></a></li>
        <li class="breadcrumb-item"><span class="text-muted"> Dashboard </span></li>
        @elseif (!empty($page) && $page == 'log')
        <li class="breadcrumb-item"><a href="/dashboard"><i class="menu-icon fas fa-desktop"></i></a></li>
        <?php $link = "" ?>
        @for($i = 2; $i <= count(Request::segments()); $i++)
        @if($i < count(Request::segments()) & $i > 0)
        <?php $link .= "/" . Request::segment($i); ?>
        <li class="breadcrumb-item"><a href="/dashboard/developments"> Developments </a></li>
        @else
        <li class="breadcrumb-item"><span class="text-muted"> {{ucwords(str_replace('-',' ',Request::segment($i)))}} </span></li>
        @endif
        @endfor
        @else
        <li class="breadcrumb-item"><a href="/dashboard"><i class="menu-icon fas fa-desktop"></i></a></li>
        <?php $link = "" ?>
        @for($i = 2; $i <= count(Request::segments()); $i++)
        @if($i < count(Request::segments()) & $i > 0)
        <?php $link .= "/" . Request::segment($i); ?>
        <li class="breadcrumb-item"><a href="/dashboard<?= $link ?>"> {{ ucwords(str_replace('-',' ',Request::segment($i)))}} </a></li>
        @else
        <li class="breadcrumb-item"><span class="text-muted"> {{ucwords(str_replace('-',' ',Request::segment($i)))}} </span></li>
        @endif
        @endfor
        @endif
      </ul>
    </div>

    @if(!empty($page) && $page == 'index')
    <div class="d-flex align-items-center">
      <!-- <a href="{{ URL::Current() }}/activities"><button type="button" class="btn btn-light-primary btn-icon btn-sm mr-1"><i class="menu-icon fas fa-history"></i></button></a> -->
      <a href="{{ URL::Current() }}/trash"><button type="button" class="btn btn-light-primary btn-icon btn-sm"><i class="menu-icon fas fa-trash"></i></button></a>
    </div>
    @endif

    @if(!empty($page) && $page == 'statistics')
    <div class="d-flex align-items-center">
      <a href="{{ URL::Current() }}/logs">
        <button type="button" class="btn btn-light-primary btn-icon btn-sm mr-1" data-toggle="tooltip" data-original-title="Logs"><i class="menu-icon fas fa-history"></i></button>
      </a>
    </div>
    @endif

  </div>
</div>
