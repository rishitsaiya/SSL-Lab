<?php
  require_once 'login.php';
  $conn = new mysqli($db_hostname, $db_user, $db_password, $db_database);
  if ($conn->connect_error)
    die("Fatal Error");
//-----------------------------------------------------------------
  if (isset($_POST['delete']) && isset($_POST['title']))
  {
    $title   = get_post($conn, 'title');
    $query  = "DELETE FROM titles WHERE title='$title'";
    $result = $conn->query($query);
    if (!$result)
      echo "DELETE from titles failed<br><br>";
  }
  if (isset($_POST['delete']) && isset($_POST['author']) && isset($_POST['publisher']))
  {
    $author   = get_post($conn, 'author');
    $publisher  = get_post($conn, 'publisher');
    $query  = "DELETE FROM authors WHERE author='$author' AND publisher = '$publisher'";
    $result = $conn->query($query);
    if (!$result)
      echo "DELETE from authors failed<br><br>";
  }
  if (isset($_POST['insert']) && isset($_POST['author']) && isset($_POST['title']) && isset($_POST['year']))
  {
    $author   = get_post($conn, 'author');
    $title    = get_post($conn, 'title');
    $year     = get_post($conn, 'year');
    // echo gettype($author)." ".gettype($year);
    if(gettype($author)=='string' && gettype($title)=='string' && is_numeric($year))
    {
      $query    = "INSERT INTO titles VALUES"."('$title','$author','$year')";
      $result   = $conn->query($query);
      if (!$result)
        echo "INSERT failed<br><br>";
    }
    else
      echo "Enter Valid Input";
  }
  if (isset($_POST['insert']) && isset($_POST['author']) && isset($_POST['publisher']))
  {
    $author   = get_post($conn, 'author');
    $publisher  = get_post($conn, 'publisher');
    if(gettype($author)=='string' && gettype($publisher)=='string')
    {
      $query    = "INSERT INTO authors VALUES"."('$author','$publisher')";
      $result   = $conn->query($query);
      if (!$result)
        echo "INSERT failed<br><br>";
    }
    else
    {
      echo "Enter Valid Input";
    }
  }
  if(isset($_POST['year']) && isset($_POST['title']))
  {
    $title = get_post($conn, 'title');
    $year = get_post($conn, 'year');
    if(is_numeric($year))
    {
      $query = "UPDATE titles SET year='$year' WHERE title='$title'";
      $result   = $conn->query($query);
      if (!$result)
        echo "UPDATE failed<br><br>";
    }
    else
      echo "Enter Valid Input";
  }
  echo <<<_END
  <form action="main.php" method="post"><pre>
  Add Titles:
    Author <input type="text" name="author">
    Title  <input type="text" name="title">
    Year   <input type="text" name="year">
    <input type='hidden' name='insert' value='yes'>
    <input type="submit" value="ADD RECORD">
  </pre></form>
  <form action="main.php" method="post">
  <input type='hidden' name='displayt' value='yes'>
    <input type="submit" value="Display All Titles / Update Year/ Delete value">
  </form>
  <form action="main.php" method="post"><pre>
  Enter Title:<input type='text' name="title">
  <input type='hidden' name='displayts' value='yes'>
  </pre>
    <input type="submit" value="Display Specific">
  </form>
_END;
  if(isset($_POST['displayt']))
  {
    $query  = "SELECT * FROM titles";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");
    $rows = $result->num_rows;
    echo "<pre>Entries in table: 'titles'</pre>";
    for ($j = 0;$j < $rows;++$j)
    {
      $row = $result->fetch_array(MYSQLI_NUM);
      $r0 = htmlspecialchars($row[0]);
      $r1 = htmlspecialchars($row[1]);
      $r2 = htmlspecialchars($row[2]);
      echo <<<_END
      <hr>
      <pre>
        Author $r1
         Title $r0
          Year $r2
      </pre>
      <form action='main.php' method='post'>
      <input type='hidden' name='delete' value='yes'>
      <input type='hidden' name='title' value='$r0'>
      <input type='submit' value='DELETE RECORD'>
      </form>
      <form action='main.php' method='post'><pre>
      Enter Updated Year of Publication: <input type='text' name='year'>
      <input type='hidden' name='title' value='$r0'>
      <input type='submit' value='UPDATE YEAR'></pre>
      </form>
      <hr>
_END;
    }
  }
  if(isset($_POST['displayts']) && isset($_POST['title']))
  {
    $title = get_post($conn,'title');
    $query  = "SELECT author,year FROM titles WHERE title LIKE '%$title%'";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");
    $rows = $result->num_rows;
    echo "<pre>Entries for ".$title."</pre>";
    for ($j = 0;$j < $rows;++$j)
    {
      $row = $result->fetch_array(MYSQLI_NUM);
      $r0 = htmlspecialchars($row[0]);
      $r1 = htmlspecialchars($row[1]);
      echo <<<_END
      <hr>
      <pre>
        Author $r0
         Year $r1
      </pre>
      <hr>
_END;
    }
  }
 
  echo <<<_END
  <form action="main.php" method="post"><pre>
  Add Authors:
    Author     <input type="text" name="author">
    Publisher  <input type="text" name="publisher">
    <input type='hidden' name='insert' value='yes'>
    <input type="submit" value="ADD RECORD">
    </pre>
    </form>
    <form action="main.php" method="post">
    <input type='hidden' name='displaya' value='yes'>
    <input type="submit" value="Display All Authors / Delete value">
    </form>
    <form action="main.php" method="post"><pre>
  Enter Publisher:<input type='text' name="publisher">
  <input type='hidden' name='displayas' value='yes'>
  </pre>
    <input type="submit" value="Display Specific">
  </form>
    
_END;
  if(isset($_POST['displaya']))
  {
    $query  = "SELECT * FROM authors";
    $result = $conn->query($query);
    if (!$result)
      die ("Database access failed");
    $rows = $result->num_rows;
    echo "<pre>Entries in table: 'authors'</pre>";
    for ($j = 0;$j < $rows;++$j)
    {
      $row = $result->fetch_array(MYSQLI_NUM);
      $r0 = htmlspecialchars($row[0]);
      $r1 = htmlspecialchars($row[1]);
      echo <<<_END
      <hr>
    <pre>
      Author    $r0
      Publisher $r1
    </pre>
    <form action='main.php' method='post'>
    <input type='hidden' name='delete' value='yes'>
    <input type='hidden' name='author' value='$r0'>
    <input type='hidden' name='publisher' value='$r1'>
    <input type='submit' value='DELETE RECORD'>
    </form>
    <hr>
_END;
    }
  }
  if(isset($_POST['displayas']) && isset($_POST['publisher']))
  {
    $publisher = get_post($conn,'publisher');
    $query  = "SELECT authors.author,titles.title,titles.year FROM authors INNER JOIN titles ON authors.author = titles.author WHERE authors.publisher = '$publisher'";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");
    $rows = $result->num_rows;
    echo "<pre>Entries for ".$title."</pre>";
    for ($j = 0;$j < $rows;++$j)
    {
      $row = $result->fetch_array(MYSQLI_NUM);
      $r0 = htmlspecialchars($row[0]);
      $r1 = htmlspecialchars($row[1]);
      $r2 = htmlspecialchars($row[2]);
      echo <<<_END
      <hr>
      <pre>
        Author $r0
         Title $r1
         Year  $r2
      </pre>
      <hr>
_END;
    }
  }
  $result->close();
  $conn->close();
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>