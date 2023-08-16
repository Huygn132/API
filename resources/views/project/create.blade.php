<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Dự Án Mới</title>
</head>
<body>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('project.store') }}" method="POST">
    @csrf
    <div>
        <label>案件名:</label>
        <input type="text" name="project_name" placeholder="案件名">
        @error('project_name')<span>{{ $message }}</span>@enderror
    </div>

    <div>
        <label>オーダーNo.:</label>
        <input type="text" name="order_number" placeholder="オーダーNo.">
        @error('order_number')<span>{{ $message }}</span>@enderror
    </div>

    <div>
        <label>顧客名:</label>
        <input type="text" name="client_name" placeholder="顧客名">
        @error('client_name')<span>{{ $message }}</span>@enderror
    </div>

    <div>
        <label>オーダー日付:</label>
        <input type="date" name="order_date" placeholder="オーダー日付">
        @error('order_date')<span>{{ $message }}</span>@enderror
    </div>

    {{-- FE:
    <div>
        <label>ステータス:</label>
        <select name="status">
            <option value="0">実行中</option>
            <option value="1">非活性</option>
            <option value="2">保留</option>
            <option value="3">完了</option>
            <option value="4">キャンセル</option>
        </select>
        @error('status')<span>{{ $message }}</span>@enderror
    </div> --}}


    {{-- BE --}}
    <div>
        <label>ステータス:</label>
        <select name="status">
            @foreach (\App\Http\Controllers\ProjectCreationController::STATUS_LABELS as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<span>{{ $message }}</span>@enderror
    </div>


    <div>
        <label>受注額:</label>
        <input type="text" name="order_income" placeholder="受注額">
        @error('order_income')<span>{{ $message }}</span>@enderror
    </div>

    <div>
        <label>社内単金:</label>
        <input type="text" name="internal_unit_price" placeholder="社内単金">
        @error('internal_unit_price')<span>{{ $message }}</span>@enderror
    </div>

    <button type="submit">登録</button>
</form>

</body>
</html>
