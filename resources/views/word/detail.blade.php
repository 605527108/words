<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <title>Words</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
        body { margin: 2em 0; }
    </style>
</head>


<body id="demo" class="container">
	<h1 id="name">{{ $name }}</h1>
	<p>{{ $created_at }}</p>
    <hr />
    <form method="POST" v-on="submit: onSubmitInfo">
        <div class="form-group">
            <label for="info">Info:</label>
            <textarea type="text" name="info" class="form-control" v-model="word.newInfo">{{ $info }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" v-attr="disabled: errors">update</button>
        </div>  
    </form>
    <hr />
    <article v-repeat="books">
        <h3>@{{ title }}</h3>
        <div class="body">@{{ text }}</div>
    </article>
    <hr />

    <form method="POST" v-on="submit: onSubmitBook">
        <div class="form-group">
            <label for="info">Title:</label>
            <input type="text" name="title" class="form-control" v-model="book.title"></input>
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea type="text" name="text" class="form-control" v-model="book.text"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" v-attr="disabled: filled">submit</button>
        </div>  
    </form>

    <script src="http://cdn.bootcss.com/vue/0.12.7/vue.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.1.5/vue-resource.min.js"></script>
    <script src="/js/detailword.js"></script>  
</body>
</html>