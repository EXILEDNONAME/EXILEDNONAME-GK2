<?php

if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
else if (request('date_start') == null ) { $this->data = $this->model::orderBy('date_start', 'desc')->get(); }
else { $this->data = $this->model::get(); }
