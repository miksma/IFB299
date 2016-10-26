	<div class="row">
		<div class="col-md-9">
			<form method="POST" class="form-order-lookup form-horizontal">
				<div class="form-group">
					<h2 class="form-order-lookup">Orders</h2>
					<div id="error"></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputEmail">Customer Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputCustomerName">Cutomer Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputCustomerName" placeholder="Customer Name" name="customerName" maxlength="255" pattern="^[\w]{2,255}(?:\s[\w]{2,255})*(?!=\W)$">
					</div>
				</div>

				<div class="form-group">
					<label for="priority" class="col-sm-2 control-label">Order Priority</label>
					<div class="col-sm-10">
						<div class="radio">
							<label><input type="radio" name="priority" value="Express">Express</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="priority" value="Standard" checked="checked">Standard</label>
						</div>
							<div class="radio">
						<label><input type="radio" name="priority" value="" checked="checked">All</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="inputStatus">Order Status</label>
					<div class="col-sm-10">
						<select class="form-control" id="inputStatus" name="status">
							<option value="" selected="">- Select Status -</option>
							<option>Ordered</option>
							<option>Picking Up</option>
							<option>Picked Up</option>
							<option>Storing</option>
							<option>Delivering</option>
							<option>Delivered</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="pickupTime">Pickup Time</label>
					<div class="col-sm-10">
						<input type="datetime-local" class="form-control" id="pickupTime" name="pickupTime">
					</div>
				</div>

				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Search</button>
				</div>
			</form>
		</div>

		<!--Filter Verification and Orders Output-->
		<?php
			if($_SERVER["REQUEST_METHOD"] === "POST")
			{
				$errors = array();
				$formValid = true;

				//Get Dependancies
				require_once 'php/formValidation.php';

				//PHP Field Validation
				$errors = array();

				/*
					Check for Set Search Filters and Validate
					their respective input values
				*/
				if(isset($_POST['email']) && !empty($_POST['email']))
				{
					$errors["email"] = checkEmail($_POST['email']);
				}
				if(isset($_POST['customerName']) && !empty($_POST['customerName']))
				{
					$errors["customerName"] = checkFullName($_POST['customerName']);
				}
				if(isset($_POST['status']) && !empty($_POST['status']))
				{
					$errors["status"] = checkStatus($_POST['status']);
				}
				if(isset($_POST['priority']) && !empty($_POST['priority']))
				{
					$errors["priority"] = checkPriority($_POST['priority']);
				}
				if(isset($_POST['pickupTime']) && !empty($_POST['pickupTime']))
				{
					$errors["pickupTime"] = checkTime($_POST['pickupTime']);
				}

				//Check for presence of errors and output
				foreach($errors as $field => $valid)
				{
					if($valid === false)
					{
						$formValid = false;
						echo "Invalid " . $field . " detected<br />";
					}
				}

				//Check Form is Valid
				if($formValid)
				{
					require_once 'php/output.php';
					require_once 'php/search.php';

					//Run Search Query and Output Results
					outputResultOrders(searchOrder($_POST['email'], $_POST['customerName'], $_POST['priority'], $_POST['status'], $_POST['pickupTime']), "");
				}

			}
		?>
	</div>
