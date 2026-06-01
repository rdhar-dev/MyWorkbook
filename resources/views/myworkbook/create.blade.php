<!DOCTYPE html>
<html>
<head>
	<title>MyWorkbook Tasks</title> 
	<style> 
		body 
		{ 
			font-family: Arial, 
			sans-serif; 
			background: #e9edf3; 
			/* soft neutral gray-blue */ 
			margin: 0; 
			padding: 40px ;
		} 
		.container
		{ 
			max-width: 	650px; 
			margin:	auto; 
		}
	
		.card
		{ 
			background: #ffffff; 
			padding: 30px; 
			border-radius: 12px; 
			box-shadow: 0 8px 22px rgba(0,0,0,0.10); 
			border: 1px solid #dde3ec; 
		} 
		.card-header 
		{ 
			text-align: center; 
			margin-bottom: 18px; 
			font-size: 18px; 
			font-weight: bold; color: #3f51b5; 
		} 
		h2
		{ 	
			text-align: center; 	
			margin-bottom: 20px;
			color: #2f2f2f; 
		} 
		.form-group 
		{
			margin-bottom: 15px;
		} 
		label 
		{ 
			display: block; 
			font-weight: 600;
			margin-bottom: 6px; 
			color: #333;
		} 
		input, textarea, select
		{ 
			width: 100%; 
			padding: 11px; 
			border: 1px solid #cfd6e4; 
			border-radius: 8px; 
			font-size: 14px;
			background: #f9fafc; 
			transition: 0.2s;
			box-sizing: border-box;
		} 
		input:focus, textarea:focus, select:focus 
		{
			border-color: #3f51b5;
			box-shadow: 0 0 0 3px rgba(63, 81, 181, 0.15); 
			outline: none; background: #fff; 
		} 
		textarea 
		{
			resize: vertical; 
			height: 90px;
		} 
		.btn 
		{
			width: 100%; 
			padding: 12px; 
			background: #3f51b5; color: white; 
			border: none; 
			border-radius: 8px; 
			font-size: 15px; cursor: pointer; 
			transition: 0.2s;
		} 
		.btn:hover 
		{ 
			background: #2f3ea0;
		} 
		.btn-secondary 
		{
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
		.btn-secondary:hover 
		{
			background: #e3e7ef;
		} 
		.success 
		{
			background: #e7f7ec;
			color: #1e6b34; 
			padding: 10px;
			border-radius: 8px; 
			margin-bottom: 15px; 
			border-left: 4px solid #2e7d32;
		} 
	</style> 
	</head> 
	<body>
		<div class="container"> 
		<div class="card"> 
		<div class="card-header">
			📋 MyWorkbook Tasks 
		</div> 
		<h2>Task Entry Form</h2> 
		@if(session('success')) 
			<div class="success"> 
				{{ session('success') }} 
			</div>
		@endif
		<form method="POST" action="{{ route('myworkbook.store') }}">
			@csrf
			<div class="form-group"> 
				<label>Reference</label>
					<input type="text" name="reference" placeholder="Enter reference number" value="{{ old('reference') }}"> 
			</div>
			<div class="form-group">
				<label>Task Name</label>
				<input type="text" name="task_name" placeholder="Enter task name" value="{{ old('task_name') }}">
			</div> 
			<div class="form-group">
				<label>Start Date</label>	
					<input type="datetime-local" name="start_date" value="{{ old('start_date') }}">
			</div> 
			<div class="form-group"> 
				<label>End Date</label> <input type="datetime-local" name="end_date" value="{{ old('end_date') }}">
			</div>
			<div class="form-group"> 
				<label>Status</label> 
					<select name="status">
						<option value="New">New</option> 
						<option value="In progress">In progress</option> 
						<option value="Completed">Completed</option>
					</select> 
			</div>
			<div class="form-group"> 
				<label>Remark</label>
					<textarea name="remark" placeholder="Enter remarks...">{{ old('remark') }}</textarea>
			</div>
			<div class="form-group"> 
				<label>Signature</label> 
				<input type="text" name="signature" placeholder="Enter signature" value="{{ old('signature') }}">
			</div>
			<button type="submit" class="btn">Save Task</button>
		</form> 
		<a href="{{ route('myworkbook.list') }}" class="btn-secondary"> View List </a> 
		</div> 
	</div> 
</body> 
</html>