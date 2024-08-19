<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests=User::where('is_admin',NULL)->get();
        $revisorRequests=User::where('is_revisor',NULL)->get();
        $writerRequests=User::where('is_writer',NULL)->get();
        return view('admin.dashboard',compact('adminRequests','revisorRequests','writerRequests'));
    }

    public function setAdmin(User $user){
        $user->is_admin=TRUE;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message','Hai reso $user->name amministratore.');
    }

    public function setRevisor(User $user){
        $user->is_revisor=TRUE;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message','Hai reso $user->name revisore.');
    }

    public function setWriter(User $user){
        $user->is_writer=TRUE;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message','Hai reso $user->name redattore.');
    }
}
