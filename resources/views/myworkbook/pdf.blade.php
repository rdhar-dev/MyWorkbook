<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>MyWorkbook Report</title>
<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        color: #333;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h2 {
        margin: 0;
        color: #2c3e50;
    }

    .header p {
        margin: 5px 0;
        color: #666;
        font-size: 11px;
    }

    .report-info {
        margin-bottom: 15px;
    }

    .report-info span {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #3f51b5;
        color: white;
    }

    th {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
        font-size: 11px;
    }

    td {
        padding: 7px;
        border: 1px solid #ddd;
        font-size: 10px;
    }

    tbody tr:nth-child(even) {
        background: #f5f5f5;
    }

    .status-complete {
        color: green;
        font-weight: bold;
    }

    .status-pending {
        color: #d35400;
        font-weight: bold;
    }

    .footer {
        position: fixed;
        bottom: -15px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 10px;
        color: #777;
    }
</style>

</head>

<body>
<div class="header">
    <h2>MyWorkbook Report</h2>

    <p>
        Generated on:
        {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
    </p>
</div>

@if(!empty($start_date) || !empty($end_date))
    <div class="report-info">
        <span>Period:</span>
        {{ $start_date ?: 'Beginning' }}
        -
        {{ $end_date ?: 'Today' }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="12%">Reference</th>
            <th width="22%">Task Name</th>
            <th width="12%">Start Date</th>
            <th width="12%">End Date</th>
            <th width="10%">Status</th>
            <th width="27%">Remark</th>
        </tr>
    </thead>

    <tbody>
    @forelse($data as $row)
        <tr>
            <td>{{ $row->ID }}</td>
            <td>{{ $row->Reference }}</td>
            <td>{{ $row->{'Task Name'} }}</td>
            <td>{{ $row->{'Start Date'} }}</td>
            <td>{{ $row->{'End Date'} }}</td>

            <td>
                @if(strtolower($row->Status) == 'completed')
                    <span class="status-complete">
                        {{ $row->Status }}
                    </span>
                @else
                    <span class="status-pending">
                        {{ $row->Status }}
                    </span>
                @endif
            </td>

            <td>{{ $row->Remark }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="7" style="text-align:center;">
                No records found
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="footer">
    MyWorkbook Report
</div>

</body>
</html>
