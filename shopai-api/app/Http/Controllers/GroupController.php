<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        // $groups = Group::with('students')->get();

        // Get students with group and order students by group name
        $students = Student::with('group')
            ->orderBy(Group::select('name')
                ->whereColumn('groups.id', 'students.group_id'))
            ->get();

        // Get groups with students and order students by student name
        $groups = Group::with(['students' => function ($query) {
            $query->orderBy('students.position', 'asc');
        }])->orderBy('position')->get()->toArray();

        $splitGroups = $groups ? $this->partition($groups, 3) : [];

        return response()->json([
            'students' => $students,
            'groups' => $groups,
            'splitGroups' => $splitGroups
        ]);
    }

    public function move(Request $request, Student $student)
    {
        $student->update([
            'group_id' => $request->groupId,
            'position' => round($request->position, 5)
        ]);

        return ApiResponse::success($student);
    }

    protected function partition($main_array, $size)
    {
        $total_count = count($main_array);
        $divided = floor($total_count / $size);

        $remainder = $total_count % $size;

        $small_array = array();
        $start = 0;
        for ($p = 0; $p < $size; $p++) {
            $length = ($p < $remainder) ? $divided + 1 : $divided;
            $small_array[$p] = array_slice($main_array, $start, $length);
            $start += $length;
        }

        return $small_array;
    }
}
