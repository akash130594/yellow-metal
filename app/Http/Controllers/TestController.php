<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TestController extends Controller
{
    public function list() {
        $path = public_path() . "/test.json";
        $file = \File::get($path);
        return view('welcome')->with('list', json_decode($file, true));
    }

    public function delete($id, $toppingId) {
        $path = public_path() . "/test.json";
        $file = \File::get($path);
        $data = json_decode($file, true);
        foreach($data as $i => $item) {
            $updatedTopping = [];
            if($item['id'] === $id) {
                foreach($item['topping'] as $key => $topping) {
                    if($topping['id'] === $toppingId) {
                        unset($item['topping'][$key]);
                    }
                }
                $updatedTopping = $item['topping'];
                // dd($updatedTopping);
                $item['topping'] = array_values($updatedTopping);
            }
            // dd($item);
            $data[$i] = $item;
        }

        \File::put(public_path() . "/test.json",json_encode($data));
        $file = \File::get($path);
        return redirect('list');
    }

    public function edit ($id, $toppingId) {
        $path = public_path() . "/test.json";
        $file = \File::get($path);
        $data = json_decode($file, true);
        $filteredTopping = [];
        foreach($data as $i => $item) {
            $updatedTopping = [];
            if($item['id'] === $id) {
                foreach($item['topping'] as $key => $topping) {
                    if($topping['id'] === $toppingId) {
                        $filteredTopping = $topping;
                    }
                }
                break;
            }
        }
        return view('edit')->with('filteredTopping', $filteredTopping)
        ->with('id', $id)
        ->with('toppingId', $toppingId);
    }

    public function update(Request $request, $id, $toppingId){
        $newTopping = $request->toppings;
        $path = public_path() . "/test.json";
        $file = \File::get($path);
        $data = json_decode($file, true);
        foreach($data as $i => $item) {
            $updatedTopping = [];
            if($item['id'] === $id) {
                foreach($item['topping'] as $key => $topping) {
                    if($topping['id'] === $toppingId) {
                        $item['topping'][$key]['type'] = $newTopping;
                    }
                }
                $updatedTopping = $item['topping'];
                // dd($updatedTopping);
                $item['topping'] = array_values($updatedTopping);
            }
            $data[$i] = $item;
        }
        \File::put(public_path() . "/test.json",json_encode($data));
        $file = \File::get($path);
        return redirect('list');
    }
}
