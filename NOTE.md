#INSTALL
- composer install
- npm install
- php artisan migrate:refresh --seed
- php artisan storage:link


<!-- IFRAME -->
<iframe src="https://docs.google.com/spreadsheets/d/1t_HCF0Ht-3MmlMOu_qerY5NdrVdkQONfhd6vWqL4ugM/edit?usp=sharing" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
Your browser doesnt support iframes
</iframe>

<!-- CONTROLLER CONSTRUCT -->
$this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
$this->middleware('permission:product-create', ['only' => ['create','store']]);
$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
$this->middleware('permission:product-delete', ['only' => ['destroy']]);
 
