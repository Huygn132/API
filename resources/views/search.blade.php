<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Search</title>
</head>
<body>

<form action="{{ route('project.handleSearch') }}" method="POST">
    @csrf
    <input type="text" name="order_number" placeholder="オーダーNo.">
    <input type="text" name="project_name" placeholder="案件名">
    <input type="text" name="client_name" placeholder="顧客名">
    <select name="status">
        <option value="0">実行中</option>
        <option value="1">非活性</option>
        <option value="2">保留</option>
        <option value="3">完了</option>
        <option value="4">キャンセル</option>
    </select>
    <button type="submit">検索</button>
</form>

@if(isset($projects) && count($projects) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>案件名</th>
                <th>オーダーNo.</th>
                <th>顧客名</th>
                <th>Order Date</th>
                <th>ステータス</th>
                <th>Order Income</th>
                <th>Internal Unit Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr id="project-{{ $project->id }}">
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->order_number }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->order_date }}</td>
                    <td>{{ ($project->status) }},{{ \App\Http\Controllers\ProjectController::STATUS_LABELS[$project->status] }}</td>
                    <td>{{ $project->order_income }}</td>
                    <td>{{ $project->internal_unit_price }}</td>
                    <td>
                        <button onclick="confirmDelete(event, {{ $project->id }})">削除</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <label id="projectCount">検索件数: {{ count($projects) }}</label>

@else
    <p>No results found!</p>
@endif

<script>
function confirmDelete(e, projectId) {
    e.preventDefault();

    const userConfirmed = confirm("Do you want to delete selected order info?");
    if (userConfirmed) {
        fetch(`/project/delete/${projectId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`project-${projectId}`).remove();
                let currentCount = document.querySelectorAll("tbody tr").length;
                document.getElementById("projectCount").innerText = `検索件数: ${currentCount}`;
            } else {
                alert("Error deleting project. Please try again.");
            }
        });
    }
}


</script>

</body>
</html>
