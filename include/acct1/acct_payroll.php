
    <script>
        function set_item()
        {
            
            
            var popup_winow = '';

            
            popup_window = window.open("", "set_item_popup", "titlebar=data toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,height=500,width=450,resizable=no");
            document.form1.action = "../../include/acct/employee_popup.php";
            document.form1.target = "set_item_popup";
            document.form1.submit();

            popup_window.focus();

        }
            function set_opener_data(item_id, item_name, dept, pos, basicpay, status, daily){

            var hourly = (daily/8);
            
            document.getElementById('employeeid').value = item_id;
            document.getElementById('txt_employeename').value = item_name;
            document.getElementById('txt_dept').value = dept;
            document.getElementById('txt_pos').value = pos;
            document.getElementById('txt_basicpay').value = basicpay;
            document.getElementById('txt_status').value = status;
            document.getElementById('txt_daily').value = daily;
            document.getElementById('txt_hourly').value = hourly;
        
        }

            function compute(){
                var hourp = document.getElementById('txt_hourly').value;
                var pperiod = document.getElementById('pay_period').value;
                var dwork = document.getElementById('days_work').value;
                var otpay = document.getElementById('overtimepay').value;
                var daily = document.getElementById('txt_daily').value;
                var otperhour = ((hourp * 1.2)* otpay);
                var permonth = (parseInt(document.getElementById('txt_basicpay').value) + otperhour);
                var halfmonth = (daily * dwork) + otperhour;
                document.getElementById('one_payroll').value = halfmonth;

            }
    </script>

    <div id="acct_payroll_content">
   
    <form name= "form1">
    <p><font color="orange"><b>Input Data Needed to Compute Salary</b></font></p>
		
        <table  border="0px" cellpadding="1px" width="100%">
		<tr>
		<td><b>Employee Information<b></td>
		</tr>
            <tr>
				<td>Employee Name :</td>
				<td><input type='text' id='txt_employeename' name='txt_employeename' readonly='true' size='30%'></td>
				<td><input type="button" value="Select" onclick="javascript:set_item();" id="btn2"></td>
			</tr>
			<tr>
				<td>Employee ID :</td>
				<td><font color="orange"><input type="text" id="employeeid" name="employeeid" value="" disabled="false"></font></td>
                <td>Department :</td>
				<td><input type='text' value="" name='txt_dept' id='txt_dept' disabled='false'></td>
				<td>Position :</td>
                <td><input type='text' value="" name='txt_pos' id='txt_pos' disabled='false'></td>
                
			</tr>
			<tr>
			

                <td>Status :</td>
                <td><input type="text" name="txt_status" id="txt_status" value="" disabled="false"></input></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
            </tr>
			<br>
			
			
			<tr>
			<td><b>Payroll Information</b></td>
			</tr>
            <tr>
                <td>Payroll Period :</td>
                <td><input type="text" size="25" name="pay_period" id="pay_period" onKeyPress="return numbersonly(this, event)"></td>
                <td>Days Worked :</td>
                <td><input type="text" size="25" name="days_work" id="days_work" min = "1" max = '22' onKeyPress="return numbersonly(this, event)"></td>
                <td>Overtime :</td>
                <td><input type="text" size="25" name="overtimepay" id="overtimepay" onKeyPress="return numbersonly(this, event)"></td>             
            </tr>
            <tr>
                <td>Basic Pay :</td>
                <td>
                    <input type='text' value="" name='txt_basicpay' id='txt_basicpay' disabled='false'>
                </td>
            </tr>
			<tr>
				<td><b>Payroll Details</b></td>
			</tr>
            <tr>
                <td>Per Cutoff Salary:</td>
                <td><input type='text' value="" name='one_payroll' id='one_payroll' disabled='false'></td>
                <td>Daily Salary:</td>
                <td> <input type='text' value="" name='txt_daily' id='txt_daily' disabled='false'></td>
                <td>Hourly Rate:</td>
                <td><input type='text' value="" name='txt_hourly' id='txt_hourly' disabled='false'></td>
            </tr>
			</table>
			<br>
			<?php
			/*
			<b>Deductions</b>
			<table>
            <tr>
                <td>Tardiness(hr/s) :</td>
                <td>[DATA FROM DATABASE]</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Undertimehr/s) :</td>
                <td>[DATA FROM DATABASE]</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Absent:</td>
                <td>[DATA FROM DATABASE]</td>
            </tr>
        </table>*/
		?>
        <center>
        <input type="Button" Value="Compute" id= "btn" onclick="compute()">
        </center>
    </form>
</div>
