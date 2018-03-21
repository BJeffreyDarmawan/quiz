<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemModel;

class ItemController extends Controller
{
    protected $item;

    public function __construct(ItemModel $item){
        $this->item = $item;
    }

    // add new item
    public function register(Request $request){
        $item = new ItemModel;
        $item =[
            'name' => $request->name,
            'user_id' => $request->user_id,
            'price' => $request->price,
            'stock' => $request->stock
        ];

        try{
            $item = new ItemModel($item);
            $item->save(); 
            return "Successfully Created";
        } catch(Exception $e){
            return $e;
        }

        return "Failed";
    }

    // show all items
    public function all(){
        $item = $this->item->all();
        return $item;
    }

    // show item by id
    public function find($id){
        $me = $this->item->find($id);
        return $me;
    }

    // delete item by id
    public function deleteItem($id) {
        $itemDel = $this->item->find($id);
        $itemDel->delete();
        return "Successfully removed";
    }

    // update item
    public function updateItem(Request $request, $id) {
        $item = $this->item->find($id);
        $item->id = $id;
        $item->user_id = $request->user_id;
        $item->name = $request->name;
        $item->price= $request->price;
        $item->stock = $request->stock;
        $item->save();
        echo 'Successfully updated';
    }
}
