<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;

class MenuComposer
{

        public function compose(View $view)
        {
            $menu = \App\Models\ChecklistGroup::with([
                'checklists' => function($query){ 
                    $query->whereNull('user_id');}])
                    ->get();
                    // ->toArray();
            $view->with('admin_menu', $menu);

            $groups = [];
            foreach($menu->toArray() as $group){
                $group['is_new'] = FALSE;
                $group['is_updated'] = FALSE;
                foreach($group['checklists'] as &$checklist){
                    $checklist['is_new'] = FALSE;
                    $checklist['is_updated'] = FALSE;
                    $checklist['tasks'] = 1;
                    $checklist['completes_tasks'] = 0;

                }
                $groups[] = $group;
            }

            $view->with('user_menu', $groups);
            
        }

}