<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form TEst</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="http://localhost/mail.sgm.ng/mail">
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">Full Name</label>
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="fname"  placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label"> Email</label>
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="email"  placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">Message</label>
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="message"  placeholder="">
                </div>
            </div>
            <input type="hidden" name="app" value="2f8a6bf31f3b">
            <input type="hidden" name="url" value="https://google.com">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>