<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class EventController extends Controller {

  use DefaultController;

  function __construct(Request $request) {
    $this->middleware('auth');
    $this->model = 'App\Models\Backend\Event';
    $this->path = 'pages.backend.event.';
    $this->url = '/dashboard/events';
    $this->sort = 1;

    $this->RequestStore = [
      'date'  => 'required|unique:events',
    ];

    $this->RequestUpdate = [
      'date'  => 'required|unique:events,date,' . $request->id,
    ];
  }

  public function downloadfile($id)
  {
    $data = $this->model::where('id', $id)->first();
    if ($data->event == 'ICF') { $myfile = public_path('/storage/report-events/ICF/' . \Carbon\Carbon::parse($data->date)->format('d-m-Y') . "/" . $data->ss_report); }
    if ($data->event == 'CONTENT CHALLENGE') { $myfile = public_path('/storage/report-events/CONTENT CHALLENGE/' . \Carbon\Carbon::parse($data->date)->format('d-m-Y') . "/" . $data->ss_report); }
    return response()->download($myfile);
  }

  public function wa_status_progress($id) {
    $data_1 = \DB::table('events')->where('id', $id)->first();
    $id_bigo = $data_1->id_bigo;
    $event = $data_1->event;
    $date_event = \Carbon\Carbon::parse($data_1->date)->format('d F Y, H:i');
    $data_3 = \DB::table('users')->where('username', $id_bigo)->first();
    $phone = $data_3->phone;



    $url = 'https://api.green-api.com/waInstance7103844448/sendMessage/8c0d5f8126e14b1f8b4f284696795d7f092fcac0c0554f4c8b';
    $data = array(
      'chatId' => $phone . '@c.us',
        'message' => "INFO EVENT 📢 \n\nJadwal " . $event . " kamu pada [" . $date_event . "] sudah di cek dan dikirimkan ke Admin Bigo, Jangan lupa live tepat waktu dan jangan lupa screenshot/record eventnya ya! \n\nSemangat Live-nya \nAdmin Agency 🖤"
    );

    $options = array(
      'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
      )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    echo $response;
  }

  public function wa_status_success($id) {
    $data_1 = \DB::table('events')->where('id', $id)->first();
    $id_bigo = $data_1->id_bigo;
    $event = $data_1->event;
    $date_event = \Carbon\Carbon::parse($data_1->date)->format('d F Y, H:i');
    $data_3 = \DB::table('users')->where('username', $id_bigo)->first();
    $phone = $data_3->phone;



    $url = 'https://api.green-api.com/waInstance7103844448/sendMessage/8c0d5f8126e14b1f8b4f284696795d7f092fcac0c0554f4c8b';
    $data = array(
      'chatId' => $phone . '@c.us',
        'message' => "INFO EVENT 📢 \n\nJadwal " . $event . " dan Screenshot Report kamu pada [" . $date_event . "] sudah di cek dan dikirimkan ke Admin Bigo, Event Selesai ✅ \n\nAdmin Agency 🖤"
    );

    $options = array(
      'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
      )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    echo $response;
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    $sort = $this->sort;

    if(Auth::user()->hasRole('master-administrator|administrator')) {
      if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [request('date_start'), request('date_end')])->get(); }
      else { $this->data = $this->model::orderby('date', 'desc')->get(); }
    }
    else {
      if (request('date_start') && request('date_end')) { $this->data = $this->model::where('id_bigo', Auth::User()->username)->orderby('date', 'desc')->whereBetween('date', [request('date_start'), request('date_end')])->get(); }
      else { $this->data = $this->model::orderby('date', 'desc')->where('id_bigo', Auth::User()->username)->get(); }
    }

    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('file_report', function ($order) {
        if($order->ss_report) {
          return '<a href="' . \URL::Current() . '/downloadfile/' . $order->id . '"><i class="far fa-file-image text-info"></i></a>';
        }
        else {
          return '-';
        }
        })
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'file_report'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $store = $request->all();
    foreach ($request->date as $data) {
      $store['date'] = \Carbon\Carbon::now()->format('Y') . '-'. $request->month . '-' . $data . ' ' . $request->time;
      if($this->model::where('date', $store['date'])->where('id_bigo', Auth::User()->username)->first()) {
        return back()->with('error', __('default.notification.error.item-duplicate-event'));
      }
      else {
        $this->model::create($store);
      }
    }

    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $path = $this->path;
    $model = $this->model;

    if ($this->model::where('id_bigo', Auth::user()->username)->first()) {
      $data = $this->model::findOrFail($id);
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }

    return view($this->path . 'edit', compact('path', 'data', 'model'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();

    if($request->hasFile('ss_report')){
      $filename = time() . '_' . $request->ss_report->getClientOriginalName();
      $request->file('ss_report')->move(public_path("storage/report-events/" . "/" . $request->event . "/" . \Carbon\Carbon::parse($request->date)->format('d-m-Y') . "/"), $filename);
      $update['ss_report'] = $filename;
    }

    $data->update($update);
    return redirect($this->url . '/' . $id)->with('success', __('default.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', __('default.notification.error'));
      }
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }
  }

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      $this->model::destroy($id);
      $data = $this->model::where('id', $id)->delete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return DELETE-PERMANENT
  **************************************************
  **/

  public function delete_permanent($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      $data = $this->model::withTrashed()->findOrFail($id);
      if(!$data->trashed()) { return Response::json($data); }
      else {
        $data->forceDelete();
        return Response::json($data);
      }
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->delete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-DELETE-PERMANENT
  **************************************************
  **/

  public function selected_delete_permanent(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->forceDelete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return TRASH
  **************************************************
  **/

  public function trash() {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::onlyTrashed()->get();
      if(request()->ajax()) {
        return DataTables::of($data)
        ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
        ->rawColumns(['description'])
        ->addIndexColumn()
        ->make(true);
      }
      return view($this->path . 'trash', compact('data'));
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }
  }

  /**
  **************************************************
  * @return RESTORE
  **************************************************
  **/

  public function restore($id) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::withTrashed()->findOrFail($id);
      if ($data->trashed()) {
        $data->restore();
        $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
        return Response::json($data);
      } else { return Response::json($data);}
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-RESTORE
  **************************************************
  **/

  public function selected_restore(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->restore();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return STATUS-SUCCESS
  **************************************************
  **/

  public function status_success($id) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::where('id', $id)->update(['status' => 1]);
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return STATUS-PENDING
  **************************************************
  **/

  public function status_pending($id) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::where('id', $id)->update(['status' => 2]);
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return STATUS-PROGRESS
  **************************************************
  **/

  public function status_progress($id) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::where('id', $id)->update(['status' => 0]);
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

}
