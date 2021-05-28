<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Contracts\View\View;
use App\Services\ChecklistService;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        
        (new ChecklistService())->sync_checklist($checklist,auth()->id());

        return view('users.checklists.show', compact('checklist'));

    }
}
