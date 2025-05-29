<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Week 4</title>
</head>

<body>

  <?php

  echo "Chanllenge 1:";

  echo "<br><br>";

  // use map to store period and meals
  $meals = [
    "breakfast" => [
      "bananas",
      "apples",
      "oats"
    ],
    "lunch" => [
      "fish",
      "chicken",
      "vegetables"
    ],
    "dinner" => [
      "steak",
      "carrots",
      "broccoli"
    ]
  ];

  $current_time = 8;

  if ($current_time >= 5 && $current_time <= 9) {
    echo "Breakfast: " . $meals["breakfast"][0] . ", " . $meals["breakfast"][1] . ", " . $meals["breakfast"][2];
  } elseif ($current_time >= 12 && $current_time <= 14) {
    echo "Lunch: " . $meals["lunch"][0] . ", " . $meals["lunch"][1] . ", " . $meals["lunch"][2];
  } elseif ($current_time >= 18 && $current_time <= 20) {
    echo "Dinner: " . $meals["dinner"][0] . ", " . $meals["dinner"][1] . ", " . $meals["dinner"][2];
  } else {
    echo "No meals available";
  }


  echo "<br><br>";
  echo "<br><br>";
  echo "Chanllenge 2:";

  echo "<br><br>";

  $number = 15;

  if ($number % 3 == 0 && $number % 5 == 0) {
    echo "FizzBuzz";
  } elseif ($number % 3 == 0) {
    echo "Fizz";
  } elseif ($number % 5 == 0) {
    echo "Buzz";
  } else {
    echo $number;
  }

  echo "<br><br>";
  echo "<br><br>";
  echo "Chanllenge 3:";

  // Function to fetch user data from the JSONPlaceholder API
  function getUsers()
  {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
  }
  // Get the list of users
  $users = getUsers();



  for ($i = 0; $i < count($users); $i++) {
    echo "Name: " . $users[$i]["name"] . "<br>";
    echo "Email: <a href='mailto:" . $users[$i]["email"] . "'>" . $users[$i]["email"] . "</a><br>";
    echo "Street: " . $users[$i]["address"]["street"] . "<br>";
    echo "City: " . $users[$i]["address"]["city"] . "<br>";
    echo "<br>";
  }







  ?>
</body>

</html>