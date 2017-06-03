<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<body>


<table id="example">
  <thead>
    <tr><th class="site_name">Name</th>
      <th>Url </th>
      <th>Type</th>
      <th>Last modified</th>
      <th>Editor</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>





  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>



  <script>
  $(function(){


   $("#example").dataTable({
      "bServerSide": true,
      "sAjaxSource": "http://localhost:8090/Bookstore/laravel/public/deProbaBooks",
      "aoColumns": [{
        "mData": "name",
        "sTitle": "Site name"
      },{
        "mData": "url",
        "mRender": function ( url, type, full )  {
          return  '<a href="'+url+'">' + url + '</a>';
        }
      },{
        "mData": "editor.name"
      },{
        "mData": "editor.phone"
      },{
        "mData":"editor",
        "mRender": function(data){
        return data.phone.concat("<br>");
      }
    }]
  })



})
  </script>


</body>
</html>