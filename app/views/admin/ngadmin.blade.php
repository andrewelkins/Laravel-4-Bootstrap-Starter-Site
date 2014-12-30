<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ng-admmin Admin CP for Laravel 4 Bootstrap Starter Site</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../bower_components/ng-admin/build/ng-admin.min.css">
    <link rel="stylesheet" href="style.css">
    <csrf content="{{ csrf_token() }}">
    <script src="{{URL::to('/') }}/assets/javascript/backend.js" type="text/javascript"></script>
</head>

<body ng-app="myApp" ng-controller="main">
<div ui-view></div>
</body>
</html>
