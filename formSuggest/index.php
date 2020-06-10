<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <script>
        const showSuggestion = (str) => {
            if (str.length === 0) {
                document.getElementById('output').innerHTML = '';
            } else {
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById('output').innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "suggest.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <title>Form with suggestions</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Search Users</h1>
        <form>
            Search User: <br><input type="text" class="form-control mt-1" onkeyup="showSuggestion(this.value)">
        </form>
        <p class="mt-1">Suggestions: <span id="output" style="font-weight: bold;"></span></p>
    </div>
</body>
</html>