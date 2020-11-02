<div id="signup-modal" class="w3-modal">
	<div class="w3-modal-dialog">
		<div class="w3-modal-content">
	      <div class="w3-modal-header">
		     <button type="button" class="w3-button w3-red w3-right w3-xxlarge" onclick="w3_close('signup-modal')" aria-hidden="true">&times;</button>
	           <center><h1 class="modal-title"></h1></center>
          </div>
             <div class="modal-body ag-signup">
                <form id='sign-up-form' role="form">
                   <table class='t1'><input type=hidden name=todo value='post-data'>
						<tr class='r1'>
							<td><label for="cUname">User Name</label></td>
							<td><input type=text class = "form-control" id='cUname' size=15>Minimum 6 & Maximum 15 (Alphanumeric only)</td>
						</tr>
						<tr class='r0'>
							<td><label for="cPass">Password</label></td>
							<td><input type=password class = "form-control" id='cPass'  placeholder="&#9675;&#9675;&#9675;&#9675;&#9675;&#9675;">Minimum 6 & Maximum 32</td>
						</tr>

						<tr class='r1'>
							<td><label for="cCPass">Password ( Retype)</label></td>
							<td><input type=password class = "form-control" id='cCPass'  placeholder="&#9675;&#9675;&#9675;&#9675;&#9675;&#9675;"></td>
						</tr>

						<tr class='r0'>
							<td><label for="cEmail">Email Contact</label></td>
							<td><input type=text class = "form-control" id='cEmail'  size=40></td>
						</tr>

						<tr class='r0'>
							<td><label for="cPhone">Phone Contact</label></td>
							<td><input type=text class = "form-control" id='cPhone'  size=40></td>
						</tr>						

						<tr class='r1'>
							<td><label for="cfName">First Name</label></td>
							<td><input type=text class = "form-control" id='cfName'  size=40></td>
						</tr>

						<tr class='r0'>
							<td><label for="clName">Last Name</label></td>
							<td><input type=text class = "form-control" id='clName' >
							</td>
						</tr>

						<tr class='r1'>
							<td><label for="cmName">Address 1</label></td>
							<td><input type=text class = "form-control" id='cmName'></td>
						</tr>

						<tr class='r0'>
							<td><label for="cAddre">Address 2</label></td>
							<td><input type=text class = "form-control" id='cAddre'></td>
						</tr>

						<tr class='r1'>
							<td><label for="city">City</label></td>
							<td><input type=text class = "form-control" id='city'>
							</td>
						</tr>

						<tr class='r0'>
							<td><label for="state">State</label></td>
							<td><input type=text class = "form-control" id='state'>
							</td>
						</tr>

						<tr class='r1'>
							<td><label for="country">Country</label></td><td>
								<input type=text class = "form-control" id='country' value='$country'></td>
							</tr>

						<tr class='r0'>
							<td><label for="zip">Zip / Postal Code</label></td>
							<td><input type=text class = "form-control" id='zip' placeholder = 'zipcode'></td>
						</tr>

						<tr class='r1'>
							<center></center><td colspan=2><input type="checkbox" value="yes" id="terms">I Agree to 
								<a href='/terms.html' target='new'>Terms & Conditions</a></center></td>
						</tr>

						<tr class='r1'><td colspan="2"><input type=submit value='clientSignup' class="w3-input form-control w3-blue"></td></tr>

				   </table>
				</form>
			</div>
		</div>
	</div>
</div>