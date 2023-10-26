<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index(Request $request)
    {
        try {

            if ($request->method() == 'POST') {
                $rank_logs = [];
                foreach ($request->goal_ids as $key => $goal_id) {
                    //prep goal and targets
                    $goal = Goal::findOrFail($goal_id);
                    $old_target = $goal->target;
                    $new_target = intval($request->goal_targets[$key]);

                    //prep logs for later
                    $rank_logs[$goal->id] = [
                        'old_target' => $old_target,
                        'new_target' => $new_target,
                    ];
                }

                //change all user goals
                $users = User::where('role_id', 2)->get();
                foreach ($users as $user) {
                    $rank = get_my_rank($user->id);
                    $user->remaining_referrals = $user->remaining_referrals - $rank_logs[$rank->id]['old_target'] + $rank_logs[$rank->id]['new_target'];
                    $user->save();
                }

                //finally update all goals
                foreach ($request->goal_ids as $key => $goal_id) {
                    Goal::findOrFail($goal_id)->update([
                        'target' => $request->goal_targets[$key]
                    ]);
                }

                return redirect()->back()->with('success', 'Goals Updated Successfully');
            } else {
                $goals = Goal::all();

                return view('admin.goal.edit', compact('goals'));
            }
        } catch (\Exception $ex) {
            return redirect('admin/dashboard')->with('error', $ex->getMessage());

        }
    }
}
