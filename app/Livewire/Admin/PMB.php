<?php

namespace App\Livewire\Admin;

use \Carbon\Carbon;
use Livewire\Component;
use App\Models\PMB as PMBModel;

class PMB extends Component
{

  public $START = "Dimulai";
  
  public $END = "Berakhir";

  public $PREPARED = "Belum dimulai";

  public $pmbItems = [];

  public function mount()
  {
    $this->pmbItems = PMBModel::with("pmbStudies")->get()->toArray();;
    $this->pmbItems = array_map(function($arr){
      $dateStart = Carbon::createFromDate($arr["date_start"]);
      $dateEnd = Carbon::createFromDate($arr["date_end"]);
      $now = Carbon::now();
      $status = $this->START;
      if($now->lt($dateStart) && $now->lt($dateEnd)){
        $status = $this->PREPARED;
      }
      if($now->gte($dateStart) && $now->gt($dateEnd)){
        $status = $this->END;
      }
      $arr["status"] = $status;

      return $arr;
    }, $this->pmbItems);
  }

  public function render()
  {
    return view('livewire.admin.p-m-b');
  }
}
