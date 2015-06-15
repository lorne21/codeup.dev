<?php var_dump($_GET); ?>
<?php var_dump($_POST); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Get Form</title>

</head>
<body>
    <section class="example_form_get_method">

        <h2>Example of form using the GET method</h2>
        <p>Look at the URL after submitting the form.</p>

        <!-- The form action specifies the file that will handle the submitted form data. -->
        <form method="GET" action="my_get_form.php">
            <fieldset>
                <legend>Search for cars</legend>

                <label for="make">Make</label>
                <input type="text" id="make" name="make" placeholder="make" autofocus>

                <label for="model">Model</label>
                <input type="text" id="model" name="model" placeholder="model">

                <label for="color">Color</label>
                <input type="text" id="color" name="color" placeholder="color">

                <input type="submit" value="search now">
            </fieldset>
        </form>
    </section>

    <section class="example_href_get_request">

        <!-- Navigating to an anchor tag is a GET request -->
        <h2>Examples of links using query strings</h2>
        <ul>
            <li><a href="?page=2">Page 2</a></li>
            <li><a href="?page=2&limit=10">Page 2, Limit to 10 results at a time</a>
            <li><a href="?zipcode=78205&property_type=condo">Condos in 78205</a></li>
            <li><a href="http://caniuse.com/?feat=input-placeholder#feat=input-placeholder">Can I use placeholders instead of labels?</a></li>
        </ul>
    </section>

    <section>
        <h3>Form methods - GET and POST</h3>
        <p>GET and POST mean the type of request the browser (client) sends the server. These are the two most common HTTP verbs (also known as HTTP methods) that we will use.</p>

        <ul>
        <h4>Notes on GET:</h4>
            <li>Appends form-data into the URL in name/value pairs</li>
            <li>The length of a URL is limited (about 3000 characters)</li>
            <li>NEVER NEVER NEVER use GET to send sensitive data! (will be visible in the URL)</li>
            <li>Useful for form submissions where a user want to bookmark the result</li>
            <li>GET is better for non-secure data, like query strings in Google</li>
        </ul>

        <ul>
            <h4>Notes on POST:</h4>
            <li>Are never cached</li>
            <li>Appends form-data inside the body of the HTTP POST request data, which is why the data is not shown is in URL.</li>
            <li>Has no size limitations</li>
            <li>Form submissions with POST cannot be bookmarked</li>
            <li>POST requests do not remain in the browser history</li>
            <li>POST requests cannot be bookmarked</li>
        </ul>
    </section>
</body>
</html>