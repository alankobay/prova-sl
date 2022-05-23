<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class CustomerListService extends Model
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
     * @return Paginator
     * 
     * @throws Exception
     */
    public function __invoke(): Paginator
    {
        try {
            return $this->model
                ->latest('id')
                ->paginate();
        } catch (\Exception $e) {
            report($e);
            throw $e;
        }
    }
}
