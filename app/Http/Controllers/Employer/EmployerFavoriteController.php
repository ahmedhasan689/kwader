<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Existing;
use App\Models\Favorite;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerFavoriteController extends Controller
{
    public function index($id)
    {
        $user = null;
        $favorites = null;
        if (Auth::user()->user_type == 'Employer'){
            $user = Employer::where('user_id', Auth::user()->id)->first();
            $existings = Existing::where('employer_id', $user->id)->get();
            foreach ( $existings as $existing ) {
                $favorites = Favorite::where('existing_id', $existing->id)->count();
            }
        }else{
            $user = Employee::where('user_id', Auth::user()->id)->first();
            $existings = Existing::where('employer_id', $user->id)->get();
            foreach ( $existings as $existing ) {
                $favorites = Favorite::where('existing_id', $existing->id)->count();
            }
        }
        return view('employer.favorite.index', compact('user', 'existings', 'favorites'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'Employer'){
            Existing::create([
                'existing_name' => $request->list_name,
                'type' => $request->list_type,
                'employer_id' => Auth::user()->employer->id,
            ]);
        }else{
            Existing::create([
                'existing_name' => $request->list_name,
                'type' => $request->list_type,
                'employee_id' => Auth::user()->employee->id,
            ]);
        }

        toastr()->success('تم إنشاء قائمة جديدة');

        return redirect()->back();
    }

    public function favoriteStore(Request $request)
    {
        Favorite::create([
            'existing_id' => $request->existing_id,
            'favoriteable_id' => $request->employee_id,
            'favoriteable_type' => 'App\Models\Employee',
        ]);

        toastr()->success('Done');

        return redirect()->back();
    }

    public function modalStore(Request $request)
    {
//        dd($request);
        $list = Existing::findOrFail($request->existing_id);
        Favorite::create([
            'existing_id' => $request->existing_id,
            'favoriteable_id' => $request->job_id,
            'favoriteable_type' => 'App\Models\Job',
        ]);

        toastr()->success('تم إضافة الأعلان إلى قائمة ' . $list->existing_name );

        return redirect()->route('job.index');
    }

    public function newList(Request $request)
    {
        Existing::create([
            'existing_name' => $request->list_name,
            'type' => $request->type,
            'employer_id' => Auth::user()->employer->id,
        ]);

        return response()->json([
            'existings' => Existing::latest()->first(),
        ]);
    }

    public function show($id)
    {
        $existing = Existing::findOrFail($id);
        $favorites = Favorite::where('existing_id', $existing->id)->get();

        return view('employer.favorite.show', compact('existing', 'favorites'));
    }
}
