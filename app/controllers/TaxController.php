<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 19/03/14
 * Time: 22:21
 */

class TaxController extends BaseController{

    public function show(){
        //ouvre le form de création
        return View::make('tax.show');
    }


}