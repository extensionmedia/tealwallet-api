<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'expense_categories'    =>  ExpenseCategory::all()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'expense_category'  =>  'required|string|max:255|unique:expense_categories',
            'status'            =>  'required|integer|max:1',
            'icon'              =>  'required|string|max:255',
            'level'             =>  'required|integer',
            'is_budget'         =>  'required|integer|max:1',
            'budget_amount'     =>  'required|numeric',
        ]);

        $expense_category = ExpenseCategory::create([
            'expense_category'  =>  $fields['expense_category'],
            'status'            =>  $fields['status'],
            'icon'              =>  $fields['icon'],
            'level'             =>  $fields['level'],
            'is_budget'         =>  $fields['is_budget'],
            'budget_amount'     =>  $fields['budget_amount'],
        ]);

        return response([
            'category'  =>  $expense_category
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = ExpenseCategory::find($id);
        if(!$category){
            return response([
                'message'   =>  'Category Not Found'
            ], 404);
        }
        return $category;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
