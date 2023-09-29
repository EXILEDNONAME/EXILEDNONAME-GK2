@extends('layouts.default', ['page' => 'statistics'])
@push('title', 'Statistics')

@push('layout-content')
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> {{ __('system.label.main') }} </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ URL::Current() }}/create" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-toggle="tooltip" data-original-title="{{ __('system.label.create') }}"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr>
            @foreach($headers as $key => $header)
            <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center align-middle' }}">
              @if ($key == 'date')
              <span class="badge badge-info">{{ $header }}</span>
              @else
              <span class="badge badge-level-{{ $key }}">
                <span title="{{ $header }}"> {{ log_styler()->icon($key) }} </span>
              </span>
              @endif
            </th>
            @endforeach
            <th scope="col" class="text-right">@lang('Actions')</th>
          </tr>
        </thead>
        <tbody>
          @forelse($rows as $date => $row)
          <tr>
            @foreach($row as $key => $value)
            <td class="{{ $key == 'date' ? 'text-left align-middle' : 'text-center align-middle' }}">
              @if ($key == 'date')
              <span class="badge badge-primary">{{ $value }}</span>
              @elseif ($value == 0)
              <span class="badge empty">{{ $value }}</span>
              @else
              <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                <span class="badge badge-level-{{ $key }}">{{ $value }}</span>
              </a>
              @endif
            </td>
            @endforeach
            <td class="text-right align-middle">
              <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-sm btn-info">
                <i class="fas fa-search"></i>
              </a>
              <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-sm btn-success">
                <i class="fas fa-download"></i>
              </a>
              <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-log-date="{{ $date }}">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="11" class="text-center">
              <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $rows->render() }}

  </div>
</div>
@endpush
