<html>
	<head>
		<title>PHP Review</title>
	</head>
	<body>
		<form action="save.php" method="get">
                        <input type="hidden" name="secret_key" value="some secret value" />
			<div>
				<label>enter your name</label>
				<input type="text" name="name" />
			</div>
			<div>
				<label>enter your email</label>
				<input type="text" name="email" />
			</div>
			<div>
				<label>Select your state</label>
				<select name="state">
                                    <option value="WI">Wisconsin</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MI">Michigan</option>
                                    <option value="IA">Iowa</option>
				</select>
			</div>
			<div>
                            <label>choose restaurants that you like</label><br />
                            <input type="checkbox" name="tbell" value="Taco Bell" />Taco Bell<br />
                            <input type="checkbox" name="mcdonalds" value="McDonalds" />McDonalds<br />
                            <input type="checkbox" name="bk" value="BK" />Burger King<br />
                            <input type="checkbox" name="kfc" value="KFC" />KFC<br />
			</div>
			<div>
                            <label>choose your color:</label><br />
                            <input type="radio" name="color" value="red" checked />Red<br />
                            <input type="radio" name="color" value="blue" />Blue<br />
			</div>
			<input type="submit" value="save data" />
		</form>
	</body>
</html>
