@extends('layouts.default')
@section('title', 'Schedule Events')

@section('content')
@php
$data_1 = 50000;
$data_2 = 150000;
$total = $data_1 + $data_2;
$bank_account = 'BCA';
$bank_account_name = 'NAUFAL HAIDIR RIDHA';
$bank_account_number = '8416982';

@endphp
<div class="row">
  <div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Base Examples</h3>
        </div>
      </div>
      <div class="card-body">
        <!--begin::Example-->
        <div class="example">

          <div class="example-code">
            <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            <div class="example-highlight"><pre ><code class="language-html">
              Event : ICF <br>
              Content : Ngobrol <br>
              ID Bigo : 898985881 <br>
              Date : 22 November 2023, 21:00	
            </code>
          </pre>
        </div>
      </div>
    </div>
    <!--end::Example-->
  </div>
</div>
</div>
</div>

<div class="card card-custom overflow-hidden">
  <div class="card-body">
    <!-- begin: Invoice-->
    <!-- begin: Invoice header-->
    <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-5 px-5 py-md-5 px-md-0" style="background-image: url(/assets/backend/media/bg/bg-6.jpg);">

      <div class="col-md-10 mb-5">
        <h1 class="display-4 text-white font-weight-boldest mb-10">INVOICE</h1>
        <div class="d-flex flex-column flex-root text-white">
          <span class="font-weight-bolder">INVOICE NO.</span>
          <span class="opacity-70"> INV00001#GK-2023</span>
        </div>
      </div>

      <div class="col-md-10 mb-5">
        <div class="border-bottom w-100 opacity-20"></div>
        <div class="d-flex justify-content-between text-white pt-6">
          <div class="d-flex flex-column flex-root text-align-center">
            <span class="text-white d-flex flex-column opacity-70">
              <span> Batam, Kepulauan Riau </span>
              <span> Mobile : 081228827994 </span>
              <span> Email : newgasskeen001@gmail.com </span>
              <span> https://newgasskeen.com </span>
            </span>
          </div>
          <div class="d-flex flex-column flex-root text-right text-align-center">
            <a href="#">
              <img src="/assets/favicon.png" alt="" width="75px">
            </a>
          </div>
        </div>

      </div>

      <div class="col-md-10">
        <div class="border-bottom w-100 opacity-20"></div>

        <div class="d-flex justify-content-between text-white pt-6">
          <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolde"> DATE </span>
            <span class="opacity-70"> 17 November, 2023</span>
          </div>
          <div class="d-flex flex-column flex-root text-right">
            <span class="font-weight-bolder">INVOICE TO.</span>
            <span class="opacity-70"> Naufal Haidir Ridha </span>
          </div>
        </div>

      </div>

    </div>
    <!-- end: Invoice header-->

    <!-- begin: Invoice body-->
    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
      <div class="col-md-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="pl-0 font-weight-bold text-muted text-uppercase"> No. </th>
                <th class="pl-0 font-weight-bold text-muted text-uppercase">Description</th>
                <th class="text-right font-weight-bold text-muted text-uppercase"> Qty </th>
                <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>
                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
              </tr>
            </thead>
            <tbody>

              <tr class="font-weight-boldest">
                <td class="text-nowrap"> 1. </td>
                <td class="text-nowrap pl-0"> Bonus Agency Level E </td>
                <td class="text-right"> 1</td>
                <td class="text-right"> {{ $data_1 }} </td>
                <td class="text-danger pr-0 text-right"> {{ $data_1 }} </td>
              </tr>
              <tr class="font-weight-boldest">
                <td class="text-nowrap"> 2. </td>
                <td class="text-nowrap pl-0"> Bonus Family Level E </td>
                <td class="text-right"> 1</td>
                <td class="text-right"> {{ $data_2 }} </td>
                <td class="text-danger pr-0 text-right"> {{ $data_2 }} </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end: Invoice body-->

    <!-- begin: Invoice footer-->
    <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
      <div class="col-md-10">
        <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">

          <div class="table-responsive-lg col-md-10">
            <table width="100%">
              <tbody>
                <tr class="font-weight-boldest">
                  <td class="text-nowrap pl-0" width="1"> Bank Account </td>
                  <td class="text-danger text-right" width="100"> : </td>
                  <td class="text-danger pr-0 text-right"> {{ $bank_account }} </td>
                </tr>
                <tr class="font-weight-boldest">
                  <td class="text-nowrap pl-0"> Account Number </td>
                  <td class="text-danger text-right"> : </td>
                  <td class="text-danger pr-0 text-right"> {{ $bank_account_number }} </td>
                </tr>
                <tr class="font-weight-boldest">
                  <td class="text-nowrap pl-0"> Bank Account Name </td>
                  <td class="text-danger text-right"> : </td>
                  <td class="text-danger text-nowrap text-right pr-0"> {{ $bank_account_name }} </td>
                </tr>
              </tbody>
            </table>
          </div>


          <div class="d-flex flex-column text-right">
            <div class="border-bottom w-100 opacity-20"></div>
            <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span>
            <span class="font-size-h2 font-weight-boldest text-danger mb-1"> {{ $total }} </span>
            <span>Taxes Included</span>
          </div>

        </div>

      </div>
    </div>
    <!-- end: Invoice footer-->

    <!-- begin: Invoice action-->
    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
      <div class="col-md-10">
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
          <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
        </div>
      </div>
    </div>
    <!-- end: Invoice action-->

    <!-- end: Invoice-->
  </div>
</div>
@endsection
