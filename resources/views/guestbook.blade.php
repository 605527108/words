<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Words</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
        body { margin: 2em 0; }
    </style>
</head>


<body id="demo" class="container">
    <form action="/create" method="POST">
        <input v-model="search" v-on="keyup: onKeyUp($event)" class="form-control" name="name" autocomplete="off">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>


    <table class="table table-striped">
        <thead>
            <tr>
                <th><a href="#" v-on="click: sortBy('name')">Name</a></th>
                <th><a href="#" v-on="click: sortBy('time')">Info</a></th>
            </tr>
        </thead>
        <tbody>
            <tr v-repeat="words | filterBy search | orderBy sortKey reverse">
                <td><a href="/detail/@{{ name }}">@{{ name }}</a></td>
                <td>@{{ info }}</td>
            </tr>
        </tbody>
    </table>
    <script src="http://cdn.bootcss.com/vue/0.12.7/vue.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.1.5/vue-resource.min.js"></script>
    <script src="/js/guestbook.js"></script>  
</body>
</html>