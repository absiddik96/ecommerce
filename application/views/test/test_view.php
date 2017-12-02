<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <script type="text/javascript">
            function toggle_check(){
                var checkboxes = document.getElementsByName('id[]');
                var button    = document.getElementById('toggle');
                if (button.value == 'select') {
                    for (var i in checkboxes) {
                        checkboxes[i].checked = "FALSE";
                    }
                    button.value = 'deselect';
                } else {
                    for (var i in checkboxes) {
                        checkboxes[i].checked = "";
                    }
                    button.value = 'select';
                }
            }
        </script>
    </head>
    <body>
        <form class="" action="<?php echo base_url('TestController/test');?>" method="post">
            <input type="button" id="toggle" value="select" onclick="toggle_check()">
            <table>
                <thead>
                    <th>Check Box</th>
                    <th>Student Name</th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="1"></td>
                        <td>Abu</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="2"></td>
                        <td>Baker</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="3"></td>
                        <td>Siddik</td>
                    </tr>

                </tbody>
            </table>
            <input type="submit" name="" value="Submit">
        </form>

    </body>
</html>
