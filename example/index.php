<html>
<head>
<title>API user sign up</title>
</head>
<body>
<form action="create_user.php" method="post">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name"/>
    </div>
    <div>
        <label for="mail">E-mail:</label>
        <input type="email" name="mail"/>
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" type="password"/>
    </div>
    <div>
        <button type="submit">Go</button>
    </div>
</form>
</body>
</html>