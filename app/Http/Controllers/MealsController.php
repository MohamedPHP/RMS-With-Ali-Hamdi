<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

use App\Meal;

use App\MealItem;

class MealsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::paginate(5);

        return view('meals.meals', compact('meals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('meals.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store Into the DB
        $input = $request->all();

        if (isset($input['image'])) {
            $input['image'] = $this->upload($input['image']);
        }else {
            $input['image'] = 'images/defualt.jpg';
        }
        $input['user_id'] = \Auth::user()->id;

        $meal = Meal::create($input);

        foreach ($input['items'] as $item)
        {
            MealItem::create(['meal_id' => $meal->id, 'item_id' => $item, 'discount' => $input['discount'][$item]]);
        }

        $menus = Menu::all();

        $mealitems = MealItem::where('meal_id', $meal->id)->get();

        $mealitemsIDs = array();

        foreach ($mealitems as $mealitem) {

            $mealitemsIDs[] = $mealitem->item_id;

        }

        return view("Meals.edit" , compact('meal', 'menus', 'mealitemsIDs'));

    }
    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('images/meals');
        $file->move($path, $filename);
        return 'images/meals/'.$filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::findOrFail($id);

        $menus = Menu::all();

        $mealitems = MealItem::where('meal_id', $meal->id)->get();

        $mealitemsIDs = array();

        foreach ($mealitems as $mealitem) {

            $mealitemsIDs[] = $mealitem->item_id;
            $mealitemsIDsWithDiscount[$mealitem->item_id] = $mealitem->discount;

        }

        return view("Meals.edit" , compact('meal', 'menus', 'mealitemsIDs', 'mealitemsIDsWithDiscount'));
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
        //Store Into the DB
        $input = $request->all();
        if (isset($input['image'])) {
            $input['image'] = $this->upload($input['image']);
        }

        $meal = Meal::findOrFail($id)->update($input);

        MealItem::where('meal_id', $id)->delete();

        foreach ($input['items'] as $item)
        {
            MealItem::create(['meal_id' => $id, 'item_id' => $item, 'discount' => $input['discount'][$item]]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meal::findOrFail($id)->delete();

        return redirect()->back();

    }
}
