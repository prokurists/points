<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vue.js in PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="js/vue-router.js"></script>

</head>
<body>
<div id="app">
<p>{{ message }}</p>

</div>
<script>
 const Home = { template: '<div> Home page </div>' };
 const About = { template: '<div> About page </div>' };
</script>
</body>
</html>