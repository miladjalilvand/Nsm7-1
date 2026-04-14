<?php
namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\EmployeeService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    //
        public $employees ;

        public $name , $caption ;

        public  $working_times =[];

        public $showModal ;

        public $showModalWeekday ;
        public $endTime; 
        public $startTime;
        public $weekday_selected;

        public $showModalAddService = false;

        public $services ;

        public $employeeServices ;

        public $service_ids ;
        public $employe_service_ids=[]; 

        public $selected_employee_id ;

        public $edit_mode = false; 

        public $current_employee ;
        

        #[On('branch-switched')]
        public function refresh(){
            $branch =  current_branch()->fresh();

            $this->employees = 
        $branch->employees;

        $this->services = $branch->services;
        $this->service_ids = $branch->services->pluck('id')->
        toArray()??[];
 

        }
    public function mount(){
        $this->employees = 
        current_branch()->employees;

        $this->services = current_branch()->services;
        $this->service_ids = current_branch()->services->pluck('id')->
        toArray()??[];

        // dd(current_branch()->services);

    }
        public function render()
    {
        return view("livewire.employees.index");
    }

    public function store(){
        $branch_id = current_branch()->id;

        if(!$this->edit_mode){

        Employee::create([
            'name' => $this->name,
            'caption' => $this->caption,
            'working_times' => json_encode($this->working_times) , 
            'branch_id' => $branch_id 
        ]);}
        else {
            $this->current_employee->update([
            'name' => $this->name,
            'caption' => $this->caption,
            'working_times' => json_encode($this->working_times) , 
            'branch_id' => $branch_id 
            ]);
        }

        $this->refresh();

    }

    public function add_week_day ($week_day){

        $this->weekday_selected = $week_day;
        if(!in_array($week_day , array_keys($this->working_times))){
        $this->working_times[$week_day]=[];
        $this->showModalWeekday= true;
        }else {
        // $this->working_times = array_diff($this->working_times, [$week_day]);
        // unset($this->working_times[$week_day]);

        $this->showModalWeekday= true;

        }
    }

    public function add_time($week_day){

        if($this->startTime  != null && $this->endTime != null ){
            $this->working_times[$week_day][]= 
        ['start' => $this->startTime , 
        'end' => $this->endTime];
        $this->reset(['startTime','endTime']);

        }
    }

    public function remove_time($key_item , $week_day){
      unset(  $this->working_times[$week_day][$key_item]);
    }

    public function add_service($employee_item_id){
        $this->showModalAddService =true;

        $this->employeeServices = EmployeeService::
        where('employee_id' , $employee_item_id)->get();

         $this->employe_service_ids = EmployeeService::
        where('employee_id' , $employee_item_id)->pluck('service_id')->
        toArray()??[];

        $this->selected_employee_id = $employee_item_id;

    }

    // public function add_service_to_employee($service_id){

    //     if(in_array($service_id , $this->employe_service_ids)){
    //         $this->employe_service_ids[$service_id] = null;
    //     }else {
    //         $this->employe_service_ids[] = $service_id;
    //     }
    // }
    public function add_service_to_employee($service_id)
    {
        // چک می‌کنیم آیا $service_id در آرایه وجود دارد یا نه
        $key = array_search($service_id, $this->employe_service_ids);

        if ($key !== false) {
            // اگر وجود داشت (یعنی سرویس انتخاب شده است)، آن را حذف می‌کنیم
            unset($this->employe_service_ids[$key]);
            // برای اطمینان از اینکه آرایه پیوسته بماند (اختیاری، بستگی به مصرف بعدی دارد)
            $this->employe_service_ids = array_values($this->employe_service_ids); 
        } else {
            // اگر وجود نداشت، آن را اضافه می‌کنیم
            $this->employe_service_ids[] = $service_id;
        }
    }

    public function store_employe_service(){

       
        EmployeeService::where('employee_id' , $this->selected_employee_id)
        ->delete();
        foreach($this->employe_service_ids as $serv_id){
    EmployeeService::create([
            'employee_id' =>$this->selected_employee_id,
            'service_id'=>$serv_id
        ]);
        }
        
    

        $this->showModalAddService =false;

        $this->reset('employe_service_ids');
    }

            public function show_edit($employee){
      $this->edit_mode = true ;
      $this->showModal = true;
// dd($branch);

      $this->current_employee = Employee::find($employee['id']);
      $this->caption= $employee['caption'];
      $this->name = $employee['name'];
      
$this->working_times = json_decode($employee['working_times'], true);
     

    }

};
