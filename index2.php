<html>
<head>
    <!--<link rel="stylesheet" type="text/css" media="screen" href="style.css"/>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>    
</head>
<body>
    <?php

$get = file_get_contents("http://gisapi-web-staging-1636833739.eu-west-1.elb.amazonaws.com/v2/applications?access_token=dd0df21c8af5d929dff19f74506c4a8153d7acd34306b9761fd4a57cfa1d483c&page=1&per_page=11&api_key=dd0df21c8af5d929dff19f74506c4a8153d7acd34306b9761fd4a57cfa1d483c");



$json = json_decode($get,true); 

 echo '<table class="table table-striped table-dark">
      <caption>
      Applicant info
      </caption>
      <tr>
      <th scope="col"> #  </th>
      <th scope="col"> first name  </th>
      <th scope="col"> last name </th>
      <th scope="col"> id   </th>
      <th scope="col"> email   </th>
      <th colspan="3" scope="col" style="text-align: center;"> LC </th>
      </tr>
      <tr>
      <th scope="col">   </th>
      <th scope="col">   </th>
      <th scope="col"> </th>
      <th scope="col">   </th>
      <th scope="col">    </th>
      <th scope="col" style="text-align: left;"> id </th>
      <th scope="col" style="text-align: left;"> name </th>
      <th scope="col" style="text-align: left;"> country </th>
      </tr>';

for($i=0;$i<11;$i++){
   echo'
      <tr>
      <th scope="row">'. ($i + 1) .'</th>
      <td>' .$json['data'][$i]['person']['first_name']. '</td>
      <td>' .$json['data'][$i]['person']['last_name'].   '</td>
      <td>' .$json['data'][$i]['person']['id'].  '</td>
      <td>' .$json['data'][$i]['person']['email'].  '</td>
      <td>' .$json['data'][$i]['person']['home_lc']['id'].  '</td>
      <td>' .$json['data'][$i]['person']['home_lc']['name'].  '</td>
      <td>' .$json['data'][$i]['person']['home_lc']['country'].  '</td>
      </tr>
      ';
    
}
echo '</table>';

?>
</body>
</html>

