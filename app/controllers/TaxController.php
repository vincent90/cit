<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 19/03/14
 * Time: 22:21
 */

class TaxController extends BaseController{

    public function show(){


        //charger les expenses
        $provinces = Provinces::all();
        $category = Category::all();
        $taxType = TaxType::all();


        //charger la vue et envoyer les infos de tax
        return View::make('tax.show')->with('provinces',$provinces)->with('category',$category)->with('taxType',$taxType);

    }

    public function getTax(){
        if (Request::ajax()) {
            $rules = array(
                'province'          => 'required',
                'category'          => 'required',
                'type'             => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                // The given data did not pass validation
                return "";
            }else{
                $result = Tax::
                    where('provinceId', "=", intval(Input::get('province')))
                    ->where ('categoryId',"=",intval(Input::get('category')))
                    ->where ('typeId',"=",intval(Input::get('type')))
                    ->get();


                    return  $result;
            }
        }
    }

    public function updateTax(){

        if (Request::ajax()) {
            Log::info(Input::all());
            $rules = array(
                'province'          => 'required',
                'category'          => 'required',
                'type'             => 'required',
                'tax'             => 'required',
                'rateId'        =>''
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                // The given data did not pass validation
                return "0";
            }else{
                // store
                if(Input::get('rateId') == ""){
                    $tax = new Tax;
                }else{
                    $tax = Tax::find(Input::get('rateId'));
                }

                $tax->provinceId          = intval(Input::get('province'));
                $tax->categoryId          = intval(Input::get('category'));
                $tax->typeId              = intval(Input::get('type'));
                $tax->tax                 = Input::get('tax');
                $tax->save();
                return "1";
            }
        }

    }


}