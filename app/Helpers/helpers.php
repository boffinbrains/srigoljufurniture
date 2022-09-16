<?php

use App\Models\Category;
use App\Models\Bank;
use App\Models\User;
use App\Models\Brands;

function get_category_name($id){
    if(isset($id)){
        $category = Category::where('id',$id)->first();
        return $category != '' ? $category->title : 'Unknown';
    }
}

function get_bank_name($id){
    if(isset($id)){
        $bank = Bank::where('id',$id)->first();
        return $bank != '' ? $bank->title : 'Unknown';
    }
}

function get_brand_name($id){
    if(isset($id)){
        $brand = Brands::where('id',$id)->first();
        return $brand != '' ? $brand->title : 'Unknown';
    }
}

function get_brand_image($id){
    if(isset($id)){
        $brand = Brands::where('id',$id)->first();
        return $brand != '' ? $brand->image : '';
    }
}

function get_username($id){
    if(isset($id)){
        $user = User::where('id',$id)->first();
        return $user != '' ? $user->name : 'Unknown';
    }
}

function get_category_slug($id){
    if(isset($id)){
        $category = Category::where('id',$id)->first();
        return $category != '' ? "$category->slug" : 'Unknown';
    }
}