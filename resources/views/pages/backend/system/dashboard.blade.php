@extends('layouts.default', ['page' => 'dashboard'])
@push('title', 'Dashboard')

@push('layout-content')
@if ($message = Session::get('success'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-success" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-error" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif
@endpush

@push('dashboard-widget')
<div class="row">
  <div class="col-lg-6">
    <div class="d-flex flex-column-fluid">
      <div class="container-fluid">
        <div class="card card-custom gutter-b" data-card="true">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label"> Family Events </h3>
            </div>
            <div class="card-toolbar">
              <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
            </div>
          </div>
          <div class="card-body">

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/events/content-challenges" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Content Challenges </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/events/content-challenges" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/events/content-festivals" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Content Festivals (ICF) </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/events/content-festivals" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/events/e-commerce" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • E-Commerce </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/events/e-commerce" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/events/special-talent-live-house" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Special Talent Live House </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/events/special-talent-live-house" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="d-flex flex-column-fluid">
      <div class="container-fluid">
        <div class="card card-custom gutter-b" data-card="true">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label"> Family PK </h3>
            </div>
            <div class="card-toolbar">
              <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
            </div>
          </div>
          <div class="card-body">

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/pk/epical-glory" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Epical Glory </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/pk/epical-glory" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/pk/party" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Party </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/pk/party" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

            <div class="d-flex flex-wrap align-items-center">
              <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="/dashboard/pk/weekend" target="_blank" class="text-dark-75 font-weight-bold text-hover-primary"> • Weekend </a>
              </div>
              <div class="d-flex align-items-center mt-lg-0">
                <a href="/dashboard/pk/weekend" target="_blank" class="btn btn-icon btn-light btn-sm">
                  <i class="fas far fa-arrow-alt-circle-right"></i>
                </a>
              </div>
            </div>
            <hr>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endpush
