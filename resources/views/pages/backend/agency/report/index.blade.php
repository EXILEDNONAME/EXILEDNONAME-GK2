@extends('layouts.default')
@section('title', 'Schedule Events')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ url_previous() }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" data-target="#qrcode_modal"><i class="fas fa-qrcode"></i></a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <ul class="nav nav-hover flex-column">
                <li class="nav-item">
                  <a href="{{ URL::current() }}/edit" class="nav-link">
                    <i class="nav-icon flaticon2-contract"></i>
                    <span class="nav-text"> {{ __('default.label.edit') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body" style="">
        <div class="table-responsive">
          @php $beans_758336694 = 0; @endphp
          <table width="100%" class="table table-bordered table-checkable" id="exilednoname_table">
            <tr>
              <td> ID </td>
              <td> Time(h) </td>
              <td> Beans </td>
            </tr>
            @foreach($slug as $slug)
            @php
            $slug_1 = $slug['1'];
            @endphp
            <tr>
              <td> {{ $slug_1 }} </td>

            </tr>
            @endforeach

          </table>

            </div>
          </div>

        </div>
      </div>
    </div>
    @endsection
