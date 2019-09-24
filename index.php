<!DOCTYPE html>
<html>
<head>
	<title>Bluecastle</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
	 integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">	
	<script src ="script.js?v=<?php echo time(); ?>" type="text/javascript"></script>
	<?php 
		$id = 4335506; #change to 4151515 to display different students data
		$servername = "mysql.cs.nott.ac.uk";
		$username = "psxad4_db";
		$password = "Asas11";
		$dbasename = "psxad4_db";
		$conn = new mysqli($servername, $username, $password, $dbasename);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	?>
</head>

<body>
	<div class="grid-container">
		<div class="header">
			<img src="logo.png" alt="Logo">
		</div>
		<div class="dashboard">
			<table>
					<?php
						$sql = "SELECT name, s.student_id, username, title FROM Student s, student_course sc, Course c where s.student_id='$id' AND sc.student_id = s.student_id AND c.course_id = sc.course_id ";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><th>".$row["name"]."</th><th>".$row["student_id"]."</th><th>".$row["username"]."</th><th>".$row["title"];
							}
						} else {
							echo "0 results";
						}
					?>
					<th><a href='https://bluecastle.nottingham.ac.uk'>Sign Out</a></th>
			</table>
			
		</div>
		<div class="links">

			<div class="link">
				<button onclick="drop('modules','down1')"><span class="fas fa-th-list"></span><i id="down1" class="fas fa-caret-down fa-lg"></i>Modules</button>
				<div id="modules" class="hidden">
				<table>
					<tr>
						<th>Code</th>
						<th>Title</th>
						<th>Credits</th>
						<th>Semester</th>
					</tr>
					<?php
						$sql = "SELECT module_id, title, credits, semester FROM Student, student_module, Module where student_id ='$id' and module_id = mod_id and student_id = stud_id ORDER BY semester ASC" ;
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$row["module_id"]."</td><td>".$row["title"]."</td><td>".$row["credits"]."</td><td>".$row["semester"]."</td></tr>";
							}
						} else {
							echo "0 results";
						}
						#$conn->close();
					?>
					
				</table>
			</div>
				</div>
			<div class="link">
				<button onclick="drop('exams','down2')"><span class="fas fa-scroll"></span><i id="down2" class="fas fa-caret-down fa-lg"></i>Exams</button>
				<div id="exams" class="hidden">
				</div>
				</div>
			<div class="link">
				<button onclick="drop('marks','down3')"><span class="fas fa-pen"></span><i id="down3" class="fas fa-caret-down fa-lg"></i>Marks</button>
				<div id="marks" class="hidden">
				<table>
					<tr>
						<th>Code</th>
						<th>Title</th>
						<th>Mark</th>
					</tr>
						<?php
						$sql = "SELECT module_id, title, mark FROM Student, student_module, Module where student_id='$id' and module_id = mod_id and student_id = stud_id ORDER BY semester ASC";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$row["module_id"]."</td><td>".$row["title"]."</td><td>".$row["mark"]."</td></tr>";
							}
						} else {
							echo "0 results";
						}
					?>
				</table>
			</div>
			</div>

			<div class="link">
				<button onclick="drop('progression','down4')"><span class="fas fa-user-check"></span><i id="down4" class="fas fa-caret-down fa-lg"></i>Progression</button>
				<div id="progression" class="hidden">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
			<div class="link">
				<button onclick="drop('award','down5')"><span class="fas fa-graduation-cap"></span><i id="down5" class="fas fa-caret-down fa-lg"></i>Award</button>
				<div id="award" class="hidden">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
	</div>

			<div class="link">
				<button onclick="drop('surveys','down6')"><span class="fas fa-poll"></span><i id="down6" class="fas fa-caret-down fa-lg"></i>Surveys</button>
				<div id="surveys" class="hidden">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		</div>
		<div class="footer">
			<a href="http://www.nottingham.ac.uk/utilities/copyright.aspx" class="footer_button">Copyright</a>
			<a href="http://www.nottingham.ac.uk/utilities/website-terms-of-use.aspx" class="footer_button">Terms and Conditions</a>
			<a href="http://www.nottingham.ac.uk/utilities/privacy.aspx" class="footer_button">Privacy and Cookies</a>
			<a href="http://www.nottingham.ac.uk/utilities/posting-rules.aspx" class="footer_button">Posting Rules</a>
			<a href="http://www.nottingham.ac.uk/utilities/accessibility/accessibility.aspx" class="footer_button">Accessibility</a>
			<a href="http://www.nottingham.ac.uk/utilities/foi.aspx" class="footer_button">Freedom of Information</a>
		</div>
	

</body>
</html>