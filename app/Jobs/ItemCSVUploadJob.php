<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Item;

class ItemCSVUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $header;
    public $data;

    /**
     * Create a new job instance.
     */
     public function __construct($data, $header)
     {
         $this->data = $data;
         $this->header = $header;
     }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      foreach ($this->data as $item) {
          $item_csv_data = array_combine($this->header,$item);
          Item::create($item_csv_data);
      }
    }
}
