<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form id="myForm" class="card">
        <div class="msg"></div>

        <h2>คำขอเข้าหมูบ้าน</h2>

        <div class="form-control">
            <p>ชื่อลูกบ้าน</p>
            <input type="text" id="house_name" class="txt" placeholder="insert house name">
        </div>

        <div class="form-control">
            <p>บ้านเลขที่</p>
            <input type="text" id="house_number" class="txt" placeholder="insert house number">
        </div>

        <div class="form-control">
            <p>กิจกรรม</p>
            <input type="text" id="activity" class="txt" placeholder="insert activity">
        </div>

        <div class="form-control">
            <p>เริ่ม</p>
            <input type="text" id="start" class="txt" placeholder="insert start">
        </div>

        <div class="form-control">
            <p>สิ้นสุด</p>
            <input type="text" id="end" class="txt" placeholder="insert end">
        </div>

        <div class="form-control">
            <p>จำนวนคน</p>
            <input type="text" id="people" class="txt" placeholder="insert num of people">
        </div>

        <div class="form-control">
            <p>Email</p>
            <textarea type="text" id="email" class="txt txtarea" placeholder="insert email"></textarea>
        </div>

        <button type="button" onclick="sendEmail()" value="Send an email" class="btn-submit">Send email</button>
    </form>
    

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">

        // send function
        function sendEmail() {
            var house_name = $("#house_name");
            var house_number = $("#house_number");
            var activity = $("#activity");
            var start = $("#start");
            var end = $("#end");
            var people = $("#people");
            var email = $("#email");

            if(isNotEmpty(house_name) && isNotEmpty(house_number) && isNotEmpty(activity) && isNotEmpty(start) && isNotEmpty(end) && isNotEmpty(people) && isNotEmpty(email)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',

                    // send data
                    data: {
                        house_name: house_name.val(),
                        house_number: house_number.val(),
                        activity: activity.val(),
                        start: start.val(),
                        end: end.val(),
                        people: people.val(),
                        email: email.val()
                    }, 
                    //show message success
                    success: function (response) {
                        $('#myForm')[0].reset();
                        $('.msg').text("send success");
                    }
                });
            }
        }
        //check empty
        function isNotEmpty(caller) {
            if(caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            }
            else caller.css('border', '');

            return true;
        }

    </script>
</body>
</html>