<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Cart;
use App\Group;
use App\GroupData;
use App\Category;
use App\CategoryData;
use App\Subcategory;
use App\SubcategoryData;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GlobalController extends Controller {

    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTerms() {
        //
        $groups = GroupData::where('locale', \Lang::getLocale())->get(array('title'));

        if($groups == NULL) $groups = GroupData::where('locale', 'en')->get(array('title'));

        $cats = CategoryData::where('locale', \Lang::getLocale())->get(array('title'));

        if($cats == NULL) $cats = CategoryData::where('locale', 'en')->get(array('title'));

        $subs = SubcategoryData::where('locale', \Lang::getLocale())->get(array('title'));

        if($subs == NULL) $subs = SubcategoryData::where('locale', 'en')->get(array('title'));

        $searchTerms = array();

        foreach($groups as $group) {

            $searchTerms[] = rtrim($group->title, 's');
        }

        foreach($cats as $cat) {

            $searchTerms[] = rtrim($cat->title, 's');
        }

        foreach($subs as $sub) {

            $searchTerms[] = rtrim($sub->title, 's');
        }

        return $searchTerms;
    }

    public function navigation() {

        $groups = Group::all();

        foreach($groups as $g) {

            $g->data = $g->data()->where('locale', \Lang::getLocale())->first();

            if($g->data == NULL) $g->data = $g->data()->where('locale', 'en')->first();

            $g->categories = $g->categories()->get();

            foreach($g->categories as $c) {

                $c->data = $c->data()->where('locale', \Lang::getLocale())->first();

                if($c->data == NULL) $c->data = $c->data()->where('locale', 'en')->first();

                $c->subcategories = $c->subcategories()->get();

                foreach($c->subcategories as $s) {

                    $s->data = $s->data()->where('locale', \Lang::getLocale())->first();

                    if($s->data == NULL) $s->data = $s->data()->where('locale', 'en')->first();

                    $s->data->url = ($s->data->url == '_' ? $s->id : $s->data->url);
                }
            }
        }

        return $groups;
    }

    public function cartItems() {

        $cart = Cart::where('session_id', Session::getId())->where('status', 0)->get();

        return $cart;
    }
}
