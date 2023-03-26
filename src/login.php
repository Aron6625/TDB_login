<?php

$formla = <<<XML
  <link rel="stylesheet" href="/src/assets/login_style.css">

  <form
    method="POST"
    action="/src/Action/user-login.php"
    name="some-data"
  >
    <div class="form-element">
      <label>Username</label>
      <input type="text" name="user" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
      <label>Password</label>
      <input type="password" name="password" required />
    </div>
    <button type="submit">Log In</button>
  </form>
XML;

echo $formla;
