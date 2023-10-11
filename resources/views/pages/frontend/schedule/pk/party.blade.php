<html>
<head>
  <meta charset="utf-8"/>
  <title> EXILEDNONAME </title>
  <meta name="description" content="Schedules"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <br>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="5"> BIGO PK PARTY (MANUAL SHEETS) </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_pk_party as $data_pk_party)
          <tr>
            @if(str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥'))
            <td class="align-middle text-nowrap text-center" width="200px"> PK PARTY {{ env('DATE_PK_PARTY')}} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ \Carbon\Carbon::parse($data_pk_party['1'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['2'] . ' (' . $data_pk_party['4'] . ')' }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['13'] }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['14'] . ' (' . $data_pk_party['16'] . ')' }} </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
