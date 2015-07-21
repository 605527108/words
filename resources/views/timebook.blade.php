<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <title>Words</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">    
    <style>
        body { margin: 2em 0; }
    </style>
</head>


<body id="demo" class="container">

<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Year</label>
    <input v-model="startyear" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputName2" autocomplete="off" number>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Month</label>
    <input v-model="startmonth" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputEmail2" autocomplete="off" number>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">Day</label>
    <input v-model="startday" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputEmail3" autocomplete="off" number>
  </div>
</form>
<hr />
<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName4">Year</label>
    <input v-model="endyear" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputName4" autocomplete="off" number>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail5">Month</label>
    <input v-model="endmonth" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputEmail5" autocomplete="off" number>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail6">Day</label>
    <input v-model="endday" v-on="keyup: onKeyUp($event)" class="form-control" id="exampleInputEmail6" autocomplete="off" number>
  </div>
</form>
<hr />
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            <tr v-repeat="words">
                <td><a href="/detail/@{{ name }}">@{{ name }}</a></td>
                <td>@{{ info }}</td>
            </tr>
        </tbody>
    </table>
    <script src="http://cdn.bootcss.com/vue/0.12.7/vue.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.1.5/vue-resource.min.js"></script>
    <script src="/js/timebook.js"></script>  
</body>
</html>