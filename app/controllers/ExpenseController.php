<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 19/03/14
 * Time: 22:21
 */

class ExpenseController extends BaseController{
    public function getInfo(){

        //charger les expenses
        $expenses = Expense::all();

        //charger la vue et envoyer les expenses
        return View::make('expense/view')->with('expenses',$expenses);
    }

    public function create(){
       //ouvre le form de création
       return View::make('expense.create');
    }

    public function addExpense(){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'province'          => 'required',
            'comments'          => 'required',
            'start'             => 'required',
            'destination'       => 'required',
            'kilometers'        => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('expense/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $expense = new Expense;
            $expense->province          = Input::get('province');
            $expense->comments          = Input::get('comments');
            $expense->start             = Input::get('start');
            $expense->destination       = Input::get('destination');
            $expense->kilometers        = Input::get('kilometers');
            $expense->save();

            // redirect
            Session::flash('message', 'La dépense à été ajoutée avec succès!');
            return Redirect::to('expense');
        }

    }

    public function update($id){
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'province'          => 'required',
            'comments'          => 'required',
            'start'             => 'required',
            'destination'       => 'required',
            'kilometers'        => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('expense/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $expense = Expense::find($id);
            $expense->province          = Input::get('province');
            $expense->comments          = Input::get('comments');
            $expense->start             = Input::get('start');
            $expense->destination       = Input::get('destination');
            $expense->kilometers        = Input::get('kilometers');
            $expense->save();

            // redirect
            Session::flash('message', 'La dépense à été modifiée avec succès!');
            return Redirect::to('expense');
        }
    }

    public function edit($id){
        //prendre la dépense
        $expense = Expense::find($id);

        //ouvrir le form de modification, et lui donner la dépense
        return View::make('expense.edit')->with('expense',$expense);
    }

    public function destroy($id){
        //delete
        $expense = Expense::find($id);
        $expense->delete();

        //redirect
        return Redirect::to('expense');
    }

    public function show($id){
        $expense = Expense::find($id);

        return View::make('expense.show')->with('expense',$expense);
    }
}