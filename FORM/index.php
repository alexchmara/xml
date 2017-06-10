<?php
if(isset($_POST['submit'])){
  $file = "data.xml";
  $userNode='new_user';

  $doc = new DOMDocument('1.0');
  $doc->preserveWhiteSpace=false;
  $doc->load($file);
  $doc->formatOutput = true;
  $root = $doc->documentElement;

  $post = $_POST;
  unset($post['submit']);
  $user = $doc->createElement($userNode);
  $user = $root->appendChild($user);
  foreach($post as $key => $value) {
    $node = $doc->createElement($key,$value);
    $user->appendChild($node);
  }
  $doc->save($file) or die('Sorry, an error occured');
  header('Location:great.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>form</title>
<meta name="viewport" content="initial-scale=1.0" />
</head>
<body>

  <form name="form1" method="post" action="">
    <p>
      <label for="user_name">Name </label>
      <input type="text" name="user_name" id="name" placeholder="Type in your name" autofocus required>
    </p>
    <p>
      <label for="email">Email </label>
      <input type="email" name="email" id="email">
    </p>
    <p>
      <label for="mobile">Mobile </label>
      <input type="mobile" name="mobile" id="mob">
    </p>
    <p>
     <label for="birth_date">Date of birth: </label>
     <input type="date" name="birth" id="dob">
    </p>

    <p style="text-align: center;">
     <input type="submit" name="submit" id="submit" value="Submit">
    </p>
  </form>

</body>
</html>
