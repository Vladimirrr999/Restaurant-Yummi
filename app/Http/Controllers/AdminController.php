<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{
    public function index()
    {
        $registeredUsers = User::count();
        $products = Product::all();
        $totalPriceOfFood = $products->sum('price');
        $bookedTables = Reservations::count();
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $messages = Message::count();
        return view('admin.dashboard', compact('registeredUsers', 'messages', 'totalPriceOfFood', 'bookedTables', 'adminUsername'));
    }

    public function resetPassword()
    {
        return view('admin.resetPassword');
    }

    public function newPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currPass' => 'required',
            'newPass' => 'required|min:6',
        ], [
            'currPass.required' => 'Current password is required.',
            'newPass.required' => 'New password is required.',
            'newPass.min' => 'New password must be at least :min characters long.',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
        }
        if (!Hash::check($request->currPass, auth()->user()->password)) {
            return response()->json(['success' => false, 'errors' => ['Incorrect current password.']]);
        }
        auth()->user()->update([
            'password' => Hash::make($request->newPass),
        ]);
        return response()->json(['success' => 'Password successfully changed.']);
    }

    public function showUsers()
    {
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $allUsers = User::all();
        return view('admin.allUsers', compact('adminUsername', 'allUsers'));
    }

    public function storeUsers(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        try {
            $user = User::create([
                'fullName' => $validatedData['fullName'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
            ]);
            return response()->json(['success' => true, 'message' => 'User added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to add user: ' . $e->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User succefully deleted!');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function editUser($id)
    {
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $userId = $id;
        $user = User::findOrFail($id);
        return view('admin.editUserForm', compact('userId', 'adminUsername', 'user'));
    }

    public function updateUser($id, Request $request)
    {
        try {
            $user = User::find($id);

            $validatedData = $request->validate([
                'fullName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id
            ]);

            $user->fullName = $validatedData['fullName'];
            $user->email = $validatedData['email'];

            $user->save();
            return redirect()->back()->with('success', 'Succefully updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while updating user.');
        }
    }

    public function showMenu()
    {
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $food = Product::has('categories')->get();
        $categories = Category::all();
        return view('admin.showMenu', compact('adminUsername', 'food', 'categories'));
    }

    public function addNewProduct()
    {
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $food = Product::has('categories')->get();
        $categories = Category::all();
        return view('admin.showNewProduct', compact('adminUsername', 'food', 'categories'));
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'ingredients' => 'required|string',
            'img' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string',
            'blokDodavanja' => ['required', 'in:menu-starters,menu-breakfast,menu-lunch,menu-dinner'],
            'Kategorija' => ['required', 'integer', 'not_in:0'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $imagePath = 'assets/img/menu/' . $request->file('img')->getClientOriginalName();

            Product::create([
                'title' => $request->title,
                'ingredients' => $request->ingredients,
                'src' => $imagePath,
                'price' => $request->price,
                'blockId' => $request->blokDodavanja,
                'category_id' => $request->Kategorija,
            ]);

            $request->file('img')->storeAs('public/assets/img/menu', $request->file('img')->getClientOriginalName());

            return response()->json(['success' => true, 'message' => 'Product added successfully!']);
        } catch (\Exception $e) {
            $errorMessage = 'Error adding product: ' . $e->getMessage();
            return response()->json(['success' => false, 'message' => $errorMessage], 500);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'User succefully deleted.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function showEditForm($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $categories = Category::all();

        return view('admin.editFoodForm', compact('adminUsername', 'product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'ingredients' => 'required|string',
            'img' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string',
            'ddl1' => ['required', 'in:menu-starters,menu-breakfast,menu-lunch,menu-dinner'],
            'ddl2' => ['required', 'integer', 'not_in:0'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $product = Product::findOrFail($id);

            $product->title = $request->title;
            $product->ingredients = $request->ingredients;
            $product->price = $request->price;
            $product->blockId = $request->ddl1;
            $product->category_id = $request->ddl2;

            if ($request->hasFile('img')) {
                $imagePath = 'assets/img/menu/' . $request->file('img')->getClientOriginalName();
                $product->src = $imagePath;
                $request->file('img')->storeAs('public', $imagePath);
            }

            $product->save();

            return redirect()->route('showMenu')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            $errorMessage = 'Error updating product: ' . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function showBookedTables()
    {
        $reservations = Reservations::all();
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $categories = Category::all();
        return view('admin.showBookedTables', compact('adminUsername', 'categories', 'reservations'));
    }
    public function filterTable(Request $request)
    {
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $dateType = $request->input('filter');
        $orderBy = 'date';
        $orderDirection = 'asc';
        if ($dateType === 'newest_date') {
            $orderBy = 'date';
            $orderDirection = 'desc';
        } elseif ($dateType === 'earliest_time') {
            $orderBy = 'time';
            $orderDirection = 'asc';
        } elseif ($dateType === 'latest_time') {
            $orderBy = 'time';
            $orderDirection = 'desc';
        }
        $reservations = Reservations::orderBy($orderBy, $orderDirection)->get();

        return view('admin.showBookedTables', compact('reservations', 'adminUsername'));
    }

    public function showMessages(){
        $admin = User::where('role_id', '2')->first();
        $adminUsername = $admin->fullName;
        $messages = Message::all();
        return view('admin.showMessages', compact('adminUsername', 'messages'));
    }
}
