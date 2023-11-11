<div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">

  <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
    <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs" >Audit Logs</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications" >Notifications</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings" >Settings</a></li>
    </ul>
    <div class="offcanvas-close mt-n1 pr-5">
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
        <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
  </div>

  <div class="offcanvas-content px-10">
    <div class="tab-content">

      <div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
        <div class="mb-15">
          <h5 class="font-weight-bold mb-5">System Messages</h5>
          <div class="d-flex align-items-center flex-wrap mb-5">
            <div class="symbol symbol-50 symbol-light mr-5">
              <span class="symbol-label"><img src="/assets/backend/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt=""/></span>
            </div>
            <div class="d-flex flex-column flex-grow-1 mr-2">
              <a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Top Authors</a>
              <span class="text-muted font-weight-bold">Most Successful Fellas</span>
            </div>
            <span class="btn btn-sm btn-light font-weight-bolder py-1 my-lg-0 my-2 text-dark-50">+82$</span>
          </div>
        </div>
      </div>

      <div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
        <div class="navi navi-icon-circle navi-spacer-x-0">
          <a href="#" class="navi-item">
            <div class="navi-link rounded">
              <div class="symbol symbol-50 mr-3">
                <div class="symbol-label"><i class="flaticon-paper-plane-1 text-success icon-lg"></i></div>
              </div>
              <div class="navi-text">
                <div class="font-weight-bold  font-size-lg">
                  4.5h-avarage response time
                </div>
                <div class="text-muted">
                  Fostest is Barry
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
        <form class="form">
          <div class="pt-2">
            <h5 class="font-weight-bold mb-3">Memebers</h5>
            <div class="form-group mb-0 row align-items-center">
              <label class="col-8 col-form-label">Enable Customer Portal:</label>
              <div class="col-4 d-flex justify-content-end">
                <span class="switch switch-sm switch-primary">
                  <label>
                    <input type="checkbox" checked="checked" name="select"/>
                    <span></span>
                  </label>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>
