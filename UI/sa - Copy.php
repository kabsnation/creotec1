<!DOCTYPE html>
<html>
<head>
		<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_validation.js"></script>
	<!-- /theme JS files -->
</head>
<body> 

	<div class="col-lg-3">
    
	    <label class="text-bold">Select Month:</label>
		<select id="month" name="month" class="form-control">
		    <option value='1'>January</option>
		    <option value='2'>February</option>
		    <option value='3'>March</option>
		    <option value='4'>April</option>
		    <option value='5'>May</option>
		    <option value='6'>June</option>
		    <option value='7'>July</option>
		    <option value='8'>August</option>
		    <option value='9'>September</option>
		    <option value='10'>October</option>
		    <option value='11'>November</option>
		    <option value='12'>December</option>
		</select>
		
		
    </div>

    <div class="col-lg-3">
	    <label class="text-bold">Select Day:</label>
	    <select id="day" name="day" class="form-control"></select>
    </div>

    <div class="col-lg-3">
	    <label class="text-bold">Select Year:</label>
	    <select id="year" name="year" class="form-control">
	    </select>
    </div>

    <div class="col-lg-3">
    	<button type="submit" onclick="compute(this)">Compute</button>
    </div>

    <script type="text/javascript">
    	var ysel = document.getElementsByName("year")[0],
		    msel = document.getElementsByName("month")[0],
		    dsel = document.getElementsByName("day")[0];
		    
		    for (var i = 2017; i>=1950; i--){
			    var opt = new Option();
			    opt.value = opt.text = i;
			    ysel.add(opt); 
			}

			ysel.addEventListener("change",validate_date);
			msel.addEventListener("change",validate_date);

		function validate_date(){
		    var y = +ysel.value, m = msel.value, d = dsel.value;

		    if (m === "2")  var mlength = 28 + (!(y & 3) && ((y % 100)!==0 || !(y & 15)));
		    
		    else var mlength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m - 1];

		    dsel.length = 0;

		    for(var i=1; i<=mlength; i++){
		    	var opt=new Option();   
		    	opt.value = opt.text = i;   
		    	if(i==d) 
		    		opt.selected=true;     
		    	dsel.add(opt);
		    }
		} 

		validate_date();

		function compute(){
			var m = document.getElementById("month").value;
			var d = document.getElementById("day").value;
			var y = document.getElementById("year").value;
			
			for( i = 0; i <= y.length; i++){
				var a = document.getElementById("year").value;
				a = y.charAt(i);

				var sum = 0;
				
				sum += parseInt(a);

				if(sum == 11 && sum == 22){
					var total = 0;
					parseInt(total) = sum + parseInt(d) + parseInt(y);
					alert(total);
				}
				if(sum > 0 && sum < 11){
					var total = sum + d + y;
					alert(total);
				}

			}
		}
    </script>

</body>
</html>