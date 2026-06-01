<!DOCTYPE html>
<html>
<head>
    <title>MyWorkbook List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9edf3;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.10);
            border: 1px solid #dde3ec;
        }

        h2 {
            margin: 0;
            margin-bottom: 15px;
            color: #2f2f2f;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn-add {
            background: #3f51b5;
            color: white;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #2f3ea0;
        }

        .success {
            background: #e7f7ec;
            color: #1e6b34;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #2e7d32;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #3f51b5;
            color: white;
            text-align: left;
            padding: 12px;
            font-size: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }

        tr:nth-child(even) {
            background: #f7f9fc;
        }

        tr:hover {
            background: #eef2ff;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="top-bar">
            <h2>Records</h2>

            <a href="{{ route('myworkbook.create') }}" class="btn-add">
                + Add New
            </a>
			
			<a href="{{ route('myworkbook.export.pdf', ['start_date' => request('start_date'),'end_date'   => request('end_date')]) }}" class="btn-add" style="background:#c62828;">
             PDF
        </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

		<form method="GET" action="{{ route('myworkbook.list') }}" style="margin-bottom:20px;">
    <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">

        <label>From:</label>
        <input type="date"
               name="start_date"
               value="{{ request('start_date') }}"
               style="padding:8px;border:1px solid #ccc;border-radius:6px;">

        <label>To:</label>
        <input type="date"
               name="end_date"
               value="{{ request('end_date') }}"
               style="padding:8px;border:1px solid #ccc;border-radius:6px;">

        <button type="submit"
                style="background:#4caf50;color:white;padding:8px 15px;border:none;border-radius:6px;cursor:pointer;">
            Filter
        </button>

        <a href="{{ route('myworkbook.list') }}"
           style="background:#757575;color:white;padding:8px 15px;border-radius:6px;text-decoration:none;">
            Reset
        </a>

    </div>
</form>

        <div class="table-wrapper">

            <table>
                <tr>
                    <th>ID</th>
                    <th>Reference</th>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Remark</th>
                    <th>Signature</th>
					<th>Action</th>
                </tr>

                @forelse($data as $row)
                    <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->Reference }}</td>
                        <td>{{ $row->{'Task Name'} }}</td>
                        <td>{{ $row->{'Start Date'} }}</td>
                        <td>{{ $row->{'End Date'} }}</td>
                        <td>{{ $row->Status }}</td>
                        <td>{{ $row->Remark }}</td>
                        <td>{{ $row->Signature }}</td>
						
						<td>
							<a href="{{ route('myworkbook.edit', $row->ID) }}" 
							style="background:#ff9800;color:white;padding:6px 10px;border-radius:6px;text-decoration:none;">Edit</a>
						</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty">No records found</td>
                    </tr>
                @endforelse

            </table>

        </div>

    </div>

</div>

</body>
</html>