<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class PlantController extends Controller
{
    public function indexApi($selectedProjectId)
    {
        try {
            $projectData = DB::table('t_projects')
                ->where('id', $selectedProjectId)
                ->first();

            if (!$projectData) {
                return response()->json(['message' => 'Project not found'], 404);
            }

            $actualIncome = $projectData->order_income;
            $budgetedIncome = $actualIncome * 0.9;

            $tableData = DB::table('t_project_plan_actuals')
                ->select(
                    't_project_plan_actuals.staff_id',
                    'm_staff_datas.staff_type',

                )
                ->leftJoin('m_staff_datas', 't_project_plan_actuals.staff_id', '=', 'm_staff_datas.id')
                ->where('t_project_plan_actuals.project_id', $selectedProjectId)
                ->groupBy('t_project_plan_actuals.staff_id', 'm_staff_datas.staff_type')
                ->orderBy('t_project_plan_actuals.staff_id')
                ->get();


            $staffTypeData = [];
            foreach ($tableData as $rowData) {

                $staffId = $rowData->staff_id;
                $staffType = $rowData->staff_type;


                if (!isset($staffTypeData[$staffType])) {
                    $staffTypeData[$staffType] = [];
                }


                $staffTypeData[$staffType][] = $rowData;
            }


            return response()->json([
                'projectData' => $projectData,
                'actualIncome' => $actualIncome,
                'budgetedIncome' => $budgetedIncome,
                'staffTypeData' => $staffTypeData,
            ]);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}
