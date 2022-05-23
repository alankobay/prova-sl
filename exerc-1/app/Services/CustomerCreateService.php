<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerCreateService extends Model
{
    private $model;
    
    /**
     * @param  Customer $model
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }
    
    /**
     * @param  array $data
     * 
     * @return Customer
     * 
     * @throws Exception
     */
    public function __invoke(array $data): Customer
    {
        DB::beginTransaction();

        try {
            $customer = $this->model->create($data);
            
            DB::commit();

            return $customer->fresh();
        } catch (\Exception $e) {
            DB::rollBack();

            report($e);
            throw $e;
        }
    }
}
