<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
Name: <input type="text" id="name"><br>
Grade: <input type="text" id="grade"><br>
<button id="button">Add</button>
<div id="students">

</div>
</body>

<script>
    $(document).ready(function () {
        // fill students div content with document ready
        updateStudents();

        $('#button').on('click', function () {

            var order = {
                name: $('#name').val(),
                grade: $('#grade').val(),
            }
            $.ajax({
                type: 'POST',
                url: 'json.php',
                data: order,
                success: function (newStudent) {
                    console.log("Success");
                    $("#students").append(setStudents($('#name').val(), $('#grade').val()));

                }
            })
        });

        function updateStudents() {
            $.getJSON('students.json', function (data) {

                for (i = 0; i < data.length; i++) {
                    $("#students").append(setStudents(data[i].name, data[i].grade));

                }
            });
        }

        function setStudents(name, grade) {
            var color = 'green';
            if (grade < 5) {
                color = 'red';
            }
            return "<p style='color: " + color + ";'>Name: " + name + "<br>Grade: " + grade + "</p>"
        }

    });

</script>

</html>
