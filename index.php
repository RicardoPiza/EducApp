<?php include_once("connect.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">

        <?php
        if (isset($_POST['submit'])) {

            $f1 = $_POST['f1'];
            $f2 = $_POST['f2'];
            $f3 = $_POST['f3'];
            $f4 = $_POST['f4'];
            $f5 = $_POST['f5'];

            $query = "INSERT INTO tb1 (f1,f2,f3,f4,f5) VALUES ('$f1','$f2','$f3','$f4','$f5')";

            $result = mysqli_query($conn, $query);
            $student_id = $conn->insert_id;


            foreach ($_POST['done'] as $key => $value) {

                $query1 = "INSERT INTO tb2(tb1_id,f1,f2,f3,f4)VALUES ('" . $student_id . "','" . $_POST['done'][$key] . "','" . $_POST['von'][$key] . "','" . $_POST['bis'][$key] . "','" . $_POST['std'][$key] . "')";
                mysqli_query($conn, $query1);
            }


            foreach ($_POST['mange'] as $key => $value) {

                $query2 = "INSERT INTO tb3(tb1_id,f1,f2,f3)VALUES ('" . $student_id . "','" . $_POST['mange'][$key] . "','" . $_POST['bezeichnung'][$key] . "','" . $_POST['art_nr'][$key] . "')";
                mysqli_query($conn, $query2);
            }

            foreach ($_POST['open_point'] as $key => $value) {

                $query3 = "INSERT INTO tb4(tb1_id,f1,f2)VALUES ('" . $student_id . "','" . $_POST['open_point'][$key] . "','" . $_POST['intern'][$key] . "')";
                mysqli_query($conn, $query3);
            }
        }
        ?>
        <form action="" method="post" enctype="">
            <fieldset>
                <div class="form-row">

                    <div class="col">
                        <h2>Monte seu questionário</h2>
                    </div>
                </div>
                <div id="dynamic_field">
                    <div class="col">
                        <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button><label>Adicionar pergunta</label></td>
                    </div>
                </div>
                <div id="dynamic_field2">
                    <div class="form-row">
                        <div class="col">
                            <td><button type="button" name="add" id="add2" class="btn btn-success"><i class="fa fa-plus"></i></button><label> Adicionar alternativa</label></td>
                        </div>
                    </div>
                </div>
                <div class="form-row"><br>
                    <div class="col">
                        <button type="submit" id='submit' name="submit" class="btn btn-primary " value="Save">Salvar</button>
                    </div>
                </div>

                <br>
                <br>
        </form>
        </fieldset>

        <div class="col"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<div class="form-row"  id="row' + i + '"> <textarea name="" id="' + i + '" cols="110" rows="6"></textarea></div><div> <button name="add" class="btn btn-danger btn_remove" id="' + i + '"><i class="fa fa fa-trash"></i></button> </div>');
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");

                $('#row' + button_id + '').remove();
            });

            $('#add2').click(function() {
                i++;
                $('#dynamic_field2').append('<div class="form-row"  id="row2' + i + '"><input type = "checkbox"><textarea name="" id="' + i + '" cols="108" rows="3"></textarea></div><div><button type="button" name="add" class="btn btn-danger btn_remove2" id="' + i + '"><i class="fa fa fa-trash"></i></button></div>');
            });
            $(document).on('click', '.btn_remove2', function() {
                var button_id = $(this).attr("id");

                $('#row2' + button_id + '').remove();
            });

        });
    </script>

</body>

</html>