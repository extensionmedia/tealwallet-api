<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_category',
        'status',
        'icon',
        'level',
        'is_budget',
        'budget_amount'
    ];
}
