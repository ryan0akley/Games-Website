<?php
$_REQUEST['new_user']=!empty($_REQUEST['new_user']) ? $_REQUEST['new_user'] : '';
$_REQUEST['new_password']=!empty($_REQUEST['new_password']) ? $_REQUEST['new_password'] : '';
$_REQUEST['verify_password']=!empty($_REQUEST['verify_password']) ? $_REQUEST['verify_password'] : '';
$_REQUEST['fun_fact']=!empty($_REQUEST['fun_fact']) ? $_REQUEST['fun_fact'] : '';
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" type="text/css" href="style.css" />
                <title>Register</title>
        </head>
        <body>
                <main>
                        <hr/>

                        <section>
                                <h1>Register</h1>
                                <form action="index.php" method="post">
					<legend>Create Username:</legend>
                                        <table>
                                                <!-- Trick below to re-fill the user form field -->
                                                <tr><th><label for="new_user">New Username</label></th><td><input type="text" name="new_user" value="<?php echo($_REQUEST['new_user']); ?>" maxlength="15" /></td></tr>
					</table>
					<br/>

					<legend>Create Password:</legend>
					<table>
						<tr><th><label for="new_password">New Password</label></th><td> <input type="password" name="new_password" maxlength="15" /></td></tr>
						<tr><th><label for="verify_password">Verify Password</label></th><td> <input type="password" name="verify_password" maxlength="15" /></td></tr>
					</table>
					<br/>

					<legend>Details:</legend>
					<table>
						<tr> <th> Choose a Profile Picture: </th> <td>
							<section class="pfps">
							
							<section class="pfps-box">
							<img src='view\imgs\wide_cat.jpg' width='80px' height='80px'> <br/>
							<input type='radio' id='pfp1' name='pfp' value='pfp1' />
							</section>
							<section class="pfps-box">
							<img src='view\imgs\tarens.jpg' width='80px' height='80px'><br/>
							<input type='radio' id='pfp2' name='pfp' value='pfp2' />
							</section>
							<section class="pfps-box">
							<img src='view\imgs\cat.jpg' width='80px' height='80px'><br/>
							<input type='radio' id='pfp3' name='pfp' value='pfp3' />
							</section>
							<section class="pfps-box">
							<img src='view\imgs\gregg.jpg' width='80px' height='80px'><br/>
							<input type='radio' id='pfp4' name='pfp' value='pfp4' />
							</section>
							<section class="pfps-box">
							<img src='view\imgs\space.jpg' width='80px' height='80px'><br/>
							<input type='radio' id='pfp5' name='pfp' value='pfp5' />
							</section>

							</section>
						</td> </tr>
						<tr> <th> Profile Tag(s): </th> <td>
							<input type="checkbox" id="Jolly" name="tag[]" value="Jolly" />
                                                        <label for="Jolly">Jolly</label>
							<input type="checkbox" id="Sleepy" name="tag[]" value="Sleepy" />
							<label for="Sleepy">Sleepy</label>
							<input type="checkbox" id="Mysterious" name="tag[]" value="Mysterious" />
							<label for="Mysterious">Mysterious</label>
							<input type="checkbox" id="Devious" name="tag[]" value="Devious" />
							<label for="Devious">Devious</label>
							<input type="checkbox" id="Silly" name="tag[]" value="Silly" />
                                                        <label for="Silly">Silly</label>
							
						</td> </tr>
						<tr> <th> Choose Your Favourite Animal: </th> <td>
							<select name="animal">
							<option value="cat">cat</option>
							<option value="not_cat">not cat</option>
							</select> 
						</td> </tr>
						<tr> <th> Fun Fact About Yourself: </th> <td>
							<textarea id="fun_fact" name="fun_fact" rows="3" cols="30" maxlength="200"></textarea>
						</td> </tr>
					</table> <br/>

					<tr><th>&nbsp;</th><td><input id="register-button" type="submit" name="submit" value="Register" /></td></tr> <br/>
                                        <tr><th>&nbsp;</th><td><?php echo(view_errors($errors)); ?></td></tr> <br/>
				</form>
                                <a id="register" href="?q=login">Back</a>
                        </section>
                        <section>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>
