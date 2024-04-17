<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Reward;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Illuminate\Contracts\Database\Query\Builder;

class RewardForm extends Form
{
    public ?Reward $reward;

    #[Locked]
    public $id;

    public $customer;

    public $month;

    public $year;

    public $name;

    protected $validationAttributes = [
        'customer' => 'Customer',
        'month' => 'Month',
        'year' => 'Year',
        'name' => 'Name',
    ];

    public function rules(): array
    {
        return [
            'customer' => [
                'required',
                'integer',
                Rule::unique('rewards', 'customer_id')
                    ->where(function (Builder $query) {
                        return $query->where('month', $this->month)
                            ->where('year', $this->year);
                    })->ignore($this->id, 'id')
                ],
                'month' => [
                    'required',
                    'integer',
                    Rule::unique('rewards', 'month')
                        ->where(function (Builder $query) {
                            return $query->where('customer_id', $this->customer)
                                ->where('year', $this->year);
                        })->ignore($this->id, 'id')
                    ],
                'year' => [
                    'required',
                    'integer',
                    Rule::unique('rewards', 'year')
                        ->where(function (Builder $query) {
                            return $query->where('customer_id', $this->customer)
                                ->where('year', $this->year);
                        })->ignore($this->id, 'id')
                    ],
            ];
    }

    public function setReward(Reward $reward)
    {
        $this->reward = $reward;

        $this->id = $reward->id;
        $this->customer = $reward->customer_id;
        $this->month = $reward->month;
        $this->year = $reward->year;
        $this->name = $reward->name;
    }

    public function store()
    {
        Reward::create([
            'customer_id' => $this->customer,
            'month' => $this->month,
            'year' => $this->year,
            'name' => $this->name,
        ]);
        $this->reset();
    }

    public function update()
    {
        $this->reward - where('id', $this->id)->update([
            'customer_id' => $this->customer,
            'month' => $this->month,
            'year' => $this->year,
            'name' => $this->name,
        ]);
    }
}
