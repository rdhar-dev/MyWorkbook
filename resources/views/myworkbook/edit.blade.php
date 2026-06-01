<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9edf3;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.10);
            border: 1px solid #dde3ec;
        }

        .card-header {
            text-align: center;
            margin-bottom: 18px;
            font-size: 18px;
            font-weight: bold;
            color: #3f51b5;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2f2f2f;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }

        input, textarea, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cfd6e4;
            border-radius: 8px;
            font-size: 14px;
            background: #f9fafc;
			box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 90px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #3f51b5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn:hover {
            background: #2f3ea0;
        }

        .btn-secondary {
            display: block;
            text-align: center;
            margin-top: 12px;
            padding: 10px;
            background: #f1f3f7;
            color: #3f51b5;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="card-header">
            ✏️ Edit Task
        </div>

        <h2>Update Task Details</h2>

        <form method="POST" action="{{ route('myworkbook.update', $data->ID) }}">
            @csrf
			@method('PUT')
            <div class="form-group">
                <label>Reference</label>
                <input type="text" name="reference"
                    value="{{ old('reference', $data->Reference) }}">
            </div>

            <div class="form-group">
                <label>Task Name</label>
                <input type="text" name="task_name"
                    value="{{ old('task_name', $data->{'Task Name'}) }}">
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="datetime-local" name="start_date"
                    value="{{ old('start_date', \Carbon\Carbon::parse($data->{'Start Date'})->format('Y-m-d\TH:i')) }}">
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="datetime-local" name="end_date"
                    value="{{ old('end_date', \Carbon\Carbon::parse($data->{'End Date'})->format('Y-m-d\TH:i')) }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="New" {{ $data->Status == 'New' ? 'selected' : '' }}>New</option>
                    <option value="In progress" {{ $data->Status == 'In progress' ? 'selected' : '' }}>In progress</option>
                    <option value="Completed" {{ $data->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Remark</label>
                <textarea name="remark">{{ old('remark', $data->Remark) }}</textarea>
            </div>

            <div class="form-group">
                <label>Signature</label>
                <input type="text" name="signature"
                    value="{{ old('signature', $data->Signature) }}">
            </div>

            <button type="submit" class="btn">
                Update Task
            </button>

        </form>

        <a href="{{ route('myworkbook.list') }}" class="btn-secondary">
            Back to List
        </a>

    </div>

</div>

</body>
</html>