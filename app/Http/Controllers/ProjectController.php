<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectController extends Controller
{
    const STATUS_LABELS = [
        0 => '実行中',
        1 => '非活性',
        2 => '保留',
        3 => '完了',
        4 => 'キャンセル'
    ];

    /**
     * Display the search form.
     *
     * This endpoint is generally not needed for APIs but I'll keep it for now.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return response()->json([
            'message' => 'API endpoint to search for projects.'
        ]);
    }

    /**
     * Handle the search request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleSearch(Request $request)
    {
        $request->validate([
            'order_number' => 'nullable|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'client_name'  => 'nullable|string|max:255',
            'status'       => 'nullable|integer|between:0,4'
        ]);

        $orderNumber = $request->input('order_number');
        $projectName = $request->input('project_name');
        $clientName  = $request->input('client_name');
        $status      = $request->input('status');

        $statusName = isset($status) ? self::STATUS_LABELS[$status] : null;

        $query = DB::table('t_projects')
            ->where('del_flg', 0);

        if ($orderNumber) {
            $query->where('order_number', 'LIKE', "%$orderNumber%");
        }

        if ($projectName) {
            $query->where('project_name', 'LIKE', "%$projectName%");
        }

        if ($clientName) {
            $query->where('client_name', 'LIKE', "%$clientName%");
        }

        if (isset($status)) {
            $query->where('status', $status);
        }

        $projects = $query->orderBy('order_number', 'ASC')->get();

        return response()->json(['projects' => $projects]);
    }

    public function delete($id)
    {
        $project = DB::table('t_projects')->where('id', $id)->first();

        if (!$project) {
            return response()->json(['success' => false, 'message' => 'Project not found']);
        }

        DB::table('t_projects')->where('id', $id)->update([
            'del_flg' => 1,
            'updated_datetime' => now()->setTimezone('Asia/Ho_Chi_Minh'),
            // 'updated_user' => Auth::user()->id,
        ]);

        return response()->json(['success' => true, 'message' => 'Project deleted successfully']);
    }
}
